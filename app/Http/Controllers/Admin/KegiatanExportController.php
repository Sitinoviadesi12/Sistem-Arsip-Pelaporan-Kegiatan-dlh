<?php

namespace App\Http\Controllers\Admin;

use App\Exports\KegiatanExport;
use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KegiatanExportController extends Controller
{
    protected function filters(Request $request): array
    {
        return $request->only(['keyword', 'kategori_id', 'status', 'tanggal_dari', 'tanggal_sampai']);
    }

    public function excel(Request $request)
    {
        $filename = 'laporan-kegiatan-dlh-'.now()->format('Y-m-d-His').'.xlsx';

        return Excel::download(new KegiatanExport($this->filters($request)), $filename);
    }

    public function pdf(Request $request)
    {
        $kegiatan = Kegiatan::query()
            ->with(['kategori', 'lokasi', 'user'])
            ->filter($this->filters($request))
            ->latest('tanggal_kegiatan')
            ->get();

        $pdf = Pdf::loadView('exports.kegiatan-pdf', [
            'kegiatan' => $kegiatan,
            'generatedAt' => now(),
        ])->setPaper('a4', 'landscape');

        return $pdf->download('laporan-kegiatan-dlh-'.now()->format('Y-m-d-His').'.pdf');
    }

    public function print(Request $request)
    {
        $kegiatan = Kegiatan::query()
            ->with(['kategori', 'lokasi', 'user'])
            ->filter($this->filters($request))
            ->latest('tanggal_kegiatan')
            ->get();

        return view('exports.kegiatan-print', [
            'kegiatan' => $kegiatan,
            'generatedAt' => now(),
        ]);
    }
}
