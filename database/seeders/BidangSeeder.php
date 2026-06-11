<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bidang;
use Illuminate\Support\Str;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bidangs = [
            [
                'nama' => 'SEKRETARIS',
                'slug' => 'sekretaris',
                'deskripsi' => 'Bidang Sekretaris yang mengelola administrasi, keuangan, dan kepegawaian dinas.'
            ],
            [
                'nama' => 'SUBBAGIAN KEUANGAN',
                'slug' => 'subbagian-keuangan',
                'deskripsi' => 'Subbagian yang menangani pengelolaan keuangan, anggaran, dan pelaporan keuangan dinas.'
            ],
            [
                'nama' => 'SUBBAGIAN UMUM DAN KEPEGAWAIAN',
                'slug' => 'subbagian-umum-dan-kepegawaian',
                'deskripsi' => 'Subbagian yang mengelola urusan umum, perlengkapan, dan kepegawaian.'
            ],
            [
                'nama' => 'BIDANG PENATAAN LINGKUNGAN HIDUP',
                'slug' => 'bidang-penataan-lingkungan-hidup',
                'deskripsi' => 'Bidang yang menangani perencanaan, penataan, dan pengembangan lingkungan hidup.'
            ],
            [
                'nama' => 'BIDANG PENGENDALIAN DAN PENGAWASAN LINGKUNGAN HIDUP',
                'slug' => 'bidang-pengendalian-dan-pengawasan-lingkungan-hidup',
                'deskripsi' => 'Bidang yang bertanggung jawab dalam pengendalian pencemaran dan pengawasan lingkungan hidup.'
            ],
            [
                'nama' => 'BIDANG PENGELOLAAN SAMPAH DAN LIMBAH BAHAN BERBAHAYA DAN BERACUN',
                'slug' => 'bidang-pengelolaan-sampah-dan-limbah-b3',
                'deskripsi' => 'Bidang yang mengelola sampah dan limbah bahan berbahaya dan beracun (B3).'
            ],
        ];

        foreach ($bidangs as $bidang) {
            Bidang::create($bidang);
        }
    }
}
