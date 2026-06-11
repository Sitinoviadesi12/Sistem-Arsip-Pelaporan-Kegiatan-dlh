<div>
    @php $title = 'Kategori Kegiatan'; @endphp
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-bold text-slate-800 dark:text-slate-100">Master Kategori</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">Kelola kategori kegiatan DLH</p>
        </div>
        <button wire:click="openCreate" class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 text-sm font-medium">
            + Tambah Kategori
        </button>
    </div>

    <div class="bg-white dark:bg-slate-850 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm mb-4 p-4 transition-colors duration-200">
        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari kategori..." class="w-full sm:w-72 rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 text-sm focus:border-emerald-500 focus:ring-emerald-500">
    </div>

    <div class="bg-white dark:bg-slate-850 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden transition-colors duration-200">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700">
                <tr>
                    <th class="px-6 py-3 text-left">Nama</th>
                    <th class="px-6 py-3 text-left">Slug</th>
                    <th class="px-6 py-3 text-left">Kegiatan</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                @forelse($kategoris as $kategori)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <td class="px-6 py-3 font-medium text-slate-800 dark:text-slate-100">{{ $kategori->nama }}</td>
                        <td class="px-6 py-3 text-slate-500 dark:text-slate-400">{{ $kategori->slug }}</td>
                        <td class="px-6 py-3 text-slate-600 dark:text-slate-300">{{ $kategori->kegiatan_count }}</td>
                        <td class="px-6 py-3">
                            <span class="px-2 py-0.5 rounded-full text-xs {{ $kategori->is_active ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : 'bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-400' }}">{{ $kategori->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                        </td>
                        <td class="px-6 py-3 text-right space-x-2">
                            <button wire:click="openEdit({{ $kategori->id }})" class="text-emerald-600 hover:underline">Edit</button>
                            <button wire:click="delete({{ $kategori->id }})" wire:confirm="Hapus kategori ini?" class="text-red-600 hover:underline">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-8 text-center text-slate-500">Tidak ada data</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-3 border-t">{{ $kategoris->links() }}</div>
    </div>

    @if($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
            <div class="bg-white dark:bg-slate-850 rounded-xl shadow-xl w-full max-w-md p-6" @click.outside="$wire.closeModal()">
                <h3 class="text-lg font-semibold mb-4 text-slate-800 dark:text-slate-100">{{ $editingId ? 'Edit' : 'Tambah' }} Kategori</h3>
                <form wire:submit="save" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nama</label>
                        <input wire:model="nama" type="text" class="w-full rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                        @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Deskripsi</label>
                        <textarea wire:model="deskripsi" rows="3" class="w-full rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 text-sm focus:border-emerald-500 focus:ring-emerald-500"></textarea>
                    </div>
                    <label class="flex items-center gap-2 text-sm text-slate-700 dark:text-slate-300">
                        <input wire:model="is_active" type="checkbox" class="rounded border-slate-300 dark:border-slate-700 dark:bg-slate-900 text-emerald-600 focus:ring-emerald-500">
                        Aktif
                    </label>
                    <div class="flex gap-2 justify-end pt-2">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 text-sm border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800">Batal</button>
                        <button type="submit" class="px-4 py-2 text-sm bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 shadow-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
