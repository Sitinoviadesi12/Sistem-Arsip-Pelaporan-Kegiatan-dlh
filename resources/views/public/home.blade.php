@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
    {{-- Hero Section --}}
    <section class="relative min-h-screen flex items-center justify-center pt-24 pb-16" style="overflow: hidden;">
        {{-- Background Image Parallax (inline style) --}}
        <div style="
                position: absolute;
                inset: 0;
                background-image: url('{{ asset('bg-hero.png') }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                z-index: -30;
            "></div>

        {{-- Solid Black Overlay agar terlihat gelap --}}
        <div style="
                position: absolute;
                inset: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: -20;
            "></div>




        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                {{-- Hero Text --}}
                <div class="lg:col-span-7 space-y-8 text-center lg:text-left">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-900/80 text-emerald-300 text-xs font-semibold uppercase tracking-wider animate-fade-in border border-emerald-500/30">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        Sistem Informasi Resmi SIAPK
                    </div>

                    <h1
                        class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white drop-shadow-lg leading-tight animate-fade-in-up">
                        Menjaga Lingkungan, <br>
                        <span class="text-emerald-300 drop-shadow-md">Menginspirasi Masa Depan</span>
                    </h1>

                    <p
                        class="text-base sm:text-lg text-slate-100 drop-shadow-md max-w-2xl mx-auto lg:mx-0 leading-relaxed animate-fade-in-up delay-100 font-medium">
                        Sistem Arsip Pelaporan Kegiatan Dinas Lingkungan Hidup (SIAPK-DLH). Temukan informasi lengkap, kegiatan,
                        laporan, dan dokumentasi pengelolaan lingkungan hidup secara transparan dan akuntabel.
                    </p>

                    <div
                        class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 animate-fade-in-up delay-200">
                        <a href="{{ route('kegiatan.index') }}"
                            class="w-full sm:w-auto px-8 py-4 rounded-full bg-emerald-500 text-white hover:bg-emerald-600 font-bold text-center shadow-lg shadow-emerald-900/20 hover:-translate-y-0.5 transition-all duration-200 border border-emerald-400">
                            Jelajahi Kegiatan
                        </a>
                        <a href="{{ route('tentang') }}"
                            class="w-full sm:w-auto px-8 py-4 rounded-full bg-slate-900/80 text-white border border-slate-700 hover:bg-slate-800 font-semibold text-center hover:-translate-y-0.5 transition-all duration-200 backdrop-blur-sm">
                            Tentang Kami
                        </a>
                    </div>

                    <div class="pt-3 flex items-center justify-center lg:justify-start gap-2 text-base sm:text-lg text-slate-200 animate-fade-in-up delay-300">
                        <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        <span>Kunjungi Website Utama:</span>
                        <a href="https://dlh.tegalkab.go.id/" target="_blank" rel="noopener noreferrer" class="text-emerald-400 hover:text-emerald-300 font-bold hover:underline transition-all">
                            dlh.tegalkab.go.id
                        </a>
                    </div>
                </div>

                {{-- Hero Visual / Card --}}
                <div class="lg:col-span-5 relative animate-fade-in-up delay-300 hidden lg:block">
                    <div class="relative w-full aspect-square max-w-[450px] mx-auto">
                        <!-- Decorative Frame -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-emerald-500/20 to-teal-500/20 rounded-3xl rotate-6 scale-95 blur-sm -z-10">
                        </div>
                        <div
                            class="absolute inset-0 bg-slate-900/5 dark:bg-white/5 rounded-3xl -rotate-3 scale-98 blur-sm -z-10">
                        </div>

                        <!-- Main Frame / Mockup -->
                        <div
                            class="w-full h-full rounded-3xl border border-white/20 bg-slate-900/70 backdrop-blur-xl shadow-2xl p-6 flex flex-col justify-between overflow-hidden">
                            <div class="flex items-center justify-between border-b border-white/10 pb-4">
                                <div class="flex items-center gap-2">
                                    <span class="w-3.5 h-3.5 rounded-full bg-rose-400"></span>
                                    <span class="w-3.5 h-3.5 rounded-full bg-amber-400"></span>
                                    <span class="w-3.5 h-3.5 rounded-full bg-emerald-400"></span>
                                </div>
                                <span class="text-xs text-slate-300 font-mono">siapk-DLH</span>
                            </div>

                            <div class="my-auto py-4 space-y-4">
                                @if(isset($kegiatanTerbaru) && $kegiatanTerbaru->count() > 0)
                                    <div class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider mb-2">Kegiatan Terbaru</div>
                                    @foreach($kegiatanTerbaru->take(2) as $kegiatan)
                                        <a href="{{ route('kegiatan.show', $kegiatan->slug) }}" class="flex gap-4 items-start group hover:bg-white/5 p-2 -mx-2 rounded-xl transition-all duration-300">
                                            @if($kegiatan->thumbnail)
                                                <img src="{{ Storage::url($kegiatan->thumbnail) }}" alt="{{ $kegiatan->judul }}" class="w-12 h-12 rounded-xl object-cover shrink-0 border border-white/10 shadow-sm group-hover:scale-105 transition-transform duration-300">
                                            @else
                                                <div class="w-12 h-12 rounded-xl bg-emerald-500/20 flex items-center justify-center text-emerald-400 shrink-0 border border-white/10 group-hover:scale-105 transition-transform duration-300">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                            <div>
                                                <span class="text-[10px] uppercase font-bold text-emerald-400 tracking-wider mb-0.5 block line-clamp-1">{{ $kegiatan->kategori->nama ?? 'Umum' }}</span>
                                                <h4 class="font-bold text-white text-sm leading-snug group-hover:text-emerald-300 transition-colors line-clamp-2">{{ $kegiatan->judul }}</h4>
                                                <p class="text-[10px] text-slate-400 mt-1 flex items-center gap-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    {{ $kegiatan->published_at ? $kegiatan->published_at->diffForHumans() : 'Baru saja' }}
                                                </p>
                                            </div>
                                        </a>
                                    @endforeach
                                @else
                                    <div class="flex gap-4 items-start">
                                        <div class="w-12 h-12 rounded-xl bg-emerald-500/20 flex items-center justify-center text-emerald-400 shrink-0">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-white text-sm">Pelestarian Lingkungan</h4>
                                            <p class="text-xs text-slate-300 mt-1">Laporan rutin, penanaman pohon, uji emisi, dan pengelolaan sampah terpadu.</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-4 items-start">
                                        <div class="w-12 h-12 rounded-xl bg-emerald-500/20 flex items-center justify-center text-emerald-400 shrink-0">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-white text-sm">Respon Cepat & Tanggap</h4>
                                            <p class="text-xs text-slate-300 mt-1">Mengatasi pencemaran udara, limbah industri, dan aduan kerusakan ekosistem.</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div
                                class="flex items-center justify-between border-t border-white/10 pt-4 text-xs font-semibold text-emerald-400">
                                <span>#UntukLingkunganLebihBaik</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-12 bg-white dark:bg-slate-950 border-y border-slate-200/60 dark:border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-6 lg:gap-8">
                <a href="{{ route('kegiatan.index') }}"
                    class="p-6 text-center border-r border-slate-100 dark:border-slate-900 last:border-0 hover:bg-slate-50 dark:hover:bg-slate-900/40 rounded-2xl transition-all block">
                    <span
                        class="block text-4xl sm:text-5xl font-extrabold text-emerald-600 dark:text-emerald-400 leading-none">{{ $stats['kegiatan'] }}</span>
                    <span
                        class="block text-sm font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mt-3">Kegiatan
                        Published</span>
                </a>
                <a href="{{ route('kategori-bidang') }}"
                    class="p-6 text-center border-r border-slate-100 dark:border-slate-900 lg:border-r last:border-0 hover:bg-slate-50 dark:hover:bg-slate-900/40 rounded-2xl transition-all block">
                    <span
                        class="block text-4xl sm:text-5xl font-extrabold text-emerald-600 dark:text-emerald-400 leading-none">{{ $stats['kategori'] }}</span>
                    <span
                        class="block text-sm font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mt-3">Kategori
                        Kegiatan</span>
                </a>
                <a href="{{ route('kategori-bidang') }}"
                    class="p-6 text-center border-r border-slate-100 dark:border-slate-900 lg:border-r last:border-0 hover:bg-slate-50 dark:hover:bg-slate-900/40 rounded-2xl transition-all block">
                    <span
                        class="block text-4xl sm:text-5xl font-extrabold text-indigo-600 dark:text-indigo-400 leading-none">{{ $stats['bidang'] }}</span>
                    <span
                        class="block text-sm font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mt-3">Bidang
                        Dinas</span>
                </a>
                <a href="{{ route('titik-lokasi') }}"
                    class="p-6 text-center border-r border-slate-100 dark:border-slate-900 last:border-0 hover:bg-slate-50 dark:hover:bg-slate-900/40 rounded-2xl transition-all block">
                    <span
                        class="block text-4xl sm:text-5xl font-extrabold text-emerald-600 dark:text-emerald-400 leading-none">{{ $stats['lokasi'] }}</span>
                    <span
                        class="block text-sm font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mt-3">Titik
                        Lokasi</span>
                </a>
                <a href="{{ route('dokumentasi.index') }}"
                    class="p-6 text-center hover:bg-slate-50 dark:hover:bg-slate-900/40 rounded-2xl transition-all block">
                    <span
                        class="block text-4xl sm:text-5xl font-extrabold text-emerald-600 dark:text-emerald-400 leading-none">{{ $stats['dokumentasi'] }}</span>
                    <span
                        class="block text-sm font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mt-3">Foto
                        Dokumentasi</span>
                </a>
            </div>
        </div>
    </section>

    {{-- Kegiatan Terbaru --}}
    <section class="py-24 bg-slate-50 dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 sm:mb-16">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        Kegiatan Terbaru
                    </h2>
                    <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm sm:text-base">
                        Ikuti perkembangan aktivitas, monitoring, dan aksi nyata Dinas Lingkungan Hidup.
                    </p>
                </div>
                <a href="{{ route('kegiatan.index') }}"
                    class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-850 font-semibold text-slate-700 dark:text-slate-200 hover:text-emerald-600 dark:hover:text-emerald-400 hover:border-emerald-500 dark:hover:border-emerald-500 transition-colors shadow-sm self-start md:self-auto">
                    Semua Kegiatan
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                        </path>
                    </svg>
                </a>
            </div>

            @if($kegiatanTerbaru->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($kegiatanTerbaru as $kegiatan)
                        <div class="h-full">
                            <x-public.kegiatan-card :kegiatan="$kegiatan" />
                        </div>
                    @endforeach
                </div>
            @else
                <div
                    class="text-center py-20 bg-white dark:bg-slate-850 rounded-3xl border border-slate-100 dark:border-slate-800">
                    <p class="text-slate-500 dark:text-slate-400">Belum ada kegiatan yang dipublikasikan.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- Dokumentasi Terbaru --}}
    <section class="py-24 bg-white dark:bg-slate-950 border-t border-slate-100 dark:border-slate-900"
        x-data="{ lightbox: false, imgUrl: '' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">Galeri
                    Dokumentasi</h2>
                <p class="text-slate-500 dark:text-slate-400 mt-3 text-sm sm:text-base">Melihat lebih dekat implementasi
                    program kerja Dinas Lingkungan Hidup di lapangan.</p>
            </div>

            @if($dokumentasiTerbaru->count() > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($dokumentasiTerbaru as $doc)
                        <div class="group relative overflow-hidden aspect-square rounded-2xl bg-slate-100 dark:bg-slate-900 border border-slate-200/50 dark:border-slate-800/80 cursor-pointer shadow-sm hover:shadow-lg transition-all"
                            @click="lightbox = true; imgUrl = '{{ $doc->url }}'">
                            <img src="{{ $doc->url }}" alt="{{ $doc->original_name }}" loading="lazy"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                            {{-- Hover Overlay --}}
                            <div
                                class="absolute inset-0 bg-emerald-950/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center p-4">
                                <div
                                    class="text-center text-white space-y-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    <svg class="w-8 h-8 mx-auto stroke-[1.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.637 10.637zM10.5 7.5v6m3-3h-6" />
                                    </svg>
                                    <p class="text-xs font-semibold line-clamp-2">{{ $doc->kegiatan->judul }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('dokumentasi.index') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-slate-100 hover:bg-slate-200 dark:bg-slate-900 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-300 text-sm font-semibold transition-colors">
                        Lihat Seluruh Galeri
                    </a>
                </div>
            @else
                <div class="text-center py-16 bg-slate-50 dark:bg-slate-900 rounded-3xl">
                    <p class="text-slate-500 dark:text-slate-400">Belum ada dokumentasi foto yang dipublikasikan.</p>
                </div>
            @endif

        </div>

        {{-- Lightbox Modal --}}
        <div x-show="lightbox" x-cloak x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="fixed inset-0 z-50 bg-black/90 flex items-center justify-center p-4"
            @keydown.escape.window="lightbox = false">
            <button class="absolute top-6 right-6 text-white hover:text-slate-300 p-2" @click="lightbox = false">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="max-w-4xl max-h-[85vh] overflow-hidden rounded-2xl shadow-2xl" @click.away="lightbox = false">
                <img :src="imgUrl" class="w-full h-full max-h-[85vh] object-contain">
            </div>
        </div>
    </section>

    {{-- CTA / Aksi Nyata --}}
    <section class="py-24 bg-slate-900 text-white relative overflow-hidden border-t border-slate-800">
        <div
            class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-emerald-950/40 via-slate-900 to-slate-900 -z-10">
        </div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-8">
            <h2 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight">
                Mari Wujudkan Lingkungan Hidup <br>
                <span class="gradient-text bg-gradient-to-r from-emerald-400 to-teal-300">Yang Bersih, Sehat &
                    Lestari</span>
            </h2>
            <p class="text-slate-400 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed">
                Anda juga dapat berpartisipasi menjaga lingkungan sekitar. Laporkan kejadian pencemaran atau ajukan
                kerjasama program lingkungan hidup melalui layanan kontak kami.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('kontak') }}"
                    class="w-full sm:w-auto px-8 py-4 rounded-full bg-emerald-600 hover:bg-emerald-500 font-semibold shadow-lg shadow-emerald-500/20 hover:shadow-emerald-500/35 transition-all">
                    Hubungi Kami
                </a>
                <a href="{{ route('kegiatan.index') }}"
                    class="w-full sm:w-auto px-8 py-4 rounded-full border border-slate-700 hover:border-slate-650 hover:bg-white/5 font-semibold transition-all">
                    Lihat Aksi Kami
                </a>
            </div>
        </div>
    </section>
@endsection