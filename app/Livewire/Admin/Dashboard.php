<?php

namespace App\Livewire\Admin;

use App\Models\DokumentasiKegiatan;
use App\Models\Kegiatan;
use App\Models\KategoriKegiatan;
use App\Models\Bidang;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Dashboard extends Component
{
    public function render()
    {
        $totalKegiatan = Kegiatan::count();
        $totalDokumentasi = DokumentasiKegiatan::count();
        $publishedCount = Kegiatan::where('is_published', true)->count();
        $draftCount = Kegiatan::where('status', 'draft')->count();

        $kegiatanTerbaru = Kegiatan::with(['kategori', 'lokasi', 'bidang', 'user'])
            ->latest()
            ->limit(5)
            ->get();

        $isSqlite = DB::connection()->getDriverName() === 'sqlite';

        $statistikBulanan = Kegiatan::query()
            ->select(
                $isSqlite ? DB::raw('CAST(strftime("%m", tanggal_kegiatan) AS INTEGER) as bulan') : DB::raw('MONTH(tanggal_kegiatan) as bulan'),
                $isSqlite ? DB::raw('CAST(strftime("%Y", tanggal_kegiatan) AS INTEGER) as tahun') : DB::raw('YEAR(tanggal_kegiatan) as tahun'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('tanggal_kegiatan', now()->year)
            ->groupBy('tahun', 'bulan')
            ->orderBy('bulan')
            ->get();

        $aktivitasTerbaru = Kegiatan::with(['user', 'kategori', 'bidang'])
            ->latest('updated_at')
            ->limit(8)
            ->get();

        $bidangAktif = Bidang::withCount('kegiatans')
            ->orderByDesc('kegiatans_count')
            ->limit(5)
            ->get();

        $kategoriSemua = KategoriKegiatan::withCount('kegiatan')
            ->orderByDesc('kegiatan_count')
            ->get();

        $bidangSemua = Bidang::withCount('kegiatans')
            ->orderByDesc('kegiatans_count')
            ->get();

        return view('livewire.admin.dashboard', compact(
            'totalKegiatan',
            'totalDokumentasi',
            'publishedCount',
            'draftCount',
            'kegiatanTerbaru',
            'statistikBulanan',
            'aktivitasTerbaru',
            'bidangAktif',
            'kategoriSemua',
            'bidangSemua',
        ));
    }
}
