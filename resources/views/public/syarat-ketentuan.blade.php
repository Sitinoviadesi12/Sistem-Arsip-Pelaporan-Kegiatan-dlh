@extends('layouts.public')

@section('title', 'Syarat & Ketentuan')

@section('content')
    {{-- Header Banner --}}
    <section class="pt-32 pb-16 bg-slate-50 dark:bg-slate-900 border-b border-slate-100 dark:border-slate-850">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-public.breadcrumb :items="[['label' => 'Syarat & Ketentuan']]" />
            
            <div class="mt-8">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">Syarat & Ketentuan</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm sm:text-base">Ketentuan penggunaan layanan website SIAPK-DLH Kabupaten Tegal.</p>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-emerald dark:prose-invert max-w-none space-y-8">

                <div class="p-6 rounded-2xl bg-emerald-50 dark:bg-emerald-500/5 border border-emerald-100 dark:border-emerald-500/10">
                    <p class="text-sm text-emerald-700 dark:text-emerald-400 leading-relaxed m-0">
                        Dengan mengakses dan menggunakan website SIAPK-DLH, Anda dianggap telah membaca, memahami, dan menyetujui seluruh Syarat & Ketentuan yang berlaku. Terakhir diperbarui: <strong>{{ date('d F Y') }}</strong>.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">1. Ketentuan Umum</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Website SIAPK-DLH (Sistem Informasi Publikasi Kegiatan Dinas Lingkungan Hidup) adalah portal informasi resmi yang dikelola oleh Dinas Lingkungan Hidup Kabupaten Tegal. Website ini menyediakan informasi terkait kegiatan, dokumentasi, dan layanan publik di bidang lingkungan hidup.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">2. Hak Kekayaan Intelektual</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Seluruh konten yang tersedia di website ini, termasuk namun tidak terbatas pada teks, gambar, grafik, logo, ikon, foto, video, dan dokumentasi, merupakan milik Dinas Lingkungan Hidup Kabupaten Tegal dan dilindungi oleh undang-undang hak cipta Republik Indonesia. Penggunaan konten tanpa izin tertulis dilarang keras.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">3. Penggunaan yang Diperbolehkan</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed mb-3">Anda diperbolehkan untuk:</p>
                    <ul class="text-sm text-slate-600 dark:text-slate-400 space-y-2 list-disc pl-5">
                        <li>Mengakses dan menjelajahi konten website untuk keperluan informasi dan edukasi;</li>
                        <li>Mengunduh atau mencetak konten untuk kepentingan pribadi dan non-komersial dengan mencantumkan sumber;</li>
                        <li>Membagikan tautan (link) halaman website kepada pihak lain;</li>
                        <li>Menggunakan formulir kontak untuk menyampaikan pertanyaan, saran, atau aduan terkait lingkungan hidup.</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">4. Penggunaan yang Dilarang</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed mb-3">Anda dilarang untuk:</p>
                    <ul class="text-sm text-slate-600 dark:text-slate-400 space-y-2 list-disc pl-5">
                        <li>Menggunakan website ini untuk tujuan yang melanggar hukum atau peraturan perundang-undangan;</li>
                        <li>Menggandakan, mendistribusikan, atau mengubah konten website untuk tujuan komersial tanpa izin;</li>
                        <li>Melakukan tindakan yang dapat merusak, melumpuhkan, atau membebani server dan infrastruktur website;</li>
                        <li>Mengunggah atau menyebarkan konten yang mengandung virus, malware, atau kode berbahaya lainnya;</li>
                        <li>Menyalahgunakan formulir kontak untuk mengirimkan spam, hoaks, atau informasi palsu;</li>
                        <li>Mengakses sistem atau data secara tidak sah (hacking).</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">5. Keakuratan Informasi</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Kami berupaya sebaik mungkin untuk menyajikan informasi yang akurat dan terkini. Namun, kami tidak menjamin bahwa seluruh informasi di website ini bebas dari kesalahan. Informasi resmi dan mengikat hanya berlaku sebagaimana tertuang dalam dokumen resmi yang diterbitkan oleh Dinas Lingkungan Hidup Kabupaten Tegal.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">6. Ketersediaan Layanan</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Kami tidak menjamin bahwa website akan tersedia secara terus-menerus tanpa gangguan. Website dapat mengalami pemeliharaan berkala, pembaruan sistem, atau gangguan teknis yang berada di luar kendali kami. Kami tidak bertanggung jawab atas kerugian yang timbul akibat ketidaktersediaan layanan.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">7. Tautan Eksternal</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Website ini mungkin memuat tautan ke website pihak ketiga untuk kemudahan akses informasi. Kami tidak memiliki kendali atas konten, kebijakan privasi, atau praktik website pihak ketiga tersebut dan tidak bertanggung jawab atas segala risiko yang ditimbulkan.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">8. Batasan Tanggung Jawab</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Dinas Lingkungan Hidup Kabupaten Tegal tidak bertanggung jawab atas segala kerugian langsung maupun tidak langsung yang timbul dari penggunaan website ini, termasuk namun tidak terbatas pada kehilangan data, gangguan operasional, atau kerusakan perangkat pengguna.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">9. Perubahan Syarat & Ketentuan</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Kami berhak mengubah Syarat & Ketentuan ini sewaktu-waktu tanpa pemberitahuan sebelumnya. Perubahan akan berlaku efektif sejak dipublikasikan di halaman ini. Kami menyarankan Anda untuk secara berkala memeriksa halaman ini guna mengetahui pembaruan terbaru.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">10. Hukum yang Berlaku</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Syarat & Ketentuan ini tunduk pada dan ditafsirkan sesuai dengan hukum Negara Republik Indonesia. Segala sengketa yang timbul dari penggunaan website ini akan diselesaikan melalui musyawarah mufakat, dan apabila tidak tercapai kesepakatan, akan diselesaikan melalui pengadilan yang berwenang di wilayah hukum Kabupaten Tegal.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">11. Hubungi Kami</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Apabila Anda memiliki pertanyaan mengenai Syarat & Ketentuan ini, silakan hubungi kami melalui:
                    </p>
                    <ul class="text-sm text-slate-600 dark:text-slate-400 space-y-2 list-disc pl-5 mt-3">
                        <li><strong>Email:</strong> dlhkabupatentegal@gmail.com</li>
                        <li><strong>Telepon:</strong> (0283) – 491159</li>
                        <li><strong>Alamat:</strong> Jl. Prof. M. Yamin No. 559 Kudaile, Kec. Slawi, Kabupaten Tegal, Prov. Jawa Tengah, 52413</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
@endsection
