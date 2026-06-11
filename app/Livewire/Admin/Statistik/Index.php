<?php

namespace App\Livewire\Admin\Statistik;

use App\Models\DokumentasiKegiatan;
use App\Models\Kegiatan;
use App\Models\KategoriKegiatan;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Index extends Component
{
    public int $tahun;

    public function mount(): void
    {
        $this->tahun = (int) now()->year;
    }

    public function render()
    {
        $isSqlite = DB::connection()->getDriverName() === 'sqlite';

        $statistikBulanan = Kegiatan::query()
            ->select(
                $isSqlite ? DB::raw('CAST(strftime("%m", tanggal_kegiatan) AS INTEGER) as bulan') : DB::raw('MONTH(tanggal_kegiatan) as bulan'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('tanggal_kegiatan', $this->tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        $kategoriAktif = KategoriKegiatan::withCount(['kegiatan' => function ($query) {
            $query->whereYear('tanggal_kegiatan', $this->tahun);
        }])
        ->orderByDesc('kegiatan_count')
        ->get();

        $bidangAktif = \App\Models\Bidang::withCount(['kegiatans' => function ($query) {
            $query->whereYear('tanggal_kegiatan', $this->tahun);
        }])
        ->orderByDesc('kegiatans_count')
        ->get();

        $uploadPerBulan = DokumentasiKegiatan::query()
            ->select(
                $isSqlite ? DB::raw('CAST(strftime("%m", created_at) AS INTEGER) as bulan') : DB::raw('MONTH(created_at) as bulan'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('created_at', $this->tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        $totalPublished = Kegiatan::where('is_published', true)->whereYear('tanggal_kegiatan', $this->tahun)->count();
        $totalDraft = Kegiatan::where('status', 'draft')->whereYear('tanggal_kegiatan', $this->tahun)->count();
        $totalKegiatan = Kegiatan::whereYear('tanggal_kegiatan', $this->tahun)->count();
        $totalDokumentasi = DokumentasiKegiatan::whereYear('created_at', $this->tahun)->count();

        $bulanLabels = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agu',
            9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des',
        ];

        $minDate = Kegiatan::min('tanggal_kegiatan');
        $maxDate = Kegiatan::max('tanggal_kegiatan');
        $minYear = $minDate ? (int) \Carbon\Carbon::parse($minDate)->year : now()->year;
        $maxYear = $maxDate ? (int) \Carbon\Carbon::parse($maxDate)->year : now()->year;

        $maxYear = max($maxYear, now()->year);
        $minYear = min($minYear, now()->year - 5);

        $availableYears = range($maxYear, $minYear);

        return view('livewire.admin.statistik.index', compact(
            'statistikBulanan',
            'kategoriAktif',
            'bidangAktif',
            'uploadPerBulan',
            'totalPublished',
            'totalDraft',
            'totalKegiatan',
            'totalDokumentasi',
            'bulanLabels',
            'availableYears'
        ));
    }
}
