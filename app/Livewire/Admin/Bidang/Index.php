<?php

namespace App\Livewire\Admin\Bidang;

use App\Models\Bidang;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
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

    protected function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
        ];
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function openCreate(): void
    {
        $this->authorize('create', Bidang::class);
        $this->resetForm();
        $this->showModal = true;
    }

    public function openEdit(int $id): void
    {
        $bidang = Bidang::findOrFail($id);
        $this->authorize('update', $bidang);

        $this->editingId = $bidang->id;
        $this->nama = $bidang->nama;
        $this->deskripsi = $bidang->deskripsi ?? '';
        $this->showModal = true;
    }

    public function save(): void
    {
        $this->validate();

        if ($this->editingId) {
            $bidang = Bidang::findOrFail($this->editingId);
            $this->authorize('update', $bidang);
            $bidang->update([
                'nama' => strip_tags($this->nama),
                'slug' => Str::slug(strip_tags($this->nama)),
                'deskripsi' => strip_tags($this->deskripsi),
            ]);
            $this->dispatch('toast', [['type' => 'success', 'message' => 'Bidang berhasil diperbarui.']]);
        } else {
            $this->authorize('create', Bidang::class);
            Bidang::create([
                'nama' => strip_tags($this->nama),
                'slug' => Str::slug(strip_tags($this->nama)),
                'deskripsi' => strip_tags($this->deskripsi),
            ]);
            $this->dispatch('toast', [['type' => 'success', 'message' => 'Bidang berhasil ditambahkan.']]);
        }

        $this->closeModal();
    }

    public function delete(int $id): void
    {
        $bidang = Bidang::findOrFail($id);
        $this->authorize('delete', $bidang);
        $bidang->delete();
        $this->dispatch('toast', [['type' => 'success', 'message' => 'Bidang berhasil dihapus.']]);
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
        $this->resetValidation();
    }

    public function render()
    {
        $this->authorize('viewAny', Bidang::class);

        $bidangs = Bidang::query()
            ->when($this->search, fn ($q) => $q->where('nama', 'like', "%{$this->search}%"))
            ->withCount('kegiatans')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.bidang.index', compact('bidangs'));
    }
}
