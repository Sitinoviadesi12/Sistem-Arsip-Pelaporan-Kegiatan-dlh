<nav x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="(scrolled || !darkMode) ? 'navbar-scrolled py-4' : 'bg-transparent py-6'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b border-transparent"
    x-init="scrolled = (window.pageYOffset > 20)">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">

            {{-- Logo --}}
            <div class="flex-shrink-0 flex items-center gap-3">
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <img src="{{ asset('images/logo-dlh.png') }}" alt="Logo DLH Kabupaten Tegal"
                        class="w-12 h-12 object-contain group-hover:scale-105 transition-transform duration-300">
                    <div>
                        <span class="block font-bold text-xl leading-none tracking-tight transition-colors duration-300"
                            :class="(scrolled || !darkMode) ? 'text-slate-900 dark:text-white' : 'text-white'">SIAPK-DLH</span>
                        <span class="block text-sm font-medium transition-colors duration-300 mt-0.5"
                            :class="(scrolled || !darkMode) ? 'text-emerald-600 dark:text-emerald-400' : 'text-emerald-300'">Sistem Informasi
                            Resmi</span>
                    </div>
                </a>
            </div>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center gap-1.5">
                @php
                    $navs = [
                        ['label' => 'Beranda', 'route' => 'home', 'url' => route('home'), 'active' => request()->routeIs('home')],
                        ['label' => 'Kegiatan', 'route' => 'kegiatan.index', 'url' => route('kegiatan.index'), 'active' => request()->routeIs('kegiatan.*')],
                        ['label' => 'Dokumentasi', 'route' => 'dokumentasi.index', 'url' => route('dokumentasi.index'), 'active' => request()->routeIs('dokumentasi.*')],
                        ['label' => 'Kategori Bidang', 'route' => 'kategori-bidang', 'url' => route('kategori-bidang'), 'active' => request()->routeIs('kategori-bidang')],
                        ['label' => 'Titik Lokasi', 'route' => 'titik-lokasi', 'url' => route('titik-lokasi'), 'active' => request()->routeIs('titik-lokasi')],
                        ['label' => 'Tentang', 'route' => 'tentang', 'url' => route('tentang'), 'active' => request()->routeIs('tentang')],
                        ['label' => 'Kontak', 'route' => 'kontak', 'url' => route('kontak'), 'active' => request()->routeIs('kontak')],
                    ];
                @endphp

                @foreach($navs as $nav)
                    <a href="{{ $nav['url'] }}"
                        class="px-4 lg:px-5 py-2.5 rounded-full text-sm font-semibold transition-all duration-200"
                        :class="(scrolled || !darkMode) ? '{{ $nav['active'] ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400' : 'text-slate-600 hover:text-emerald-600 hover:bg-slate-100 dark:text-slate-300 dark:hover:text-emerald-400 dark:hover:bg-slate-800' }}' : '{{ $nav['active'] ? 'bg-white/20 text-white' : 'text-slate-200 hover:text-white hover:bg-white/10' }}'">
                        {{ $nav['label'] }}
                    </a>
                @endforeach
            </div>

            {{-- Right Actions --}}
            <div class="flex items-center gap-3">
                {{-- Dark mode toggle --}}
                <button
                    @click="darkMode = !darkMode; if(darkMode){ document.documentElement.classList.add('dark'); localStorage.theme = 'dark'; } else { document.documentElement.classList.remove('dark'); localStorage.theme = 'light'; }"
                    class="flex items-center gap-2 px-4 py-2 rounded-full border transition-all duration-200 font-medium text-sm"
                    :class="(scrolled || !darkMode) ? 'border-slate-300 dark:border-slate-600 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-700 hover:border-slate-400 dark:hover:border-slate-500' : 'border-white/40 bg-white/15 text-white hover:bg-white/25 hover:border-white/60'">
                    {{-- Moon icon (light mode → click to go dark) --}}
                    <svg x-show="!darkMode" class="w-5 h-5 shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                        </path>
                    </svg>
                    <span x-show="!darkMode" class="hidden lg:inline">Mode Gelap</span>
                    {{-- Sun icon (dark mode → click to go light) --}}
                    <svg x-show="darkMode" x-cloak class="w-5 h-5 shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                    <span x-show="darkMode" x-cloak class="hidden lg:inline">Mode Terang</span>
                </button>

                {{-- Mobile Menu Button --}}
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 transition-colors"
                    :class="(scrolled || !darkMode) ? 'text-slate-600 dark:text-slate-300' : 'text-white'">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="md:hidden absolute top-full left-0 w-full bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 shadow-xl"
        x-cloak>
        <div class="px-4 py-6 space-y-2">
            @foreach($navs as $nav)
                <a href="{{ $nav['url'] }}"
                    class="block px-4 py-3 rounded-lg font-medium {{ $nav['active'] ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800' }}">
                    {{ $nav['label'] }}
                </a>
            @endforeach
            <hr class="border-slate-200 dark:border-slate-800 my-4">
        </div>
    </div>
</nav>