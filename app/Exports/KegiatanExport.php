<?php

namespace App\Exports;

use App\Models\Kegiatan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KegiatanExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct(protected array $filters = []) {}

    public function collection(): Collection
    {
        return Kegiatan::query()
            ->with(['kategori', 'lokasi', 'bidang', 'user'])
            ->filter($this->filters)
            ->latest('tanggal_kegiatan')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Judul',
            'Slug',
            'Kategori',
            'Lokasi',
            'Bidang',
            'Tanggal',
            'Status',
            'Published',
            'Penulis',
            'Meta Description',
        ];
    }

    public function map($kegiatan): array
    {
        static $no = 0;

        return [
            ++$no,
            $kegiatan->judul,
            $kegiatan->slug,
            $kegiatan->kategori?->nama,
            $kegiatan->lokasi?->nama,
            $kegiatan->bidang?->nama,
            $kegiatan->tanggal_kegiatan?->format('d/m/Y'),
            $kegiatan->status,
            $kegiatan->is_published ? 'Ya' : 'Tidak',
            $kegiatan->user?->name,
            $kegiatan->meta_description,
        ];
    }
}
