@extends('layouts.public')

@section('title', $kegiatan->judul)
@section('meta_description', $kegiatan->meta_description ?? Str::limit(strip_tags($kegiatan->deskripsi), 160))

@section('content')
    <article class="pt-32 pb-24" x-data="{ lightbox: false, imgUrl: '' }">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Breadcrumb --}}
            <x-public.breadcrumb :items="[
                ['label' => 'Kegiatan', 'url' => route('kegiatan.index')],
                ['label' => Str::limit($kegiatan->judul, 40)]
            ]" />

            <header class="mt-8">
                {{-- Post Category & Meta --}}
                <div class="flex flex-wrap items-center gap-3 text-xs font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    <span class="px-3.5 py-1.5 rounded-full bg-emerald-50 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400 shadow-sm border border-emerald-100/30">
                        {{ $kegiatan->kategori->nama }}
                    </span>
                    @if($kegiatan->bidang)
                        <span class="px-3.5 py-1.5 rounded-full bg-blue-50 dark:bg-blue-500/10 text-blue-700 dark:text-blue-400 shadow-sm border border-blue-100/30">
                            {{ $kegiatan->bidang->nama }}
                        </span>
                    @endif
                    <span>•</span>
                    <time datetime="{{ $kegiatan->tanggal_kegiatan->format('Y-m-d') }}" class="flex items-center gap-1.5 font-medium">
                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $kegiatan->tanggal_kegiatan->isoFormat('D MMMM Y') }}
                    </time>
                    @if($kegiatan->lokasi)
                        <span>•</span>
                        <span class="flex items-center gap-1.5 font-medium">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $kegiatan->lokasi->nama }}
                        </span>
                    @endif
                </div>

                {{-- Title --}}
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white mt-6 mb-8 leading-tight tracking-tight">
                    {{ $kegiatan->judul }}
                </h1>

                {{-- Publisher Info --}}
                <div class="flex items-center gap-3 border-y border-slate-100 dark:border-slate-800/80 py-4 mb-8">
                    <div class="w-9 h-9 rounded-full bg-emerald-600 text-white flex items-center justify-center text-sm font-semibold shadow-sm">
                        {{ strtoupper(substr($kegiatan->user->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-850 dark:text-slate-200">Diterbitkan oleh {{ $kegiatan->user->name }}</p>
                        <p class="text-2xs text-slate-400 dark:text-slate-500 font-medium">Dinas Lingkungan Hidup</p>
                    </div>
                </div>
            </header>

            {{-- Hero Thumbnail --}}
            @if($kegiatan->thumbnail)
                <div class="rounded-3xl overflow-hidden aspect-[16/9] mb-12 shadow-md bg-slate-100 dark:bg-slate-800">
                    <img src="{{ Storage::url($kegiatan->thumbnail) }}" 
                         alt="{{ $kegiatan->judul }}"
                         class="w-full h-full object-contain">
                </div>
            @endif

            {{-- Excerpt / Short Description --}}
            <div class="text-lg font-medium text-slate-650 dark:text-slate-300 leading-relaxed italic border-l-4 border-emerald-500 pl-6 mb-10">
                "{{ $kegiatan->deskripsi }}"
            </div>

            {{-- Detailed Content --}}
            <div class="prose prose-emerald dark:prose-invert max-w-none prose-content mb-16">
                {!! nl2br(e($kegiatan->isi_lengkap ?? $kegiatan->deskripsi)) !!}
            </div>

            {{-- Gallery Dokumentasi --}}
            @if($kegiatan->dokumentasi->count() > 0)
                <div class="border-t border-slate-100 dark:border-slate-800/80 pt-12 mb-16">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight mb-6">Galeri Dokumentasi Kegiatan</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @foreach($kegiatan->dokumentasi as $doc)
                            <div class="group relative aspect-video rounded-2xl overflow-hidden cursor-pointer bg-slate-100 dark:bg-slate-900 border border-slate-200/50 dark:border-slate-800/80 hover:shadow-lg transition-all"
                                 @click="lightbox = true; imgUrl = '{{ $doc->url }}'">
                                <img src="{{ $doc->url }}" 
                                     alt="Dokumentasi"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-emerald-950/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <svg class="w-7 h-7 text-white stroke-[2]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.637 10.637zM10.5 7.5v6m3-3h-6" /></svg>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

   

            {{-- Kegiatan Terkait --}}
            <div class="border-t border-slate-100 dark:border-slate-800/80 pt-16">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white tracking-tight mb-8">Kegiatan Terkait</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($kegiatanTerkait as $terkait)
                        <div class="h-full">
                            <x-public.kegiatan-card :kegiatan="$terkait" />
                        </div>
                    @endforeach
                </div>
            </div>

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
             class="fixed inset-0 z-50 bg-black/90 flex items-center justify-center p-4"
             @keydown.escape.window="lightbox = false">
            <button class="absolute top-6 right-6 text-white hover:text-slate-350 p-2" @click="lightbox = false">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
            <div class="max-w-4xl max-h-[85vh] overflow-hidden rounded-2xl shadow-2xl" @click.away="lightbox = false">
                <img :src="imgUrl" class="w-full h-full max-h-[85vh] object-contain">
            </div>
        </div>
    </article>
@endsection
