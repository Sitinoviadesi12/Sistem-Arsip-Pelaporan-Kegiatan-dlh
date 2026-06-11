@props(['label', 'value', 'color' => 'emerald'])

@php
    $colors = [
        'emerald' => 'bg-emerald-100 text-emerald-600 dark:bg-emerald-950/30 dark:text-emerald-450',
        'blue' => 'bg-blue-100 text-blue-600 dark:bg-blue-950/30 dark:text-blue-400',
        'amber' => 'bg-amber-100 text-amber-600 dark:bg-amber-950/30 dark:text-amber-400',
        'purple' => 'bg-purple-100 text-purple-600 dark:bg-purple-950/30 dark:text-purple-400',
    ];
    $iconClass = $colors[$color] ?? $colors['emerald'];
@endphp

<div class="bg-white dark:bg-slate-850 rounded-xl border border-slate-200 dark:border-slate-800 p-5 shadow-sm hover:shadow-md transition duration-200">
    <div class="flex items-start justify-between">
        <div>
            <p class="text-sm text-slate-500 dark:text-slate-400 font-medium">{{ $label }}</p>
            <p class="text-2xl font-bold text-slate-800 dark:text-slate-100 mt-1">{{ $value }}</p>
        </div>
        <div class="w-11 h-11 rounded-lg {{ $iconClass }} flex items-center justify-center">
            {{ $slot }}
        </div>
    </div>
</div>
