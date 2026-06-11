<?php

namespace App\Livewire\Admin\Kegiatan;

use App\Models\KategoriKegiatan;
use App\Models\Kegiatan;
use App\Models\LokasiKegiatan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class Index extends Component
{
    use AuthorizesRequests, WithPagination, WithFileUploads;

    #[Url]
    public string $keyword = '';

    #[Url]
    public string $kategori_id = '';

    #[Url]
    public string $bidang_id = '';

    #[Url]
    public string $status = '';

    #[Url]
    public string $tanggal_dari = '';

    public $fileCsv;

    public function updatingKeyword(): void
    {
        $this->resetPage();
    }

    public function updatingKategoriId(): void
    {
        $this->resetPage();
    }

    public function updatingBidangId(): void
    {
        $this->resetPage();
    }

    public function updatingTanggalDari(): void
    {
        $this->resetPage();
    }

    public function resetFilters(): void
    {
        $this->reset(['keyword', 'kategori_id', 'bidang_id', 'status', 'tanggal_dari']);
        $this->resetPage();
    }

    public function publish(int $id): void
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $this->authorize('update', $kegiatan);
        $kegiatan->publish();
        $this->dispatch('toast', [['type' => 'success', 'message' => 'Kegiatan berhasil dipublish.']]);
    }

    public function unpublish(int $id): void
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $this->authorize('update', $kegiatan);
        $kegiatan->unpublish();
        $this->dispatch('toast', [['type' => 'success', 'message' => 'Kegiatan dikembalikan ke draft.']]);
    }

    public function delete(int $id): void
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $this->authorize('delete', $kegiatan);

        app(\App\Services\ImageService::class)->delete($kegiatan->thumbnail);

        foreach ($kegiatan->dokumentasi as $doc) {
            $doc->delete();
        }

        $kegiatan->delete();
        $this->dispatch('toast', [['type' => 'success', 'message' => 'Kegiatan berhasil dihapus.']]);
    }

    public function exportQuery(): string
    {
        return http_build_query(array_filter([
            'keyword' => $this->keyword,
            'kategori_id' => $this->kategori_id,
            'bidang_id' => $this->bidang_id,
            'status' => $this->status,
            'tanggal_dari' => $this->tanggal_dari,
        ]));
    }

    public function importCsv(): void
    {
        $this->validate([
            'fileCsv' => 'required|file|mimes:csv,txt|max:10240',
        ], [
            'fileCsv.required' => 'Pilih file CSV terlebih dahulu.',
            'fileCsv.mimes' => 'File harus berformat CSV.',
            'fileCsv.max' => 'Ukuran file maksimal 10MB.',
        ]);

        $path = $this->fileCsv->getRealPath();
        $file = fopen($path, 'r');
        
        // Skip header row
        $header = fgetcsv($file, 1000, ',');
        
        $imported = 0;
        $skipped = 0;
        $errors = [];

        while (($row = fgetcsv($file, 1000, ',')) !== false) {
            // Expected columns: judul, tanggal_kegiatan, kategori, lokasi, bidang, deskripsi, isi_lengkap, status
            if (count($row) < 4) {
                $skipped++;
                continue;
            }

            $judul = trim($row[0] ?? '');
            $tanggal = trim($row[1] ?? '');
            $kategoriNama = trim($row[2] ?? '');
            $lokasiNama = trim($row[3] ?? '');
            $bidangNama = trim($row[4] ?? '');
            $deskripsi = trim($row[5] ?? '');
            $isiLengkap = trim($row[6] ?? '');
            $status = trim($row[7] ?? 'draft');

            // Validate required fields
            if (empty($judul) || empty($tanggal)) {
                $skipped++;
                $errors[] = "Baris dilewati: judul atau tanggal kosong.";
                continue;
            }

            // Validate date format
            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggal)) {
                $skipped++;
                $errors[] = "Baris dilewati: format tanggal tidak valid (gunakan YYYY-MM-DD).";
                continue;
            }

            // Find or create category
            $kategori = null;
            if (!empty($kategoriNama)) {
                $kategori = KategoriKegiatan::firstOrCreate(
                    ['nama' => $kategoriNama],
                    ['slug' => Str::slug($kategoriNama), 'is_active' => true]
                );
            }

            // Find or create location
            $lokasi = null;
            if (!empty($lokasiNama)) {
                $lokasi = LokasiKegiatan::firstOrCreate(
                    ['nama' => $lokasiNama],
                    ['slug' => Str::slug($lokasiNama), 'is_active' => true]
                );
            }

            // Find or create bidang
            $bidang = null;
            if (!empty($bidangNama)) {
                $bidang = \App\Models\Bidang::firstOrCreate(
                    ['nama' => $bidangNama],
                    ['slug' => Str::slug($bidangNama)]
                );
            }

            // Create kegiatan
            try {
                Kegiatan::create([
                    'user_id' => auth()->id(),
                    'kategori_kegiatan_id' => $kategori?->id,
                    'lokasi_kegiatan_id' => $lokasi?->id,
                    'bidang_id' => $bidang?->id,
                    'judul' => $judul,
                    'tanggal_kegiatan' => $tanggal,
                    'deskripsi' => $deskripsi,
                    'isi_lengkap' => $isiLengkap,
                    'status' => in_array($status, ['draft', 'published']) ? $status : 'draft',
                    'is_published' => $status === 'published',
                    'published_at' => $status === 'published' ? now() : null,
                ]);
                $imported++;
            } catch (\Exception $e) {
                $skipped++;
                $errors[] = "Error: {$e->getMessage()}";
            }
        }

        fclose($file);
        $this->fileCsv = null;

        $message = "Import selesai: {$imported} kegiatan berhasil diimpor.";
        if ($skipped > 0) {
            $message .= " {$skipped} baris dilewati.";
        }

        $this->dispatch('toast', [['type' => $imported > 0 ? 'success' : 'warning', 'message' => $message]]);
    }

    public function downloadTemplate()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="template_import_kegiatan.csv"',
        ];

        $callback = function () {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['judul', 'tanggal_kegiatan', 'kategori', 'lokasi', 'bidang', 'deskripsi', 'isi_lengkap', 'status']);
            fputcsv($file, ['Contoh Kegiatan 1', '2026-05-29', 'Penghijauan', 'Taman Kota', 'BIDANG PENATAAN LINGKUNGAN HIDUP', 'Deskripsi singkat kegiatan...', 'Isi lengkap kegiatan...', 'draft']);
            fputcsv($file, ['Contoh Kegiatan 2', '2026-06-15', 'Pembersihan Sungai', 'Sungai Ciliwung', 'BIDANG PENGELOLAAN SAMPAH DAN LIMBAH BAHAN BERBAHAYA DAN BERACUN', 'Deskripsi singkat...', 'Isi lengkap...', 'published']);
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function render()
    {
        $this->authorize('viewAny', Kegiatan::class);

        $filters = [
            'keyword' => $this->keyword,
            'kategori_id' => $this->kategori_id ?: null,
            'bidang_id' => $this->bidang_id ?: null,
            'status' => $this->status ?: null,
            'tanggal_dari' => $this->tanggal_dari ?: null,
        ];

        $kegiatan = Kegiatan::query()
            ->with(['kategori', 'lokasi', 'bidang', 'user'])
            ->filter($filters)
            ->latest('tanggal_kegiatan')
            ->paginate(10);

        $kategoris = KategoriKegiatan::where('is_active', true)->orderBy('nama')->get();
        $bidangs = \App\Models\Bidang::orderBy('nama')->get();

        return view('livewire.admin.kegiatan.index', compact('kegiatan', 'kategoris', 'bidangs'));
    }
}
