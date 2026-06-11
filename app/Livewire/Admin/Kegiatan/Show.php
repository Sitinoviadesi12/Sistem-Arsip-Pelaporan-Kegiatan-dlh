<?php

namespace App\Livewire\Admin\Kegiatan;

use App\Models\Kegiatan;
use App\Services\ImageService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin')]
class Show extends Component
{
    use AuthorizesRequests, WithFileUploads;

    public Kegiatan $kegiatan;

    public array $fotoBaru = [];

    public function mount(Kegiatan $kegiatan): void
    {
        $this->authorize('view', $kegiatan);
        $this->kegiatan = $kegiatan->load(['kategori', 'lokasi', 'user', 'dokumentasi']);
    }

    public function publish(): void
    {
        $this->authorize('update', $this->kegiatan);
        $this->kegiatan->publish();
        $this->kegiatan->refresh();
        $this->dispatch('toast', [['type' => 'success', 'message' => 'Kegiatan dipublish ke website publik.']]);
    }

    public function unpublish(): void
    {
        $this->authorize('update', $this->kegiatan);
        $this->kegiatan->unpublish();
        $this->kegiatan->refresh();
        $this->dispatch('toast', [['type' => 'success', 'message' => 'Kegiatan di-unpublish.']]);
    }

    public function uploadDokumentasi(): void
    {
        $this->validate([
            'fotoBaru.*' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $imageService = app(ImageService::class);
        $sortOrder = $this->kegiatan->dokumentasi()->max('sort_order') ?? 0;

        foreach ($this->fotoBaru as $foto) {
            $path = $imageService->storeAndCompress($foto, 'kegiatan/dokumentasi');
            $this->kegiatan->dokumentasi()->create([
                'file_path' => $path,
                'original_name' => $foto->getClientOriginalName(),
                'file_size' => $foto->getSize(),
                'sort_order' => ++$sortOrder,
            ]);
        }

        $this->fotoBaru = [];
        $this->kegiatan->load('dokumentasi');
        $this->dispatch('toast', [['type' => 'success', 'message' => 'Dokumentasi berhasil diunggah.']]);
    }

    public function deleteDokumentasi(int $id): void
    {
        $doc = $this->kegiatan->dokumentasi()->findOrFail($id);
        $doc->delete();
        $this->kegiatan->load('dokumentasi');
        $this->dispatch('toast', [['type' => 'success', 'message' => 'Dokumentasi dihapus.']]);
    }

    public function render()
    {
        return view('livewire.admin.kegiatan.show');
    }
}
