<div>
    @php $title = $kegiatan ? 'Edit Kegiatan' : 'Tambah Kegiatan'; @endphp
    <div class="mb-6">
        <a href="{{ route('admin.kegiatan.index') }}" wire:navigate class="text-sm text-emerald-600 hover:underline">← Kembali</a>
        <h2 class="text-xl font-bold text-slate-800 mt-2">{{ $title }}</h2>
    </div>

    <form wire:submit="save" class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Judul Kegiatan *</label>
                    <input wire:model.live="judul" type="text" class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                    @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Slug (otomatis)</label>
                    <input wire:model="slug" type="text" readonly class="w-full rounded-lg border-slate-200 bg-slate-50 text-sm text-slate-500">
                </div>
                
                {{-- 3-Column layout for Kategori, Lokasi, Bidang on large screens --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    {{-- Kategori --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-3">Kategori *</label>
                        
                        @if($showTambahKategori)
                            {{-- Form Tambah Kategori --}}
                            <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-5 rounded-xl border-2 border-emerald-400 mb-4 shadow-md">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="font-bold text-emerald-900 text-sm">Tambah Kategori Baru</h4>
                                    <button type="button" wire:click="toggleTambahKategori" class="text-xs text-emerald-600 hover:text-emerald-800 font-medium">✕ Tutup</button>
                                </div>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-xs font-medium text-emerald-900 mb-1">Nama Kategori</label>
                                        <input wire:model="kategoriNama" type="text" placeholder="Contoh: Sosialisasi" class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500 bg-white">
                                        @error('kategoriNama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-emerald-900 mb-1">Deskripsi (Opsional)</label>
                                        <input wire:model="kategoriDeskripsi" type="text" placeholder="Deskripsi singkat..." class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500 bg-white">
                                        @error('kategoriDeskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <button type="button" wire:click="simpanKategori" class="w-full px-4 py-2.5 text-sm font-bold bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 active:bg-emerald-800 transition-all shadow-md hover:shadow-lg transform hover:scale-105 active:scale-95">
                                        ✓ Simpan Kategori
                                    </button>
                                </div>
                            </div>
                        @endif

                        {{-- Dropdown Kategori + Tombol Tambah --}}
                        <div class="space-y-2">
                            <select wire:model="kategori_kegiatan_id" class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                                <option value="">Pilih kategori</option>
                                @foreach($kategoris as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                @endforeach
                            </select>
                            <button type="button" wire:click="toggleTambahKategori" class="w-full px-3 py-1.5 text-xs font-semibold bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-all flex items-center justify-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                                Kategori Baru
                            </button>
                            @error('kategori_kegiatan_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Lokasi --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-3">Lokasi *</label>
                        
                        @if($showTambahLokasi)
                            {{-- Form Tambah Lokasi --}}
                            <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-5 rounded-xl border-2 border-emerald-400 mb-4 shadow-md">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="font-bold text-emerald-900 text-sm">Tambah Lokasi Baru</h4>
                                    <button type="button" wire:click="toggleTambahLokasi" class="text-xs text-emerald-600 hover:text-emerald-800 font-medium">✕ Tutup</button>
                                </div>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-xs font-medium text-emerald-900 mb-1">Nama Lokasi</label>
                                        <input wire:model="lokasiNama" type="text" placeholder="Contoh: Taman Kota" class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500 bg-white">
                                        @error('lokasiNama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-emerald-900 mb-1">Alamat (Opsional)</label>
                                        <input wire:model="lokasiAlamat" type="text" placeholder="Contoh: Jln. Merdeka No.1" class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500 bg-white">
                                        @error('lokasiAlamat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <button type="button" wire:click="simpanLokasi" class="w-full px-4 py-2.5 text-sm font-bold bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 active:bg-emerald-800 transition-all shadow-md hover:shadow-lg transform hover:scale-105 active:scale-95">
                                        ✓ Simpan Lokasi
                                    </button>
                                </div>
                            </div>
                        @endif

                        {{-- Dropdown Lokasi + Tombol Tambah --}}
                        <div class="space-y-2">
                            <select wire:model="lokasi_kegiatan_id" class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                                <option value="">Pilih lokasi</option>
                                @foreach($lokasis as $lok)
                                    <option value="{{ $lok->id }}">{{ $lok->nama }}</option>
                                @endforeach
                            </select>
                            <button type="button" wire:click="toggleTambahLokasi" class="w-full px-3 py-1.5 text-xs font-semibold bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-all flex items-center justify-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                                Lokasi Baru
                            </button>
                            @error('lokasi_kegiatan_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Bidang --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-3">Bidang *</label>
                        
                        @if($showTambahBidang)
                            {{-- Form Tambah Bidang --}}
                            <div class="bg-gradient-to-br from-emerald-50 to-teal-50 p-5 rounded-xl border-2 border-emerald-400 mb-4 shadow-md">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="font-bold text-emerald-900 text-sm">Tambah Bidang Baru</h4>
                                    <button type="button" wire:click="toggleTambahBidang" class="text-xs text-emerald-600 hover:text-emerald-800 font-medium">✕ Tutup</button>
                                </div>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-xs font-medium text-emerald-900 mb-1">Nama Bidang</label>
                                        <input wire:model="bidangNama" type="text" placeholder="Contoh: Tata Lingkungan" class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500 bg-white">
                                        @error('bidangNama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-emerald-900 mb-1">Deskripsi (Opsional)</label>
                                        <input wire:model="bidangDeskripsi" type="text" placeholder="Deskripsi singkat..." class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500 bg-white">
                                        @error('bidangDeskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <button type="button" wire:click="simpanBidang" class="w-full px-4 py-2.5 text-sm font-bold bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 active:bg-emerald-800 transition-all shadow-md hover:shadow-lg transform hover:scale-105 active:scale-95">
                                        ✓ Simpan Bidang
                                    </button>
                                </div>
                            </div>
                        @endif

                        {{-- Dropdown Bidang + Tombol Tambah --}}
                        <div class="space-y-2">
                            <select wire:model="bidang_id" class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                                <option value="">Pilih bidang</option>
                                @foreach($bidangs as $bid)
                                    <option value="{{ $bid->id }}">{{ $bid->nama }}</option>
                                @endforeach
                            </select>
                            <button type="button" wire:click="toggleTambahBidang" class="w-full px-3 py-1.5 text-xs font-semibold bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-all flex items-center justify-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                                Bidang Baru
                            </button>
                            @error('bidang_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Tanggal Kegiatan *</label>
                        <input wire:model="tanggal_kegiatan" type="date" required class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                        @error('tanggal_kegiatan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Status *</label>
                        <select wire:model="status" required class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500">
                            <option value="" disabled>Pilih status</option>
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                        @error('status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Thumbnail</label>
                    @if($thumbnail)
                        <div class="mb-2">
                            <p class="text-xs text-slate-500 mb-1">Preview gambar baru:</p>
                            <img src="{{ $thumbnail->temporaryUrl() }}" class="w-16 h-16 object-cover rounded-lg border border-slate-200 shadow-sm" alt="Preview Thumbnail">
                        </div>
                    @elseif($existingThumbnail)
                        <div class="mb-2">
                            <p class="text-xs text-slate-500 mb-1">Thumbnail saat ini:</p>
                            <img src="{{ Storage::url($existingThumbnail) }}" class="w-16 h-16 object-cover rounded-lg border border-slate-200 shadow-sm" alt="Thumbnail">
                        </div>
                    @endif
                    <input wire:model="thumbnail" type="file" accept="image/*" class="w-full text-sm">
                    <div wire:loading wire:target="thumbnail" class="text-xs text-emerald-600 mt-1 flex items-center gap-1">
                        <svg class="animate-spin h-3 w-3" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                        Mengunggah...
                    </div>
                    @error('thumbnail') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Deskripsi Singkat *</label>
                    <textarea wire:model="deskripsi" rows="4" class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500"></textarea>
                    @error('deskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Meta Description (SEO)</label>
                    <textarea wire:model="meta_description" rows="2" class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500" placeholder="Deskripsi untuk mesin pencari..."></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Upload Foto Dokumentasi (multiple)</label>
                    <input wire:model="fotoBaruInput" type="file" accept="image/*" multiple key="foto-baru-{{ $inputKey }}" class="w-full text-sm">
                    <div wire:loading wire:target="fotoBaruInput" class="text-xs text-emerald-600 mt-1 flex items-center gap-1">
                        <svg class="animate-spin h-3 w-3" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                        Mengunggah...
                    </div>
                    @error('fotoBaruInput.*') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    
                    {{-- Preview Foto Baru --}}
                    @if($fotoBaru)
                        <div class="mt-4">
                            <p class="text-xs font-semibold text-slate-500 mb-2">Preview {{ count($fotoBaru) }} foto baru:</p>
                            <div class="flex flex-wrap gap-3 pb-2">
                                @foreach($fotoBaru as $index => $foto)
                                    @if($foto)
                                        <div class="relative group flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm transition-all duration-200">
                                            <img src="{{ $foto->temporaryUrl() }}" class="w-full h-full object-cover" alt="Preview {{ $index + 1 }}">
                                            
                                            <!-- Overlay on Hover -->
                                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex flex-col items-center justify-center gap-0.5">
                                                <button type="button" 
                                                        wire:click="removeFotoBaru({{ $index }})" 
                                                        class="p-0.5 bg-red-600 hover:bg-red-700 text-white rounded-full transition-transform transform scale-75 group-hover:scale-100 shadow-md flex items-center justify-center focus:outline-none"
                                                        title="Hapus foto">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                                <span class="text-[8px] text-white font-medium">#{{ $index + 1 }}</span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Foto Dokumentasi Saat Ini --}}
                    @if($kegiatan && $kegiatan->dokumentasi->isNotEmpty())
                        <div class="mt-4 pt-4 border-t border-slate-100">
                            <p class="text-xs font-semibold text-slate-500 mb-2">Foto Dokumentasi Saat Ini ({{ $kegiatan->dokumentasi->count() }}):</p>
                            <div class="flex flex-wrap gap-3 pb-2">
                                @foreach($kegiatan->dokumentasi as $doc)
                                    <div class="relative group flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm transition-all duration-200">
                                        <img src="{{ Storage::url($doc->file_path) }}" class="w-full h-full object-cover" alt="{{ $doc->original_name }}">
                                        
                                        <!-- Overlay on Hover -->
                                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center">
                                            <button type="button" 
                                                    wire:click="removeExistingDokumentasi({{ $doc->id }})" 
                                                    wire:confirm="Hapus foto dokumentasi ini secara permanen?"
                                                    class="p-1 bg-red-600 hover:bg-red-700 text-white rounded-full transition-transform transform scale-75 group-hover:scale-100 shadow-md flex items-center justify-center focus:outline-none"
                                                    title="Hapus foto permanen">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Isi Lengkap Kegiatan</label>
            <textarea wire:model="isi_lengkap" rows="10" class="w-full rounded-lg border-slate-300 text-sm focus:border-emerald-500 focus:ring-emerald-500"></textarea>
        </div>
        <div class="flex justify-end gap-2 pt-4 border-t">
            <a href="{{ route('admin.kegiatan.index') }}" wire:navigate class="px-4 py-2 text-sm border rounded-lg hover:bg-slate-50">Batal</a>
            <button type="submit" {{ empty($tanggal_kegiatan) || empty($status) ? 'disabled' : '' }} class="px-6 py-2 text-sm bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 font-medium disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-emerald-600 transition-all">
                <span wire:loading.remove wire:target="save">Simpan Kegiatan</span>
                <span wire:loading wire:target="save">Menyimpan...</span>
            </button>
        </div>
    </form>
</div>
