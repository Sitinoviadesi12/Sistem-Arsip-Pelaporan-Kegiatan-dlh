<div>
    @php $title = 'Detail Kegiatan'; @endphp
    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-6">
        <div>
            <a href="{{ route('admin.kegiatan.index') }}" wire:navigate class="text-sm text-emerald-600 hover:underline">← Kembali</a>
            <h2 class="text-xl font-bold text-slate-800 mt-2">{{ $kegiatan->judul }}</h2>
            <p class="text-sm text-slate-500">{{ $kegiatan->slug }} · {{ $kegiatan->tanggal_kegiatan->format('d F Y') }}</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.kegiatan.edit', $kegiatan) }}" wire:navigate class="px-4 py-2 text-sm border rounded-lg hover:bg-slate-50">Edit</a>
            @if($kegiatan->status === 'draft')
                <button wire:click="publish" class="px-4 py-2 text-sm bg-emerald-600 text-white rounded-lg hover:bg-emerald-700">Publish</button>
            @else
                <button wire:click="unpublish" class="px-4 py-2 text-sm bg-amber-500 text-white rounded-lg hover:bg-amber-600">Unpublish</button>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            @if($kegiatan->thumbnail)
                <img src="{{ Storage::url($kegiatan->thumbnail) }}" class="w-full h-64 object-contain bg-slate-100 dark:bg-slate-800 rounded-xl" alt="{{ $kegiatan->judul }}">
            @endif
            <div class="bg-white rounded-xl border border-slate-200 p-6">
                <h3 class="font-semibold mb-2">Deskripsi</h3>
                <p class="text-slate-700 text-sm">{{ $kegiatan->deskripsi }}</p>
            </div>
            @if($kegiatan->isi_lengkap)
                <div class="bg-white rounded-xl border border-slate-200 p-6 prose prose-sm max-w-none">
                    <h3 class="font-semibold mb-2">Isi Lengkap</h3>
                    <div class="text-slate-700 whitespace-pre-wrap">{{ $kegiatan->isi_lengkap }}</div>
                </div>
            @endif
        </div>
        <div class="space-y-4">
            <div class="bg-white rounded-xl border border-slate-200 p-5 text-sm space-y-3">
                <div class="flex justify-between"><span class="text-slate-500">Status</span>
                    <span class="px-2 py-0.5 rounded-full text-xs {{ $kegiatan->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">{{ ucfirst($kegiatan->status) }}</span>
                </div>
                <div class="flex justify-between"><span class="text-slate-500">Kategori</span><span>{{ $kegiatan->kategori?->nama }}</span></div>
                <div class="flex justify-between"><span class="text-slate-500">Lokasi</span><span>{{ $kegiatan->lokasi?->nama }}</span></div>
                <div class="flex justify-between"><span class="text-slate-500">Penulis</span><span>{{ $kegiatan->user?->name }}</span></div>
                @if($kegiatan->published_at)
                    <div class="flex justify-between"><span class="text-slate-500">Published</span><span>{{ $kegiatan->published_at->format('d/m/Y H:i') }}</span></div>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-8 bg-white rounded-xl border border-slate-200 p-6">
        <h3 class="font-semibold text-slate-800 mb-4">Galeri Dokumentasi</h3>
        <form wire:submit="uploadDokumentasi" class="mb-6 flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[200px]">
                <input wire:model="fotoBaru" type="file" accept="image/*" multiple class="w-full text-sm">
                <div wire:loading wire:target="fotoBaru" class="text-xs text-slate-500">Memuat preview...</div>
            </div>
            <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-lg text-sm hover:bg-emerald-700">Upload</button>
        </form>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @forelse($kegiatan->dokumentasi as $doc)
                <div class="group relative rounded-lg overflow-hidden border border-slate-200">
                    <img src="{{ $doc->url }}" alt="{{ $doc->original_name }}" class="w-full h-32 object-cover">
                    <button wire:click="deleteDokumentasi({{ $doc->id }})" wire:confirm="Hapus foto ini?"
                            class="absolute top-2 right-2 w-7 h-7 bg-red-600 text-white rounded-full text-xs opacity-0 group-hover:opacity-100 transition">×</button>
                </div>
            @empty
                <p class="col-span-full text-center text-slate-500 py-8">Belum ada dokumentasi</p>
            @endforelse
        </div>
    </div>
</div>
