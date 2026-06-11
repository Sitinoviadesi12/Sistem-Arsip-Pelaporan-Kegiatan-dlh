@extends('layouts.public')

@section('title', 'Hubungi Kami')

@section('content')
    {{-- Header Banner --}}
    <section class="pt-32 pb-16 bg-slate-50 dark:bg-slate-900 border-b border-slate-100 dark:border-slate-850">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-public.breadcrumb :items="[['label' => 'Kontak']]" />

            <div class="mt-8">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">Hubungi Kami
                </h1>
                <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm sm:text-base">Silakan hubungi kami untuk
                    informasi, aduan lingkungan, dan kolaborasi program.</p>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

                {{-- Contact Info Cards --}}
                <div class="lg:col-span-5 space-y-6">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Informasi Kontak</h2>

                    {{-- Alamat --}}
                    <div
                        class="flex gap-4 p-6 rounded-3xl bg-white dark:bg-slate-850 border border-slate-100 dark:border-slate-800 shadow-sm">
                        <div
                            class="w-12 h-12 rounded-2xl bg-emerald-100 dark:bg-emerald-500/10 flex items-center justify-center text-emerald-600 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 dark:text-white">Alamat Kantor</h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Jl. Prof. M. Yamin No. 559 Kudaile,
                                Kec. Slawi Kabupaten Tegal, Prov. Jawa Tengah, 52413</p>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div
                        class="flex gap-4 p-6 rounded-3xl bg-white dark:bg-slate-850 border border-slate-100 dark:border-slate-800 shadow-sm">
                        <div
                            class="w-12 h-12 rounded-2xl bg-emerald-100 dark:bg-emerald-500/10 flex items-center justify-center text-emerald-600 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 dark:text-white">Alamat Email</h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">dlhkabupatentegal@gmail.com</p>
                        </div>
                    </div>

                    {{-- Telepon --}}
                    <div
                        class="flex gap-4 p-6 rounded-3xl bg-white dark:bg-slate-850 border border-slate-100 dark:border-slate-800 shadow-sm">
                        <div
                            class="w-12 h-12 rounded-2xl bg-emerald-100 dark:bg-emerald-500/10 flex items-center justify-center text-emerald-600 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 dark:text-white">Hubungi Kami</h3>
                            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">(0283) – 491159</p>
                        </div>
                    </div>

                </div>

                {{-- Real Form --}}
                <div
                    class="lg:col-span-7 bg-white dark:bg-slate-850 border border-slate-150 dark:border-slate-800 p-8 sm:p-10 rounded-3xl shadow-sm">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Formulir Pesan</h2>

                    {{-- Flash Messages --}}
                    @if(session('success'))
                        <div
                            class="mb-6 p-4 rounded-xl bg-emerald-50 dark:bg-emerald-500/10 border border-emerald-200 dark:border-emerald-500/20 text-emerald-700 dark:text-emerald-400 text-sm flex items-center gap-3">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div
                            class="mb-6 p-4 rounded-xl bg-red-50 dark:bg-red-500/10 border border-red-200 dark:border-red-500/20 text-red-700 dark:text-red-400 text-sm flex items-center gap-3">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('kontak.kirim') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="nama" class="text-sm font-semibold text-slate-700 dark:text-slate-350">Nama
                                    Lengkap</label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-800 bg-transparent text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                                @error('nama') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div class="space-y-2">
                                <label for="email" class="text-sm font-semibold text-slate-700 dark:text-slate-350">Alamat
                                    Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-800 bg-transparent text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                                @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="subjek"
                                class="text-sm font-semibold text-slate-700 dark:text-slate-350">Subjek</label>
                            <input type="text" id="subjek" name="subjek" value="{{ old('subjek') }}" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-800 bg-transparent text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                            @error('subjek') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="pesan" class="text-sm font-semibold text-slate-700 dark:text-slate-350">Isi
                                Pesan</label>
                            <textarea id="pesan" name="pesan" rows="5" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 dark:border-slate-800 bg-transparent text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">{{ old('pesan') }}</textarea>
                            @error('pesan') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Google reCAPTCHA v2 --}}
                        <div class="space-y-2">
                            <div class="flex justify-start">
                                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                <div class="g-recaptcha"
                                    data-sitekey="{{ env('RECAPTCHA_SITE_KEY', '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI') }}">
                                </div>
                            </div>
                            @error('g-recaptcha-response') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit"
                            class="w-full py-4 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold shadow-lg shadow-emerald-500/10 hover:shadow-emerald-500/25 transition-all">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection