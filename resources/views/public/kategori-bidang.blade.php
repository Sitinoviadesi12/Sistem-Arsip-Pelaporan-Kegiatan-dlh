@extends('layouts.public')

@section('title', 'Kategori & Bidang Dinas')

@section('content')
    {{-- Header Banner --}}
    <section class="pt-32 pb-16 bg-slate-50 dark:bg-slate-900 border-b border-slate-100 dark:border-slate-850">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-public.breadcrumb :items="[['label' => 'Kategori & Bidang']]" />
            
            <div class="mt-8">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">Kategori & Bidang Dinas</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm sm:text-base">Pembagian bidang fokus tugas dan kategori kegiatan yang dikelola oleh Dinas Lingkungan Hidup.</p>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-16 space-y-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Section 1: Bidang Dinas --}}
            <div class="mb-16">
                <div class="border-l-4 border-indigo-600 pl-4 mb-8">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Bidang Dinas Lingkungan Hidup</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Bidang struktural/operasional dinas yang menangani berbagai program lingkungan.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($bidang as $bdg)
                        <div class="p-6 rounded-3xl border border-slate-150 dark:border-slate-800 bg-white dark:bg-slate-850 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
                            <div>
                                <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center text-indigo-600 mb-4 font-bold text-base">
                                    {{ substr($bdg->nama, 0, 1) }}
                                </div>
                                <h3 class="font-bold text-lg text-slate-900 dark:text-white group-hover:text-indigo-650 dark:group-hover:text-indigo-400 transition-colors mb-2">
                                    {{ $bdg->nama }}
                                </h3>
                                <p class="text-sm text-slate-550 dark:text-slate-400 leading-relaxed">
                                    {{ $bdg->deskripsi ?? 'Pengelolaan tugas dan fungsi terkait bidang ' . $bdg->nama . ' di Dinas Lingkungan Hidup.' }}
                                </p>
                            </div>
                            <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800/60">
                                <a href="{{ route('kegiatan.index', ['bidang' => $bdg->slug]) }}" 
                                   class="inline-flex items-center gap-1.5 text-xs font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                                    Lihat Kegiatan Bidang Ini
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Section 2: Kategori Kegiatan --}}
            <div>
                <div class="border-l-4 border-emerald-600 pl-4 mb-8">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Kategori Kegiatan</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Jenis-jenis aktivitas, publikasi, dan aksi lingkungan yang diselenggarakan.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($kategori as $kat)
                        <div class="p-6 rounded-3xl border border-slate-150 dark:border-slate-800 bg-white dark:bg-slate-850 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
                            <div>
                                <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-500/10 flex items-center justify-center text-emerald-600 mb-4 font-bold text-base">
                                    {{ substr($kat->nama, 0, 1) }}
                                </div>
                                <h3 class="font-bold text-lg text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors mb-2">
                                    {{ $kat->nama }}
                                </h3>
                                <p class="text-sm text-slate-550 dark:text-slate-400 leading-relaxed">
                                    {{ $kat->deskripsi ?? 'Aktivitas dan laporan terkait kategori ' . $kat->nama . '.' }}
                                </p>
                            </div>
                            <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800/60">
                                <a href="{{ route('kegiatan.index', ['kategori' => $kat->slug]) }}" 
                                   class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400 hover:underline">
                                    Lihat Kegiatan Kategori Ini
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
@endsection
