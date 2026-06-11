<div wire:poll.10s>
    @php $title = 'Dashboard'; @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
        <x-admin.stat-card label="Total Kegiatan" :value="$totalKegiatan" color="emerald">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        </x-admin.stat-card>
        <x-admin.stat-card label="Published" :value="$publishedCount" color="blue">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </x-admin.stat-card>
        <x-admin.stat-card label="Draft" :value="$draftCount" color="amber">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
        </x-admin.stat-card>
        <x-admin.stat-card label="Dokumentasi" :value="$totalDokumentasi" color="purple">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        </x-admin.stat-card>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <div class="xl:col-span-2 bg-white dark:bg-slate-850 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm transition-colors duration-200">
            <div class="px-6 py-4 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center">
                <h2 class="font-semibold text-slate-800 dark:text-slate-100">Kegiatan Terbaru</h2>
                <a href="{{ route('admin.kegiatan.create') }}" wire:navigate class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">+ Tambah</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-600 dark:text-slate-400">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold">Judul</th>
                            <th class="px-6 py-3 text-left font-semibold">Kategori</th>
                            <th class="px-6 py-3 text-left font-semibold">Bidang</th>
                            <th class="px-6 py-3 text-left font-semibold">Tanggal</th>
                            <th class="px-6 py-3 text-left font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800/80">
                        @forelse($kegiatanTerbaru as $item)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/40 transition-colors duration-150">
                                <td class="px-6 py-3">
                                    <a href="{{ route('admin.kegiatan.show', $item) }}" wire:navigate class="text-emerald-700 dark:text-emerald-400 hover:underline font-medium">{{ Str::limit($item->judul, 40) }}</a>
                                </td>
                                <td class="px-6 py-3 text-slate-600 dark:text-slate-300">{{ $item->kategori?->nama }}</td>
                                <td class="px-6 py-3 text-slate-600 dark:text-slate-300">{{ $item->bidang?->nama }}</td>
                                <td class="px-6 py-3 text-slate-600 dark:text-slate-300">{{ $item->tanggal_kegiatan->format('d M Y') }}</td>
                                <td class="px-6 py-3">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $item->status === 'published' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-400' : 'bg-amber-100 text-amber-700 dark:bg-amber-950/40 dark:text-amber-400' }}">{{ ucfirst($item->status) }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-6 py-8 text-center text-slate-500 dark:text-slate-400">Belum ada kegiatan</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white dark:bg-slate-850 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6 transition-colors duration-200">
                <h2 class="font-semibold text-slate-800 dark:text-slate-100 mb-4">Statistik Bulanan {{ now()->year }}</h2>
                <div x-data="{
                    chart: null,
                    init() {
                        const data = {{ json_encode(array_map(fn($i) => $statistikBulanan->firstWhere('bulan', $i)?->total ?? 0, range(1, 12))) }};
                        const options = {
                            series: [{ name: 'Kegiatan', data: data }],
                            chart: { type: 'area', height: 260, toolbar: { show: false }, background: 'transparent' },
                            colors: ['#10b981'],
                            fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0.05, stops: [0, 90, 100] } },
                            dataLabels: { enabled: false },
                            stroke: { curve: 'smooth', width: 2 },
                            xaxis: { 
                                categories: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
                                axisBorder: { show: false }, axisTicks: { show: false }
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
                    <div x-ref="chart"></div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-850 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6 transition-colors duration-200">
                <h2 class="font-semibold text-slate-800 dark:text-slate-100 mb-4">Bidang Teraktif</h2>
                <ul class="space-y-2">
                    @foreach($bidangAktif as $bdg)
                        <li class="flex justify-between text-sm">
                            <span class="text-slate-700 dark:text-slate-300">{{ $bdg->nama }}</span>
                            <span class="font-medium text-indigo-600 dark:text-indigo-400">{{ $bdg->kegiatans_count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- Section Grafik Tambahan --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
        <!-- Grafik Bulanan -->
        <div class="bg-white dark:bg-slate-850 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6 transition-colors duration-200">
            <h3 class="font-semibold text-slate-800 dark:text-slate-100 mb-4">Statistik Bulanan</h3>
            <div x-data="{
                chart: null,
                init() {
                    const data = {{ json_encode(array_map(fn($i) => $statistikBulanan->firstWhere('bulan', $i)?->total ?? 0, range(1, 12))) }};
                    const options = {
                        series: [{ name: 'Kegiatan', data: data }],
                        chart: { type: 'bar', height: 260, toolbar: { show: false }, background: 'transparent' },
                        colors: ['#3b82f6'],
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                columnWidth: '55%',
                                distributed: false,
                            }
                        },
                        dataLabels: { enabled: false },
                        xaxis: { 
                            categories: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
                            axisBorder: { show: false }, axisTicks: { show: false },
                            labels: { style: { colors: '#94a3b8' } }
                        },
                        yaxis: { labels: { style: { colors: '#94a3b8' } } },
                        grid: { borderColor: '#f1f5f9', strokeDashArray: 4 },
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
                <div x-ref="chart"></div>
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
                    const seriesData = {{ json_encode($kategoriSemua->pluck('kegiatan_count')->toArray()) }};
                    const labelsData = {{ json_encode($kategoriSemua->pluck('nama')->toArray()) }};
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
                            formatter: function (val) { return val },
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

    {{-- Pie Chart Bidang --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
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
                    const seriesData = {{ json_encode($bidangSemua->pluck('kegiatans_count')->toArray()) }};
                    const labelsData = {{ json_encode($bidangSemua->pluck('nama')->toArray()) }};
                    const isDark = document.documentElement.classList.contains('dark');
                    const options = {
                        series: seriesData,
                        labels: labelsData,
                        chart: { type: 'donut', height: 340, background: 'transparent', fontFamily: 'inherit' },
                        colors: ['#8b5cf6', '#ec4899', '#f59e0b', '#10b981', '#3b82f6', '#f43f5e'],
                        stroke: { show: true, colors: [isDark ? '#0f172a' : '#ffffff'], width: 2 },
                        legend: { position: 'bottom', labels: { colors: '#64748b' }, markers: { radius: 12 }, fontSize: '13px' },
                        dataLabels: { enabled: false },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '72%',
                                    labels: {
                                        show: true,
                                        name: { fontSize: '13px', color: '#64748b' },
                                        value: { fontSize: '28px', fontWeight: 700, color: isDark ? '#f8fafc' : '#1e293b' },
                                        total: { show: true, label: 'Total Kegiatan', color: '#64748b', fontSize: '12px', formatter: function (w) { return w.globals.seriesTotals.reduce((a, b) => a + b, 0) } }
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
                            plotOptions: { pie: { donut: { labels: { value: { color: newIsDark ? '#f8fafc' : '#1e293b' } } } } }
                        });
                    });
                    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
                }
            }">
                <div x-ref="chart" class="relative z-10 flex justify-center"></div>
            </div>
        </div>
    </div>

    <div class="mt-6 bg-white dark:bg-slate-850 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6 transition-colors duration-200">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100 mb-4">Aktivitas Terbaru</h2>
        <div class="space-y-3">
            @foreach($aktivitasTerbaru as $akt)
                <div class="flex items-center gap-3 text-sm border-b border-slate-50 dark:border-slate-800 pb-3 last:border-0 last:pb-0">
                    <div class="w-2 h-2 rounded-full bg-emerald-500 shrink-0"></div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-slate-800 dark:text-slate-100 truncate">{{ $akt->judul }}</p>
                        <p class="text-slate-500 dark:text-slate-400 text-xs">{{ $akt->user?->name }} · {{ $akt->updated_at->diffForHumans() }}</p>
                    </div>
                    <span class="text-xs px-2 py-0.5 rounded-full {{ $akt->is_published ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : 'bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-300' }}">{{ $akt->is_published ? 'Public' : 'Draft' }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
