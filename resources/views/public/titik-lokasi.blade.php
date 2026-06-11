@extends('layouts.public')

@section('title', 'Titik Lokasi')

@section('content')
    {{-- Header Banner --}}
    <section class="pt-32 pb-16 bg-slate-50 dark:bg-slate-900 border-b border-slate-100 dark:border-slate-850">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-public.breadcrumb :items="[['label' => 'Titik Lokasi']]" />
            
            <div class="mt-8">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">Titik Lokasi Kegiatan</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm sm:text-base">Daftar lokasi pelaksanaan pengawasan, rehabilitasi, dan monitoring lingkungan aktif.</p>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($lokasi as $lok)
                    <div class="p-5 rounded-2xl border border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-850 flex items-start gap-4 shadow-sm hover:shadow-md transition-all group">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-500/10 flex items-center justify-center text-emerald-600 shrink-0 mt-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div class="flex-1 flex flex-col justify-between h-full min-h-[70px]">
                            <div>
                                <h4 class="font-bold text-sm text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                                    {{ $lok->nama }}
                                </h4>
                                <p class="text-xs text-slate-500 dark:text-slate-450 mt-1 leading-relaxed">
                                    {{ $lok->alamat ?? 'Area operasional dinas, Kota Hijau' }}
                                </p>
                            </div>
                            <a href="{{ route('kegiatan.index', ['lokasi' => $lok->slug]) }}" 
                               class="inline-flex items-center gap-1 text-2xs font-semibold text-emerald-600 dark:text-emerald-400 hover:underline mt-3">
                                Lihat Kegiatan di Sini
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
