<div>
    @php $title = 'Lokasi Kegiatan'; @endphp
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-bold text-slate-800 dark:text-slate-100">Master Lokasi</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">Kelola lokasi kegiatan DLH</p>
        </div>
        <button wire:click="openCreate" class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 text-sm font-medium">
            + Tambah Lokasi
        </button>
    </div>

    <div class="bg-white dark:bg-slate-850 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm mb-4 p-4 transition-colors duration-200">
        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari lokasi..." class="w-full sm:w-72 rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100 text-sm focus:border-emerald-500 focus:ring-emerald-500 placeholder-slate-400 dark:placeholder-slate-500">
    </div>

    <div class="bg-white dark:bg-slate-850 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden transition-colors duration-200">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-400">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold">Nama</th>
                        <th class="px-6 py-3 text-left font-semibold">Alamat</th>
                        <th class="px-6 py-3 text-left font-semibold">Kegiatan</th>
                        <th class="px-6 py-3 text-left font-semibold">Status</th>
                        <th class="px-6 py-3 text-right font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/80">
                    @forelse($lokasis as $lokasi)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/40 transition-colors duration-150">
                            <td class="px-6 py-3 font-medium text-slate-800 dark:text-slate-100">{{ $lokasi->nama }}</td>
                            <td class="px-6 py-3 text-slate-500 dark:text-slate-400">{{ Str::limit($lokasi->alamat, 50) }}</td>
                            <td class="px-6 py-3 text-slate-600 dark:text-slate-300">{{ $lokasi->kegiatan_count }}</td>
                            <td class="px-6 py-3">
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $lokasi->is_active ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-400' : 'bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-300' }}">{{ $lokasi->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                            </td>
                            <td class="px-6 py-3 text-right space-x-3">
                                <button wire:click="openEdit({{ $lokasi->id }})" class="text-emerald-600 dark:text-emerald-450 hover:text-emerald-800 dark:hover:text-emerald-300 font-medium">Edit</button>
                                <button wire:click="delete({{ $lokasi->id }})" wire:confirm="Hapus lokasi ini?" class="text-red-600 dark:text-red-450 hover:text-red-800 dark:hover:text-red-300 font-medium">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-6 py-8 text-center text-slate-500 dark:text-slate-400">Tidak ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-3 border-t border-slate-100 dark:border-slate-800">{{ $lokasis->links() }}</div>
    </div>

    @if($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 dark:bg-slate-900/80 backdrop-blur-sm">
            <div class="bg-white dark:bg-slate-850 rounded-xl shadow-xl border border-slate-200 dark:border-slate-700 w-full max-w-md p-6">
                <h3 class="text-lg font-semibold mb-4 text-slate-800 dark:text-slate-100">{{ $editingId ? 'Edit' : 'Tambah' }} Lokasi</h3>
                <form wire:submit="save" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nama</label>
                        <input wire:model="nama" type="text" class="w-full rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                        @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Alamat</label>
                        <textarea wire:model="alamat" rows="3" class="w-full rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100 text-sm focus:border-emerald-500 focus:ring-emerald-500"></textarea>
                    </div>
                    <label class="flex items-center gap-2 text-sm text-slate-700 dark:text-slate-300">
                        <input wire:model="is_active" type="checkbox" class="rounded border-slate-300 dark:border-slate-700 dark:bg-slate-800 text-emerald-600 focus:ring-emerald-500">
                        Aktif
                    </label>
                    <div class="flex gap-3 justify-end pt-4 mt-2 border-t border-slate-100 dark:border-slate-800">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-700 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700">Batal</button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
