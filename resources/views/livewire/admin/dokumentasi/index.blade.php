<div>
    @php $title = 'Dokumentasi Kegiatan'; @endphp
    <div class="mb-6">
        <h2 class="text-xl font-bold text-slate-800">Galeri Dokumentasi</h2>
        <p class="text-sm text-slate-500">Total {{ $totalDokumentasi }} file dokumentasi</p>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-4 mb-6 flex flex-wrap gap-3">
        <input wire:model.live.debounce.300ms="keyword" type="text" placeholder="Cari kegiatan..." class="rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500 w-full sm:w-64">
        <select wire:model.live="kegiatan_id" class="rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500">
            <option value="">Semua Kegiatan</option>
            @foreach($kegiatanList as $k)
                <option value="{{ $k->id }}">{{ $k->judul }}</option>
            @endforeach
        </select>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @forelse($dokumentasi as $doc)
            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden group">
                <img src="{{ $doc->url }}" alt="{{ $doc->original_name }}" class="w-full h-28 object-cover">
                <div class="p-2">
                    <p class="text-xs font-medium text-slate-700 truncate">{{ $doc->kegiatan?->judul }}</p>
                    <div class="flex justify-between items-center mt-2">
                        <a href="{{ route('admin.kegiatan.show', $doc->kegiatan_id) }}" wire:navigate class="text-xs text-emerald-600">Lihat</a>
                        <button wire:click="delete({{ $doc->id }})" wire:confirm="Hapus dokumentasi?" class="text-xs text-red-600">Hapus</button>
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-slate-500 py-12">Tidak ada dokumentasi</p>
        @endforelse
    </div>
    <div class="mt-6">{{ $dokumentasi->links() }}</div>
</div>
