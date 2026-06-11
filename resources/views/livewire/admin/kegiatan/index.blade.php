<div>
    @php $title = 'Pelaporan Kegiatan'; @endphp
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-bold text-slate-800 dark:text-slate-100">Pelaporan Kegiatan</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400">Kelola laporan kegiatan Dinas LH</p>
        </div>
        <a href="{{ route('admin.kegiatan.create') }}" wire:navigate class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 dark:bg-emerald-700 text-white rounded-lg hover:bg-emerald-700 dark:hover:bg-emerald-800 text-sm font-medium transition-colors">
            + Kegiatan Baru
        </a>
    </div>

    <div class="bg-white dark:bg-slate-850 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-4 mb-4 transition-colors duration-200">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-3">
            <input wire:model.live.debounce.300ms="keyword" type="text" placeholder="Cari judul..." class="rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 text-sm focus:border-emerald-500 focus:ring-emerald-500">
            <select wire:model.live="kategori_id" class="rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                <option value="">Semua Kategori</option>
                @foreach($kategoris as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                @endforeach
            </select>
            <select wire:model.live="bidang_id" class="rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                <option value="">Semua Bidang</option>
                @foreach($bidangs as $bdg)
                    <option value="{{ $bdg->id }}">{{ $bdg->nama }}</option>
                @endforeach
            </select>
            <select wire:model.live="status" class="rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                <option value="">Semua Status</option>
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
            <input wire:model.live="tanggal_dari" type="date" class="rounded-lg border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 text-sm focus:border-emerald-500 focus:ring-emerald-500" title="Filter Tanggal Kegiatan">
        </div>
        <div class="flex flex-wrap gap-2 mt-3">
            <button wire:click="resetFilters" class="px-3 py-1.5 text-xs border border-slate-300 dark:border-slate-700 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-300 transition-colors">Reset Filter</button>
            <a href="{{ route('admin.kegiatan.export.excel') }}?{{ $this->exportQuery() }}" class="px-3 py-1.5 text-xs bg-emerald-600 dark:bg-emerald-700 text-white rounded-lg hover:bg-emerald-700 dark:hover:bg-emerald-800 transition-colors">Export Excel</a>
            <a href="{{ route('admin.kegiatan.export.pdf') }}?{{ $this->exportQuery() }}" class="px-3 py-1.5 text-xs bg-red-600 dark:bg-red-700 text-white rounded-lg hover:bg-red-700 dark:hover:bg-red-800 transition-colors">Export PDF</a>
            <a href="{{ route('admin.kegiatan.export.print') }}?{{ $this->exportQuery() }}" target="_blank" class="px-3 py-1.5 text-xs bg-slate-600 dark:bg-slate-700 text-white rounded-lg hover:bg-slate-700 dark:hover:bg-slate-800 transition-colors">Print</a>
        </div>
        
        {{-- Import CSV Section Premium Design --}}
        <div x-data="{ expanded: false }" class="mt-6 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden transition-all duration-300">
            <!-- Header Toggle -->
            <button @click="expanded = !expanded" class="w-full p-4 md:p-5 flex justify-between items-center bg-slate-50/50 hover:bg-slate-50 transition-colors text-left focus:outline-none">
                <div class="flex items-center gap-3 md:gap-4">
                    <div class="p-2 md:p-2.5 bg-indigo-100 text-indigo-600 rounded-xl shadow-sm">
                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-800 text-sm md:text-base">Import Data via CSV</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Tambahkan banyak kegiatan sekaligus tanpa input manual</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="hidden sm:inline-flex px-3 py-1 text-[10px] font-semibold tracking-wider text-indigo-700 bg-indigo-100 uppercase rounded-full">Baru</span>
                    <svg class="w-5 h-5 text-slate-400 transition-transform duration-300" :class="{ 'rotate-180': expanded }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>
            </button>
            
            <!-- Body Panel -->
            <div x-show="expanded" x-collapse x-cloak class="border-t border-slate-100">
                <div class="p-5 md:p-6">
                    <div class="flex flex-col lg:flex-row gap-6 items-start">
                        
                        <!-- Dropzone Area -->
                        <div class="flex-1 w-full">
                            <input type="file" wire:model="fileCsv" id="csv_upload_btn" accept=".csv,.txt" class="hidden">
                            <label for="csv_upload_btn" class="flex flex-col items-center justify-center w-full h-40 md:h-48 px-4 transition bg-emerald-50/30 border-2 border-dashed rounded-2xl cursor-pointer hover:border-emerald-400 hover:bg-emerald-100/20 {{ $fileCsv ? 'border-emerald-500 bg-emerald-50/50' : 'border-emerald-300' }}">
                                @if(!$fileCsv)
                                    <div class="p-3 bg-emerald-100 shadow-sm rounded-full mb-3 text-emerald-600 group-hover:text-emerald-700 transition-colors">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    </div>
                                    <span class="font-semibold text-emerald-700 text-sm md:text-base">Klik untuk memilih file CSV</span>
                                    <span class="mt-2 text-xs text-emerald-600 font-medium">Batas maksimal ukuran: 10MB</span>
                                @else
                                    <div class="flex flex-col items-center text-center">
                                        <div class="p-3 bg-emerald-100 text-emerald-600 rounded-full mb-3 shadow-sm">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                        <span class="font-bold text-emerald-800 text-sm md:text-base break-all px-4">{{ $fileCsv->getClientOriginalName() }}</span>
                                        <span class="text-xs font-medium text-emerald-600/80 mt-1.5 px-3 py-1 bg-emerald-100/50 rounded-full">File siap diimpor</span>
                                    </div>
                                @endif
                            </label>
                            @error('fileCsv') 
                                <div class="mt-3 flex items-center gap-1.5 text-xs text-red-600 font-medium bg-red-50 p-2.5 rounded-lg border border-red-100">
                                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Instructions & Action -->
                        <div class="w-full lg:w-5/12 flex flex-col h-full justify-between">
                            <div class="space-y-4">
                                <!-- Format Info -->
                                <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 shadow-sm">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="font-bold text-slate-700 text-xs uppercase tracking-wider">Format Kolom</span>
                                        <a href="#" wire:click.prevent="downloadTemplate" class="text-xs font-medium text-indigo-600 hover:text-indigo-800 hover:underline inline-flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                            Download Template
                                        </a>
                                    </div>
                                    <p class="text-slate-600 text-xs leading-relaxed font-mono bg-white p-2.5 rounded-lg border border-slate-200">
                                        judul, tanggal_kegiatan, kategori, lokasi, bidang, deskripsi, isi_lengkap, status
                                    </p>
                                    <p class="text-[10px] text-slate-500 mt-2">* Gunakan format <span class="font-bold text-slate-700">YYYY-MM-DD</span> untuk tanggal. Status isi dengan <span class="font-bold text-slate-700">draft</span> atau <span class="font-bold text-slate-700">published</span>.</p>
                                </div>
                            </div>
                            
                            <!-- Actions -->
                            <div class="mt-6">
                                @if($fileCsv)
                                    <div class="flex flex-col sm:flex-row gap-2">
                                        <button wire:click="importCsv" wire:loading.attr="disabled" class="flex-1 flex items-center justify-center px-4 py-2.5 text-sm font-bold bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-all shadow-md transform hover:scale-[1.02] active:scale-[0.98]">
                                            <svg wire:loading.remove wire:target="importCsv" class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                            <svg wire:loading wire:target="importCsv" class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                            <span wire:loading.remove wire:target="importCsv">Import Sekarang</span>
                                            <span wire:loading wire:target="importCsv">Memproses...</span>
                                        </button>
                                        
                                        <button wire:click="$set('fileCsv', null)" class="px-4 py-2.5 text-sm font-medium bg-red-600 text-white rounded-lg hover:bg-red-700 transition-all shadow-sm">
                                            Batal
                                        </button>
                                    </div>
                                @else
                                    <div class="p-4 border border-slate-100 bg-slate-50/50 rounded-xl text-center">
                                        <p class="text-xs text-slate-500 italic">Silakan pilih file CSV terlebih dahulu pada kotak di sebelah kiri untuk memunculkan tombol impor.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-850 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden transition-colors duration-200">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 dark:bg-slate-900/50 text-slate-600 dark:text-slate-400">
                    <tr>
                        <th class="px-4 py-3 text-left">Judul</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-left">Lokasi</th>
                        <th class="px-4 py-3 text-left">Bidang</th>
                        <th class="px-4 py-3 text-left">Tanggal</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($kegiatan as $item)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3">
                                <a href="{{ route('admin.kegiatan.show', $item) }}" wire:navigate class="font-medium text-emerald-700 dark:text-emerald-400 hover:underline">{{ Str::limit($item->judul, 45) }}</a>
                                <p class="text-xs text-slate-400 dark:text-slate-500">{{ $item->slug }}</p>
                            </td>
                            <td class="px-4 py-3 text-slate-700 dark:text-slate-300">{{ $item->kategori?->nama }}</td>
                            <td class="px-4 py-3 text-slate-700 dark:text-slate-300">{{ $item->lokasi?->nama }}</td>
                            <td class="px-4 py-3 text-slate-700 dark:text-slate-300">{{ $item->bidang?->nama }}</td>
                            <td class="px-4 py-3 text-slate-700 dark:text-slate-300">{{ $item->tanggal_kegiatan->format('d/m/Y') }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-0.5 rounded-full text-xs {{ $item->status === 'published' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400' }}">{{ ucfirst($item->status) }}</span>
                            </td>
                            <td class="px-4 py-3 text-right whitespace-nowrap space-x-1">
                                <a href="{{ route('admin.kegiatan.edit', $item) }}" wire:navigate class="text-blue-600 dark:text-blue-400 hover:underline text-xs">Edit</a>
                                @if($item->status === 'draft')
                                    <button wire:click="publish({{ $item->id }})" class="text-emerald-600 dark:text-emerald-400 hover:underline text-xs">Publish</button>
                                @else
                                    <button wire:click="unpublish({{ $item->id }})" class="text-amber-600 dark:text-amber-400 hover:underline text-xs">Unpublish</button>
                                @endif
                                <button wire:click="delete({{ $item->id }})" wire:confirm="Hapus kegiatan ini?" class="text-red-600 dark:text-red-400 hover:underline text-xs">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-6 py-8 text-center text-slate-500 dark:text-slate-400">Tidak ada kegiatan</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-3 border-t border-slate-100 dark:border-slate-800">{{ $kegiatan->links() }}</div>
    </div>
</div>
