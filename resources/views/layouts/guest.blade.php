<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SIPK-DLH ADMIN') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-emerald-800 via-emerald-700 to-emerald-900 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo-dlh.png') }}" class="w-16 h-16 object-contain mx-auto mb-4" alt="Logo DLH">
            <h1 class="text-2xl font-bold text-white">SIAPK-DLH ADMIN</h1>
            <p class="text-emerald-100 text-sm mt-1">Sistem Pelaporan Kegiatan Dinas Lingkungan Hidup</p>
        </div>
        <div class="bg-white rounded-2xl shadow-xl p-8">
            {{ $slot }}
        </div>
        <p class="text-center text-emerald-200 text-xs mt-6">Internal Admin · Dinas Lingkungan Hidup</p>
    </div>
</body>
</html>
