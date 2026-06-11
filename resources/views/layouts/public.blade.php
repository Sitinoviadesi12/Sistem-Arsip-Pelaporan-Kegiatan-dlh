<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'Portal Informasi dan Kegiatan Dinas Lingkungan Hidup')">

    <title>@hasSection('title') @yield('title') - @endif SIAPK-DLH</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Alpine.js (handled by Vite, but adding explicitly if needed) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Dark Mode Init -->
    <script>
        const storedTheme = localStorage.theme;
        const prefersDark = !('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches;
        
        if (storedTheme === 'dark' || prefersDark) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-800 dark:bg-slate-900 dark:text-slate-100 transition-colors duration-200" x-data="{ darkMode: document.documentElement.classList.contains('dark'), mobileMenuOpen: false }">
    
    {{-- Navbar --}}
    <x-public.navbar />

    {{-- Main Content --}}
    <main class="min-h-[calc(100vh-200px)]">
        @yield('content')
    </main>

    {{-- Footer --}}
    <x-public.footer />

</body>
</html>
