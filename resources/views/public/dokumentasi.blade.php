@extends('layouts.public')

@section('title', 'Galeri Dokumentasi')

@section('content')
    {{-- Header --}}
    <section class="pt-32 pb-16 bg-slate-50 dark:bg-slate-900 border-b border-slate-100 dark:border-slate-850" x-data="{ lightbox: false, imgUrl: '', details: '' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-public.breadcrumb :items="[['label' => 'Dokumentasi']]" />
            
            <div class="mt-8">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">Galeri Dokumentasi</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm sm:text-base">Kumpulan dokumentasi visual seluruh kegiatan lapangan Dinas Lingkungan Hidup.</p>
            </div>
        </div>
    </section>

    {{-- Masonry Gallery Section --}}
    <section class="py-16" x-data="{ lightbox: false, imgUrl: '', details: '' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($dokumentasi->count() > 0)
                <div class="masonry">
                    @foreach($dokumentasi as $doc)
                        <div class="masonry-item group relative overflow-hidden rounded-2xl bg-white dark:bg-slate-850 border border-slate-150 dark:border-slate-800 shadow-sm cursor-pointer hover:shadow-lg transition-all"
                             @click="lightbox = true; imgUrl = '{{ $doc->url }}'; details = '{{ $doc->kegiatan->judul }} ({{ $doc->kegiatan->tanggal_kegiatan->isoFormat('D MMMM Y') }})'">
                            
                            <img src="{{ $doc->url }}" 
                                 alt="{{ $doc->original_name }}"
                                 loading="lazy"
                                 class="w-full h-auto object-cover group-hover:scale-103 transition-transform duration-500 rounded-2xl">

                            {{-- Hover info overlay --}}
                            <div class="absolute inset-0 bg-emerald-950/75 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-5 rounded-2xl">
                                <div class="text-white space-y-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    <span class="px-2 py-1 rounded bg-emerald-500 text-3xs font-bold uppercase tracking-widest">
                                        {{ $doc->kegiatan->kategori->nama }}
                                    </span>
                                    <p class="text-xs font-bold leading-snug line-clamp-2">{{ $doc->kegiatan->judul }}</p>
                                    <p class="text-3xs text-emerald-350 font-medium">{{ $doc->kegiatan->tanggal_kegiatan->isoFormat('D MMMM Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-16">
                    {{ $dokumentasi->links() }}
                </div>
            @else
                <div class="text-center py-24 bg-white dark:bg-slate-850 rounded-3xl border border-slate-100 dark:border-slate-800">
                    <p class="text-slate-500 dark:text-slate-400">Belum ada foto dokumentasi yang diunggah.</p>
                </div>
            @endif

        </div>

        {{-- Lightbox Modal --}}
        <div x-show="lightbox" 
             x-cloak 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="fixed inset-0 z-50 bg-black/90 flex flex-col items-center justify-center p-4"
             @keydown.escape.window="lightbox = false">
            
            <button class="absolute top-6 right-6 text-white hover:text-slate-350 p-2" @click="lightbox = false">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
            
            <div class="max-w-4xl max-h-[80vh] overflow-hidden rounded-2xl shadow-2xl mb-4" @click.away="lightbox = false">
                <img :src="imgUrl" class="w-full h-full max-h-[80vh] object-contain">
            </div>

            <p class="text-sm font-semibold text-slate-350 text-center max-w-2xl px-4" x-text="details"></p>
        </div>
    </section>
@endsection
