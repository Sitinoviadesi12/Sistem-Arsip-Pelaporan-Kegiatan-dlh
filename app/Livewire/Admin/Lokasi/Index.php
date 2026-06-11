<?php

namespace App\Livewire\Admin\Lokasi;

use App\Models\LokasiKegiatan;
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

    public string $alamat = '';

    public bool $is_active = true;

    protected function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:1000',
            'is_active' => 'boolean',
        ];
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function openCreate(): void
    {
        $this->authorize('create', LokasiKegiatan::class);
        $this->resetForm();
        $this->showModal = true;
    }

    public function openEdit(int $id): void
    {
        $lokasi = LokasiKegiatan::findOrFail($id);
        $this->authorize('update', $lokasi);

        $this->editingId = $lokasi->id;
        $this->nama = $lokasi->nama;
        $this->alamat = $lokasi->alamat ?? '';
        $this->is_active = $lokasi->is_active;
        $this->showModal = true;
    }

    public function save(): void
    {
        $this->validate();

        if ($this->editingId) {
            $lokasi = LokasiKegiatan::findOrFail($this->editingId);
            $this->authorize('update', $lokasi);
            $lokasi->update([
                'nama' => strip_tags($this->nama),
                'alamat' => strip_tags($this->alamat),
                'is_active' => $this->is_active,
            ]);
            $this->dispatch('toast', [['type' => 'success', 'message' => 'Lokasi berhasil diperbarui.']]);
        } else {
            $this->authorize('create', LokasiKegiatan::class);
            LokasiKegiatan::create([
                'nama' => strip_tags($this->nama),
                'alamat' => strip_tags($this->alamat),
                'is_active' => $this->is_active,
            ]);
            $this->dispatch('toast', [['type' => 'success', 'message' => 'Lokasi berhasil ditambahkan.']]);
        }

        $this->closeModal();
    }

    public function delete(int $id): void
    {
        $lokasi = LokasiKegiatan::findOrFail($id);
        $this->authorize('delete', $lokasi);
        $lokasi->delete();
        $this->dispatch('toast', [['type' => 'success', 'message' => 'Lokasi berhasil dihapus.']]);
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
        $this->alamat = '';
        $this->is_active = true;
        $this->resetValidation();
    }

    public function render()
    {
        $lokasis = LokasiKegiatan::query()
            ->when($this->search, fn ($q) => $q->where('nama', 'like', "%{$this->search}%"))
            ->withCount('kegiatan')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.lokasi.index', compact('lokasis'));
    }
}
