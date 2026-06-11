<?php

use App\Http\Controllers\Admin\KegiatanExportController;
use App\Livewire\Admin\Bidang\Index as BidangIndex;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Dokumentasi\Index as DokumentasiIndex;
use App\Livewire\Admin\Kategori\Index as KategoriIndex;
use App\Livewire\Admin\Kegiatan\Form as KegiatanForm;
use App\Livewire\Admin\Kegiatan\Index as KegiatanIndex;
use App\Livewire\Admin\Kegiatan\Show as KegiatanShow;
use App\Livewire\Admin\Lokasi\Index as LokasiIndex;
use App\Livewire\Admin\Pengaturan\Index as PengaturanIndex;
use App\Livewire\Admin\Statistik\Index as StatistikIndex;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/kegiatan', [PublicController::class, 'kegiatan'])->name('kegiatan.index');
Route::get('/kegiatan/{slug}', [PublicController::class, 'kegiatanDetail'])->name('kegiatan.show');
Route::get('/dokumentasi', [PublicController::class, 'dokumentasi'])->name('dokumentasi.index');
Route::get('/tentang', [PublicController::class, 'tentang'])->name('tentang');
Route::get('/kategori-bidang', [PublicController::class, 'kategoriBidang'])->name('kategori-bidang');
Route::get('/titik-lokasi', [PublicController::class, 'titikLokasi'])->name('titik-lokasi');
Route::get('/kontak', [PublicController::class, 'kontak'])->name('kontak');
Route::post('/kontak/kirim', [PublicController::class, 'kirimPesan'])->name('kontak.kirim');
Route::get('/kebijakan-privasi', [PublicController::class, 'kebijakanPrivasi'])->name('kebijakan-privasi');
Route::get('/syarat-ketentuan', [PublicController::class, 'syaratKetentuan'])->name('syarat-ketentuan');

Route::middleware(['auth', 'session.timeout'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/kegiatan', KegiatanIndex::class)->name('kegiatan.index');
        Route::get('/kegiatan/create', KegiatanForm::class)->name('kegiatan.create');
        Route::get('/kegiatan/{kegiatan}/edit', KegiatanForm::class)->name('kegiatan.edit');
        Route::get('/kegiatan/{kegiatan}', KegiatanShow::class)->name('kegiatan.show');

        Route::get('/kegiatan-export/excel', [KegiatanExportController::class, 'excel'])->name('kegiatan.export.excel');
        Route::get('/kegiatan-export/pdf', [KegiatanExportController::class, 'pdf'])->name('kegiatan.export.pdf');
        Route::get('/kegiatan-export/print', [KegiatanExportController::class, 'print'])->name('kegiatan.export.print');

        Route::get('/kategori', KategoriIndex::class)->name('kategori.index');
        Route::get('/bidang', BidangIndex::class)->name('bidang.index');
        Route::get('/lokasi', LokasiIndex::class)->name('lokasi.index');
        Route::get('/dokumentasi', DokumentasiIndex::class)->name('dokumentasi.index');
        Route::get('/statistik', StatistikIndex::class)->name('statistik.index');
        Route::get('/pengaturan', PengaturanIndex::class)->name('pengaturan.index');
    });
});

require __DIR__.'/auth.php';
