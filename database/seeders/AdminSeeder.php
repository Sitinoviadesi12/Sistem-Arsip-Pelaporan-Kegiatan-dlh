<?php

namespace Database\Seeders;

use App\Models\KategoriKegiatan;
use App\Models\LokasiKegiatan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'baraabiyyi7644@gmail.com'],
            [
                'name' => 'Administrator DLH',
                'password' => Hash::make('Admin@DLH2026'),
                'email_verified_at' => now(),
            ]
        );

        $kategoris = [
            ['nama' => 'Penghijauan', 'deskripsi' => 'Kegiatan penanaman dan penghijauan'],
            ['nama' => 'Kebersihan', 'deskripsi' => 'Kegiatan kebersihan lingkungan'],
            ['nama' => 'Sosialisasi', 'deskripsi' => 'Sosialisasi lingkungan hidup'],
            ['nama' => 'Pengawasan', 'deskripsi' => 'Pengawasan dan patroli lingkungan'],
        ];

        foreach ($kategoris as $kategori) {
            KategoriKegiatan::firstOrCreate(
                ['nama' => $kategori['nama']],
                [
                    'slug' => Str::slug($kategori['nama']),
                    'deskripsi' => $kategori['deskripsi'],
                    'is_active' => true,
                ]
            );
        }

        $lokasis = [
            ['nama' => 'Kantor DLH', 'alamat' => 'Kantor Dinas Lingkungan Hidup'],
            ['nama' => 'Kawasan Publik', 'alamat' => 'Area publik kota'],
            ['nama' => 'Sungai & Waduk', 'alamat' => 'Kawasan perairan'],
        ];

        foreach ($lokasis as $lokasi) {
            LokasiKegiatan::firstOrCreate(
                ['nama' => $lokasi['nama']],
                [
                    'slug' => Str::slug($lokasi['nama']),
                    'alamat' => $lokasi['alamat'],
                    'is_active' => true,
                ]
            );
        }
    }
}
