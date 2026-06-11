<?php

namespace App\Livewire\Admin\Kategori;

use App\Models\KategoriKegiatan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class Index extends Component
{
    use AuthorizesRequests, WithPagination;

    public string $search = '';

    public bool $showModal = false;

    public ?int $editingId = null;

    public string $nama = '';

    public string $deskripsi = '';

    public bool $is_active = true;

    protected function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
            'is_active' => 'boolean',
        ];
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function openCreate(): void
    {
        $this->authorize('create', KategoriKegiatan::class);
        $this->resetForm();
        $this->showModal = true;
    }

    public function openEdit(int $id): void
    {
        $kategori = KategoriKegiatan::findOrFail($id);
        $this->authorize('update', $kategori);

        $this->editingId = $kategori->id;
        $this->nama = $kategori->nama;
        $this->deskripsi = $kategori->deskripsi ?? '';
        $this->is_active = $kategori->is_active;
        $this->showModal = true;
    }

    public function save(): void
    {
        $this->validate();

        if ($this->editingId) {
            $kategori = KategoriKegiatan::findOrFail($this->editingId);
            $this->authorize('update', $kategori);
            $kategori->update([
                'nama' => strip_tags($this->nama),
                'deskripsi' => strip_tags($this->deskripsi),
                'is_active' => $this->is_active,
            ]);
            $this->dispatch('toast', [['type' => 'success', 'message' => 'Kategori berhasil diperbarui.']]);
        } else {
            $this->authorize('create', KategoriKegiatan::class);
            KategoriKegiatan::create([
                'nama' => strip_tags($this->nama),
                'deskripsi' => strip_tags($this->deskripsi),
                'is_active' => $this->is_active,
            ]);
            $this->dispatch('toast', [['type' => 'success', 'message' => 'Kategori berhasil ditambahkan.']]);
        }

        $this->closeModal();
    }

    public function delete(int $id): void
    {
        $kategori = KategoriKegiatan::findOrFail($id);
        $this->authorize('delete', $kategori);
        $kategori->delete();
        $this->dispatch('toast', [['type' => 'success', 'message' => 'Kategori berhasil dihapus.']]);
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetForm();
    }

    protected function resetForm(): void
    {
        $this->editingId = null;
        $this->nama = '';
        $this->deskripsi = '';
        $this->is_active = true;
        $this->resetValidation();
    }

    public function render()
    {
        $kategoris = KategoriKegiatan::query()
            ->when($this->search, fn ($q) => $q->where('nama', 'like', "%{$this->search}%"))
            ->withCount('kegiatan')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.kategori.index', compact('kategoris'));
    }
}
