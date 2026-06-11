<?php

namespace App\Livewire\Admin\Dokumentasi;

use App\Models\DokumentasiKegiatan;
use App\Models\Kegiatan;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class Index extends Component
{
    use WithPagination;

    #[Url]
    public string $keyword = '';

    #[Url]
    public string $kegiatan_id = '';

    public function updatingKeyword(): void
    {
        $this->resetPage();
    }

    public function delete(int $id): void
    {
        DokumentasiKegiatan::findOrFail($id)->delete();
        $this->dispatch('toast', [['type' => 'success', 'message' => 'Dokumentasi berhasil dihapus.']]);
    }

    public function render()
    {
        $dokumentasi = DokumentasiKegiatan::query()
            ->with('kegiatan')
            ->when($this->keyword, function ($q) {
                $q->whereHas('kegiatan', fn ($kq) => $kq->where('judul', 'like', "%{$this->keyword}%"));
            })
            ->when($this->kegiatan_id, fn ($q) => $q->where('kegiatan_id', $this->kegiatan_id))
            ->latest()
            ->paginate(12);

        $kegiatanList = Kegiatan::orderBy('judul')->get(['id', 'judul']);

        $totalDokumentasi = DokumentasiKegiatan::count();

        return view('livewire.admin.dokumentasi.index', compact('dokumentasi', 'kegiatanList', 'totalDokumentasi'));
    }
}
