<div wire:poll.10s>
    @php $title = 'Statistik'; @endphp

    {{-- Header Section --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 bg-white dark:bg-slate-850 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-gradient-to-br from-emerald-500/10 to-blue-500/10 rounded-full blur-2xl"></div>
        <div class="relative z-10">
            <h2 class="text-2xl font-bold text-slate-800 dark:text-slate-100 flex items-center gap-2">
                <svg class="w-7 h-7 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                Statistik Kegiatan
            </h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Analisis dan visualisasi data kegiatan secara komprehensif</p>
        </div>
        <div class="relative z-10 flex items-center gap-3">
            <label class="text-sm font-medium text-slate-600 dark:text-slate-300">Tahun:</label>
            <select wire:model.live="tahun" class="bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-slate-200 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-32 px-4 py-2.5 transition-all shadow-sm">
                @foreach($availableYears as $y)
                    <option value="{{ $y }}">{{ $y }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <x-admin.stat-card label="Total Kegiatan" :value="$totalKegiatan" color="emerald">
            <div class="p-2 bg-emerald-100 dark:bg-emerald-900/40 rounded-lg text-emerald-600 dark:text-emerald-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
        </x-admin.stat-card>
        <x-admin.stat-card label="Published" :value="$totalPublished" color="blue">
            <div class="p-2 bg-blue-100 dark:bg-blue-900/40 rounded-lg text-blue-600 dark:text-blue-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </x-admin.stat-card>
        <x-admin.stat-card label="Draft" :value="$totalDraft" color="amber">
            <div class="p-2 bg-amber-100 dark:bg-amber-900/40 rounded-lg text-amber-600 dark:text-amber-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            </div>
        </x-admin.stat-card>
        <x-admin.stat-card label="Dokumentasi" :value="$totalDokumentasi" color="purple">
             <div class="p-2 bg-purple-100 dark:bg-purple-900/40 rounded-lg text-purple-600 dark:text-purple-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        </x-admin.stat-card>
    </div>

    {{-- Section Grafik Interaktif --}}
    <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mt-10 mb-6 flex items-center gap-2">
        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
        Grafik Analisis Interaktif ({{ $tahun }})
    </h3>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Grafik Area (Dari Dashboard) -->
        <div class="bg-white dark:bg-slate-850 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-emerald-100 to-transparent dark:from-emerald-900/20 opacity-0 group-hover:opacity-100 transition-opacity rounded-bl-full"></div>
            <div class="flex justify-between items-center mb-6 relative z-10">
                <h4 class="font-bold text-slate-800 dark:text-slate-100">Statistik Bulanan</h4>
                <span class="text-xs font-medium px-2.5 py-1 bg-emerald-100 dark:bg-emerald-900/40 text-emerald-700 dark:text-emerald-400 rounded-full flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Area
                </span>
            </div>
            <div x-data="{
                chart: null,
                init() {
                    const data = {{ json_encode(array_map(fn($i) => $statistikBulanan[$i] ?? 0, range(1, 12))) }};
                    const options = {
                        series: [{ name: 'Kegiatan', data: data }],
                        chart: { type: 'area', height: 260, toolbar: { show: false }, background: 'transparent', fontFamily: 'inherit' },
                        colors: ['#10b981'],
                        fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0.05, stops: [0, 90, 100] } },
                        dataLabels: { enabled: false },
                        stroke: { curve: 'smooth', width: 2.5 },
                        xaxis: { 
                            categories: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
                            axisBorder: { show: false }, axisTicks: { show: false },
                            labels: { style: { colors: '#64748b' } }
                        },
                        yaxis: { show: false },
                        grid: { show: false },
                        theme: { mode: document.documentElement.classList.contains('dark') ? 'dark' : 'light' }
                    };
                    this.chart = new ApexCharts(this.$refs.chart, options);
                    this.chart.render();
                    const observer = new MutationObserver(() => {
                        this.chart.updateOptions({ theme: { mode: document.documentElement.classList.contains('dark') ? 'dark' : 'light' } });
                    });
                    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
                }
            }">
                <div x-ref="chart" class="relative z-10"></div>
            </div>
        </div>

        <!-- Grafik Batang -->
        <div class="bg-white dark:bg-slate-850 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-blue-100 to-transparent dark:from-blue-900/20 opacity-0 group-hover:opacity-100 transition-opacity rounded-bl-full"></div>
            <div class="flex justify-between items-center mb-6 relative z-10">
                <h4 class="font-bold text-slate-800 dark:text-slate-100">Kegiatan per Bulan</h4>
                <span class="text-xs font-medium px-2.5 py-1 bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-400 rounded-full flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Bar
                </span>
            </div>
            <div x-data="{
                chart: null,
                init() {
                    const data = {{ json_encode(array_map(fn($i) => $statistikBulanan[$i] ?? 0, range(1, 12))) }};
                    const options = {
                        series: [{ name: 'Kegiatan', data: data }],
                        chart: { type: 'bar', height: 260, toolbar: { show: false }, background: 'transparent', fontFamily: 'inherit' },
                        colors: ['#3b82f6'],
                        plotOptions: {
                            bar: { borderRadius: 6, columnWidth: '55%', dataLabels: { position: 'top' } }
                        },
                        dataLabels: { 
                            enabled: true, 
                            offsetY: -20,
                            style: { fontSize: '12px', colors: ['#64748b'] },
                            formatter: function (val) { return val > 0 ? val : ''; }
                        },
                        xaxis: { 
                            categories: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
                            axisBorder: { show: false }, axisTicks: { show: false },
                            labels: { style: { colors: '#64748b' } }
                        },
                        yaxis: { labels: { style: { colors: '#64748b' } } },
                        grid: { borderColor: document.documentElement.classList.contains('dark') ? '#1e293b' : '#f1f5f9', strokeDashArray: 4 },
                        theme: { mode: document.documentElement.classList.contains('dark') ? 'dark' : 'light' }
                    };
                    this.chart = new ApexCharts(this.$refs.chart, options);
                    this.chart.render();
                    const observer = new MutationObserver(() => {
                        this.chart.updateOptions({ 
                            theme: { mode: document.documentElement.classList.contains('dark') ? 'dark' : 'light' },
                            grid: { borderColor: document.documentElement.classList.contains('dark') ? '#1e293b' : '#f1f5f9' }
                        });
                    });
                    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
                }
            }">
                <div x-ref="chart" class="relative z-10"></div>
            </div>
        </div>

        <!-- Grafik Bar Kategori -->
        <div class="bg-white dark:bg-slate-850 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-blue-100 to-transparent dark:from-blue-900/20 opacity-0 group-hover:opacity-100 transition-opacity rounded-bl-full"></div>
            <div class="flex justify-between items-center mb-6 relative z-10">
                <h4 class="font-bold text-slate-800 dark:text-slate-100">Distribusi Kategori</h4>
                <span class="text-xs font-medium px-2.5 py-1 bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-400 rounded-full flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Bar
                </span>
            </div>
            <div x-data="{
                chart: null,
                init() {
                    const seriesData = {{ json_encode($kategoriAktif->pluck('kegiatan_count')->toArray()) }};
                    const labelsData = {{ json_encode($kategoriAktif->pluck('nama')->toArray()) }};
                    const isDark = document.documentElement.classList.contains('dark');
                    const options = {
                        series: [{ name: 'Kegiatan', data: seriesData }],
                        chart: { type: 'bar', height: 280, toolbar: { show: false }, background: 'transparent', fontFamily: 'inherit' },
                        colors: ['#3b82f6'],
                        plotOptions: {
                            bar: {
                                borderRadius: 6,
                                columnWidth: '65%',
                                distributed: true,
                                dataLabels: { position: 'top' }
                            }
                        },
                        dataLabels: { 
                            enabled: true,
                            formatter: function (val) { return val > 0 ? val : ''; },
                            offsetY: -20,
                            style: { fontSize: '12px', colors: [isDark ? '#94a3b8' : '#64748b'] }
                        },
                        xaxis: { 
                            categories: labelsData,
                            labels: { 
                                style: { colors: '#64748b', fontSize: '11px' },
                                rotate: -45,
                                rotateAlways: true
                            },
                            axisBorder: { show: false },
                            axisTicks: { show: false }
                        },
                        yaxis: { 
                            labels: { style: { colors: '#64748b' } }
                        },
                        grid: { borderColor: isDark ? '#334155' : '#f1f5f9', strokeDashArray: 4 },
                        legend: { show: false },
                        theme: { mode: isDark ? 'dark' : 'light' }
                    };
                    this.chart = new ApexCharts(this.$refs.chart, options);
                    this.chart.render();
                    const observer = new MutationObserver(() => {
                        const newIsDark = document.documentElement.classList.contains('dark');
                        this.chart.updateOptions({ 
                            theme: { mode: newIsDark ? 'dark' : 'light' },
                            grid: { borderColor: newIsDark ? '#334155' : '#f1f5f9' },
                            dataLabels: { style: { colors: [newIsDark ? '#94a3b8' : '#64748b'] } }
                        });
                    });
                    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
                }
            }">
                <div x-ref="chart" class="relative z-10"></div>
            </div>
        </div>
    </div>

    {{-- Distribusi Bidang Pie Chart --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <div class="bg-white dark:bg-slate-850 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-purple-100 to-transparent dark:from-purple-900/20 opacity-0 group-hover:opacity-100 transition-opacity rounded-bl-full"></div>
            <div class="flex justify-between items-center mb-6 relative z-10">
                <h4 class="font-bold text-slate-800 dark:text-slate-100">Distribusi Bidang</h4>
                <span class="text-xs font-medium px-2.5 py-1 bg-purple-100 dark:bg-purple-900/40 text-purple-700 dark:text-purple-400 rounded-full flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span> Pie
                </span>
            </div>
            <div x-data="{
                chart: null,
                init() {
                    const seriesData = {{ json_encode($bidangAktif->pluck('kegiatans_count')->toArray()) }};
                    const labelsData = {{ json_encode($bidangAktif->pluck('nama')->toArray()) }};
                    const isDark = document.documentElement.classList.contains('dark');
                    const options = {
                        series: seriesData,
                        labels: labelsData,
                        chart: { type: 'donut', height: 280, background: 'transparent', fontFamily: 'inherit' },
                        colors: ['#8b5cf6', '#ec4899', '#f59e0b', '#10b981', '#3b82f6', '#f43f5e'],
                        stroke: { show: true, colors: [isDark ? '#0f172a' : '#ffffff'], width: 2 },
                        legend: { 
                            position: 'bottom',
                            labels: { colors: '#64748b' },
                            markers: { radius: 12 }
                        },
                        dataLabels: { enabled: false },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '72%',
                                    labels: {
                                        show: true,
                                        name: { fontSize: '12px', color: '#64748b' },
                                        value: { fontSize: '24px', fontWeight: 700, color: isDark ? '#f8fafc' : '#1e293b' },
                                        total: { show: true, label: 'Total', color: '#64748b', formatter: function (w) { return w.globals.seriesTotals.reduce((a, b) => a + b, 0) } }
                                    }
                                }
                            }
                        },
                        theme: { mode: isDark ? 'dark' : 'light' }
                    };
                    this.chart = new ApexCharts(this.$refs.chart, options);
                    this.chart.render();
                    const observer = new MutationObserver(() => {
                        const newIsDark = document.documentElement.classList.contains('dark');
                        this.chart.updateOptions({ 
                            theme: { mode: newIsDark ? 'dark' : 'light' },
                            stroke: { colors: [newIsDark ? '#0f172a' : '#ffffff'] },
                            plotOptions: {
                                pie: { donut: { labels: { value: { color: newIsDark ? '#f8fafc' : '#1e293b' } } } }
                            }
                        });
                    });
                    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
                }
            }">
                <div x-ref="chart" class="relative z-10 flex justify-center"></div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Progress Bar Dokumentasi -->
        <div class="bg-white dark:bg-slate-850 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm hover:shadow-md transition-shadow">
            <h4 class="font-bold text-slate-800 dark:text-slate-100 mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Upload Dokumentasi
            </h4>
            <div class="space-y-5">
                @for($i = 1; $i <= 12; $i++)
                    @php 
                        $count = $uploadPerBulan[$i] ?? 0; 
                        $max = max($uploadPerBulan->max() ?? 1, 1); 
                        $percentage = ($count / $max) * 100;
                    @endphp
                    <div class="flex items-center gap-3 text-sm group">
                        <span class="w-10 text-slate-500 dark:text-slate-400 font-medium group-hover:text-slate-700 dark:group-hover:text-slate-200 transition-colors">{{ $bulanLabels[$i] }}</span>
                        <div class="flex-1 bg-slate-100 dark:bg-slate-800 rounded-full h-2.5 overflow-hidden">
                            <div class="bg-gradient-to-r from-blue-400 to-indigo-500 h-full rounded-full transition-all duration-1000 ease-out relative" style="width: {{ $percentage }}%">
                                @if($percentage > 0)
                                    <div class="absolute top-0 right-0 bottom-0 left-0 bg-white/20"></div>
                                @endif
                            </div>
                        </div>
                        <span class="w-8 text-right font-bold text-slate-700 dark:text-slate-300">{{ $count }}</span>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Tabel Bidang Teraktif -->
        <div class="lg:col-span-2 bg-white dark:bg-slate-850 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden flex flex-col">
            <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center bg-slate-50/50 dark:bg-slate-900/50">
                <h4 class="font-bold text-slate-800 dark:text-slate-100 flex items-center gap-2">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    Peringkat Bidang Teraktif
                </h4>
            </div>
            <div class="overflow-x-auto flex-1">
                <table class="w-full text-sm text-left">
                    <thead class="bg-slate-50 dark:bg-slate-900/80 text-slate-500 dark:text-slate-400 uppercase tracking-wider text-xs">
                        <tr>
                            <th class="px-6 py-4 font-semibold w-24">Peringkat</th>
                            <th class="px-6 py-4 font-semibold">Nama Bidang</th>
                            <th class="px-6 py-4 font-semibold text-right">Jumlah Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        @forelse($bidangAktif as $index => $bdg)
                            <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-800/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full 
                                        {{ $index === 0 ? 'bg-amber-100 text-amber-600 dark:bg-amber-500/20 dark:text-amber-400 font-bold shadow-sm' : 
                                          ($index === 1 ? 'bg-slate-200 text-slate-600 dark:bg-slate-700 dark:text-slate-300 font-bold shadow-sm' : 
                                          ($index === 2 ? 'bg-orange-100 text-orange-600 dark:bg-orange-500/20 dark:text-orange-400 font-bold shadow-sm' : 
                                          'bg-slate-100 text-slate-500 dark:bg-slate-800 dark:text-slate-400')) }}">
                                        {{ $index + 1 }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-medium text-slate-800 dark:text-slate-200 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                                    {{ $bdg->nama }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 dark:bg-indigo-500/10 dark:text-indigo-400 ring-1 ring-inset ring-indigo-600/20 dark:ring-indigo-500/20">
                                        {{ $bdg->kegiatans_count }} Kegiatan
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center text-slate-500 dark:text-slate-400">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-slate-300 dark:text-slate-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                        <p>Belum ada data bidang untuk tahun ini</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
