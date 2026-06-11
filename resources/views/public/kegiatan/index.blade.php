@extends('layouts.public')

@section('title', 'Daftar Kegiatan')

@section('content')
    {{-- Header Banner --}}
    <section class="pt-32 pb-16 bg-slate-50 dark:bg-slate-900 border-b border-slate-100 dark:border-slate-850">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-public.breadcrumb :items="[['label' => 'Kegiatan']]" />
            
            <div class="mt-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">Semua Kegiatan</h1>
                    <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm sm:text-base">Temukan berita, perkembangan berkala, dan dokumentasi aksi DLH.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Filter & Listing --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Search & Filter Bar --}}
            <form action="{{ route('kegiatan.index') }}" method="GET" class="mb-12 space-y-4 md:space-y-0 md:flex md:flex-wrap md:items-center md:gap-4">
                {{-- Search --}}
                <div class="relative flex-[2] min-w-[240px] md:min-w-[300px]">
                    <input type="text" 
                           name="keyword" 
                           value="{{ request('keyword') }}" 
                           placeholder="Cari judul atau isi kegiatan..." 
                           class="w-full pl-12 pr-4 py-3.5 rounded-2xl bg-white dark:bg-slate-850 border border-slate-200 dark:border-slate-800 text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-colors shadow-sm">
                    <svg class="absolute top-1/2 left-4 -translate-y-1/2 w-5 h-5 text-slate-400 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>

                {{-- Kategori Dropdown --}}
                <div class="w-full md:w-48 shrink-0">
                    <select name="kategori" 
                            onchange="this.form.submit()"
                            class="w-full px-4 py-3.5 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-colors shadow-sm">
                        <option value="">Semua Kategori</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->slug }}" {{ request('kategori') == $kat->slug ? 'selected' : '' }}>
                                {{ $kat->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Lokasi Dropdown --}}
                <div class="w-full md:w-48 shrink-0">
                    <select name="lokasi" 
                            onchange="this.form.submit()"
                            class="w-full px-4 py-3.5 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-colors shadow-sm">
                        <option value="">Semua Lokasi</option>
                        @foreach($lokasiList as $lok)
                            <option value="{{ $lok->slug }}" {{ request('lokasi') == $lok->slug ? 'selected' : '' }}>
                                {{ $lok->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Bidang Dropdown --}}
                <div class="w-full md:w-56 shrink-0">
                    <select name="bidang" 
                            onchange="this.form.submit()"
                            class="w-full px-4 py-3.5 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-colors shadow-sm">
                        <option value="">Semua Bidang</option>
                        @foreach($bidangList as $bdg)
                            <option value="{{ $bdg->slug }}" {{ request('bidang') == $bdg->slug ? 'selected' : '' }}>
                                {{ $bdg->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Submit --}}
                <button type="submit" class="w-full md:w-auto px-6 py-3.5 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold shadow-md transition-all">
                    Cari
                </button>

                @if(request('keyword') || request('kategori') || request('lokasi') || request('bidang'))
                    <a href="{{ route('kegiatan.index') }}" class="block text-center md:inline-block px-6 py-3.5 rounded-2xl bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 text-slate-700 dark:text-slate-200 font-semibold transition-colors">
                        Reset
                    </a>
                @endif
            </form>

            {{-- Listing Grid --}}
            @if($kegiatan->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($kegiatan as $item)
                        <x-public.kegiatan-card :kegiatan="$item" />
                    @endforeach
                </div>

                {{-- Modern Pagination --}}
                <div class="mt-16">
                    {{ $kegiatan->links() }}
                </div>
            @else
                <div class="text-center py-24 bg-white dark:bg-slate-850 rounded-3xl border border-slate-100 dark:border-slate-800">
                    <div class="w-16 h-16 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center mx-auto mb-6 text-slate-400">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Kegiatan Tidak Ditemukan</h3>
                    <p class="text-slate-500 dark:text-slate-400 max-w-md mx-auto">Kami tidak dapat menemukan kegiatan yang Anda cari. Coba ubah kata kunci atau pilih kategori lain.</p>
                </div>
            @endif

        </div>
    </section>
@endsection
