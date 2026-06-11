@props(['kegiatan'])

<article class="group bg-white dark:bg-slate-850 rounded-3xl border border-slate-100 dark:border-slate-800 overflow-hidden shadow-sm hover:shadow-xl dark:hover:shadow-emerald-950/20 card-hover flex flex-col h-full">
    
    {{-- Thumbnail --}}
    <div class="relative overflow-hidden aspect-[16/10] bg-slate-100 dark:bg-slate-800">
        @if($kegiatan->thumbnail)
            <img src="{{ Storage::url($kegiatan->thumbnail) }}" 
                 alt="{{ $kegiatan->judul }}"
                 loading="lazy"
                 class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-700 ease-out">
        @else
            <div class="w-full h-full flex items-center justify-center text-slate-400 bg-gradient-to-br from-slate-100 to-slate-200 dark:from-slate-800 dark:to-slate-850">
                <svg class="w-12 h-12 stroke-[1.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
            </div>
        @endif
        
        {{-- Category and Bidang Tags --}}
        <div class="absolute top-4 left-4 flex flex-wrap gap-2">
            <span class="px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider bg-white/90 dark:bg-slate-900/90 text-slate-800 dark:text-slate-100 backdrop-blur-md shadow-sm">
                {{ $kegiatan->kategori->nama }}
            </span>
            @if($kegiatan->bidang)
                <span class="px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider bg-emerald-600/90 text-white backdrop-blur-md shadow-sm">
                    {{ $kegiatan->bidang->nama }}
                </span>
            @endif
        </div>
    </div>

    {{-- Content --}}
    <div class="p-6 sm:p-8 flex flex-col flex-1">
        
        {{-- Date & Location --}}
        <header class="flex flex-wrap items-center gap-y-1 gap-x-4 text-xs font-medium text-slate-400 dark:text-slate-500 mb-3">
            <time datetime="{{ $kegiatan->tanggal_kegiatan->format('Y-m-d') }}" class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                {{ $kegiatan->tanggal_kegiatan->isoFormat('D MMMM Y') }}
            </time>
            @if($kegiatan->lokasi)
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $kegiatan->lokasi->nama }}
                </span>
            @endif
        </header>

        {{-- Title --}}
        <h3 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors line-clamp-2">
            <a href="{{ route('kegiatan.show', $kegiatan->slug) }}">
                {{ $kegiatan->judul }}
            </a>
        </h3>

        {{-- Excerpt --}}
        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6 line-clamp-3">
            {{ $kegiatan->deskripsi }}
        </p>

        {{-- Action Button --}}
        <footer class="mt-auto pt-6 border-t border-slate-100 dark:border-slate-800">
            <a href="{{ route('kegiatan.show', $kegiatan->slug) }}" 
               class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 group/btn"
               aria-label="Baca selengkapnya tentang {{ $kegiatan->judul }}">
                Baca Selengkapnya
                <svg class="w-4 h-4 transition-transform duration-300 group-hover/btn:translate-x-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </footer>
    </div>
</article>
