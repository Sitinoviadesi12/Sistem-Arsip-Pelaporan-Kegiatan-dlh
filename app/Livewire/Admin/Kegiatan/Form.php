<?php

namespace App\Livewire\Admin\Kegiatan;

use App\Models\KategoriKegiatan;
use App\Models\Kegiatan;
use App\Models\LokasiKegiatan;
use App\Services\ImageService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class Form extends Component
{
    use AuthorizesRequests, WithFileUploads;

    public ?Kegiatan $kegiatan = null;

    public string $judul = '';

    public string $slug = '';

    public ?int $kategori_kegiatan_id = null;

    public ?int $lokasi_kegiatan_id = null;

    public ?int $bidang_id = null;

    public string $tanggal_kegiatan = '';

    public bool $showTambahLokasi = false;

    public string $lokasiNama = '';

    public string $lokasiAlamat = '';

    public bool $showTambahKategori = false;

    public string $kategoriNama = '';

    public string $kategoriDeskripsi = '';

    public bool $showTambahBidang = false;

    public string $bidangNama = '';

    public string $bidangDeskripsi = '';

    public $thumbnail;

    public string $deskripsi = '';

    public string $isi_lengkap = '';

    public string $status = '';

    public string $meta_description = '';

    public array $fotoBaru = [];

    public $fotoBaruInput = [];

    public int $inputKey = 0;

    public ?string $existingThumbnail = null;

    protected function rules(): array
    {
        $thumbnailRule = $this->kegiatan
            ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:20480'
            : 'nullable|image|mimes:jpeg,jpg,png,webp|max:20480';

        return [
            'judul' => 'required|string|max:255',
            'kategori_kegiatan_id' => 'required|exists:kategori_kegiatan,id',
            'lokasi_kegiatan_id' => 'required|exists:lokasi_kegiatan,id',
            'bidang_id' => 'required|exists:bidangs,id',
            'tanggal_kegiatan' => 'required|date',
            'thumbnail' => $thumbnailRule,
            'deskripsi' => 'required|string|max:5000',
            'isi_lengkap' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'meta_description' => 'nullable|string|max:500',
            'fotoBaru.*' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:20480',
        ];
    }

    public function mount(?Kegiatan $kegiatan = null): void
    {
        if ($kegiatan?->exists) {
            $this->authorize('update', $kegiatan);
            $this->kegiatan = $kegiatan;
            $this->judul = $kegiatan->judul;
            $this->slug = $kegiatan->slug;
            $this->kategori_kegiatan_id = $kegiatan->kategori_kegiatan_id;
            $this->lokasi_kegiatan_id = $kegiatan->lokasi_kegiatan_id;
            $this->bidang_id = $kegiatan->bidang_id;
            $this->tanggal_kegiatan = $kegiatan->tanggal_kegiatan->format('Y-m-d');
            $this->deskripsi = $kegiatan->deskripsi;
            $this->isi_lengkap = $kegiatan->isi_lengkap ?? '';
            $this->status = $kegiatan->status;
            $this->meta_description = $kegiatan->meta_description ?? '';
            $this->existingThumbnail = $kegiatan->thumbnail;
        } else {
            $this->authorize('create', Kegiatan::class);
            $this->tanggal_kegiatan = '';
            $this->status = '';
        }
    }

    public function updatedJudul(): void
    {
        if (! $this->kegiatan) {
            $this->slug = Kegiatan::generateUniqueSlug($this->judul);
        }
    }

    public function toggleTambahKategori(): void
    {
        $this->showTambahKategori = !$this->showTambahKategori;
        if (!$this->showTambahKategori) {
            $this->kategoriNama = '';
            $this->kategoriDeskripsi = '';
        }
    }

    public function simpanKategori(): void
    {
        $validated = $this->validate([
            'kategoriNama' => 'required|string|max:255|unique:kategori_kegiatan,nama',
            'kategoriDeskripsi' => 'nullable|string|max:500',
        ], [
            'kategoriNama.required' => 'Nama kategori harus diisi.',
            'kategoriNama.unique' => 'Nama kategori sudah terdaftar.',
        ]);

        $kategori = KategoriKegiatan::create([
            'nama' => $validated['kategoriNama'],
            'deskripsi' => $validated['kategoriDeskripsi'],
            'is_active' => true,
        ]);

        $this->kategori_kegiatan_id = $kategori->id;
        $this->showTambahKategori = false;
        $this->kategoriNama = '';
        $this->kategoriDeskripsi = '';

        $this->dispatch('toast', [['type' => 'success', 'message' => 'Kategori berhasil ditambahkan.']]);
    }

    public function toggleTambahLokasi(): void
    {
        $this->showTambahLokasi = !$this->showTambahLokasi;
        if (!$this->showTambahLokasi) {
            $this->lokasiNama = '';
            $this->lokasiAlamat = '';
        }
    }

    public function simpanLokasi(): void
    {
        $validated = $this->validate([
            'lokasiNama' => 'required|string|max:255|unique:lokasi_kegiatan,nama',
            'lokasiAlamat' => 'nullable|string|max:500',
        ], [
            'lokasiNama.required' => 'Nama lokasi harus diisi.',
            'lokasiNama.unique' => 'Nama lokasi sudah terdaftar.',
        ]);

        $lokasi = LokasiKegiatan::create([
            'nama' => $validated['lokasiNama'],
            'alamat' => $validated['lokasiAlamat'],
            'is_active' => true,
        ]);

        $this->lokasi_kegiatan_id = $lokasi->id;
        $this->showTambahLokasi = false;
        $this->lokasiNama = '';
        $this->lokasiAlamat = '';

        $this->dispatch('toast', [['type' => 'success', 'message' => 'Lokasi berhasil ditambahkan.']]);
    }

    public function toggleTambahBidang(): void
    {
        $this->showTambahBidang = !$this->showTambahBidang;
        if (!$this->showTambahBidang) {
            $this->bidangNama = '';
            $this->bidangDeskripsi = '';
        }
    }

    public function simpanBidang(): void
    {
        $validated = $this->validate([
            'bidangNama' => 'required|string|max:255|unique:bidangs,nama',
            'bidangDeskripsi' => 'nullable|string|max:500',
        ], [
            'bidangNama.required' => 'Nama bidang harus diisi.',
            'bidangNama.unique' => 'Nama bidang sudah terdaftar.',
        ]);

        $bidang = \App\Models\Bidang::create([
            'nama' => $validated['bidangNama'],
            'slug' => \Illuminate\Support\Str::slug($validated['bidangNama']),
            'deskripsi' => $validated['bidangDeskripsi'],
        ]);

        $this->bidang_id = $bidang->id;
        $this->showTambahBidang = false;
        $this->bidangNama = '';
        $this->bidangDeskripsi = '';

        $this->dispatch('toast', [['type' => 'success', 'message' => 'Bidang berhasil ditambahkan.']]);
    }

    public function save(): void
    {
        $this->validate();

        $imageService = app(ImageService::class);
        $data = [
            'judul' => strip_tags($this->judul),
            'kategori_kegiatan_id' => $this->kategori_kegiatan_id,
            'lokasi_kegiatan_id' => $this->lokasi_kegiatan_id,
            'bidang_id' => $this->bidang_id,
            'tanggal_kegiatan' => $this->tanggal_kegiatan,
            'deskripsi' => strip_tags($this->deskripsi),
            'isi_lengkap' => $this->isi_lengkap,
            'status' => $this->status,
            'meta_description' => strip_tags($this->meta_description),
            'is_published' => $this->status === 'published',
            'published_at' => $this->status === 'published' ? ($this->kegiatan?->published_at ?? now()) : null,
        ];

        if ($this->thumbnail) {
            if ($this->existingThumbnail) {
                $imageService->delete($this->existingThumbnail);
            }
            $data['thumbnail'] = $imageService->storeAndCompress($this->thumbnail, 'kegiatan/thumbnails');
        }

        if ($this->kegiatan) {
            $this->authorize('update', $this->kegiatan);
            $this->kegiatan->update($data);
            $kegiatan = $this->kegiatan;
            $this->dispatch('toast', [['type' => 'success', 'message' => 'Kegiatan berhasil diperbarui.']]);
        } else {
            $data['user_id'] = Auth::id();
            $data['slug'] = Kegiatan::generateUniqueSlug($this->judul);
            $kegiatan = Kegiatan::create($data);
            $this->dispatch('toast', [['type' => 'success', 'message' => 'Kegiatan berhasil dibuat.']]);
        }

        $this->uploadDokumentasi($kegiatan, $imageService);

        $this->redirect(route('admin.kegiatan.show', $kegiatan), navigate: true);
    }

    protected function uploadDokumentasi(Kegiatan $kegiatan, ImageService $imageService): void
    {
        $sortOrder = $kegiatan->dokumentasi()->max('sort_order') ?? 0;

        foreach ($this->fotoBaru as $foto) {
            if (! $foto) {
                continue;
            }
            $path = $imageService->storeAndCompress($foto, 'kegiatan/dokumentasi');
            $kegiatan->dokumentasi()->create([
                'file_path' => $path,
                'original_name' => $foto->getClientOriginalName(),
                'file_size' => $foto->getSize(),
                'sort_order' => ++$sortOrder,
            ]);
        }
    }

    public function updatedFotoBaruInput(): void
    {
        $this->validate([
            'fotoBaruInput.*' => 'image|mimes:jpeg,jpg,png,webp|max:20480',
        ]);

        foreach ($this->fotoBaruInput as $file) {
            $this->fotoBaru[] = $file;
        }

        $this->fotoBaruInput = [];
        $this->inputKey++;
    }

    public function removeFotoBaru(int $index): void
    {
        if (isset($this->fotoBaru[$index])) {
            unset($this->fotoBaru[$index]);
            $this->fotoBaru = array_values($this->fotoBaru);
        }
    }

    public function removeExistingDokumentasi(int $id): void
    {
        $doc = \App\Models\DokumentasiKegiatan::findOrFail($id);
        $this->authorize('delete', $doc->kegiatan);
        $doc->delete();
        $this->kegiatan->load('dokumentasi');
        $this->dispatch('toast', [['type' => 'success', 'message' => 'Foto dokumentasi berhasil dihapus.']]);
    }

    public function render()
    {
        $kategoris = KategoriKegiatan::where('is_active', true)->orderBy('nama')->get();
        $lokasis = LokasiKegiatan::where('is_active', true)->orderBy('nama')->get();
        $bidangs = \App\Models\Bidang::orderBy('nama')->get();

        return view('livewire.admin.kegiatan.form', compact('kategoris', 'lokasis', 'bidangs'));
    }
}
