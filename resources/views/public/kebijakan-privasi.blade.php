@extends('layouts.public')

@section('title', 'Kebijakan Privasi')

@section('content')
    {{-- Header Banner --}}
    <section class="pt-32 pb-16 bg-slate-50 dark:bg-slate-900 border-b border-slate-100 dark:border-slate-850">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-public.breadcrumb :items="[['label' => 'Kebijakan Privasi']]" />
            
            <div class="mt-8">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">Kebijakan Privasi</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm sm:text-base">Kebijakan perlindungan data dan privasi pengguna website SIAPK-DLH.</p>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-emerald dark:prose-invert max-w-none space-y-8">

                <div class="p-6 rounded-2xl bg-emerald-50 dark:bg-emerald-500/5 border border-emerald-100 dark:border-emerald-500/10">
                    <p class="text-sm text-emerald-700 dark:text-emerald-400 leading-relaxed m-0">
                        Kebijakan Privasi ini berlaku efektif sejak website SIAPK-DLH diluncurkan dan akan diperbarui sesuai kebutuhan. Terakhir diperbarui: <strong>{{ date('d F Y') }}</strong>.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">1. Pendahuluan</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Dinas Lingkungan Hidup Kabupaten Tegal ("kami") menghargai privasi pengunjung website SIAPK-DLH (Sistem Informasi Publikasi Kegiatan Dinas Lingkungan Hidup). Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, menyimpan, dan melindungi informasi pribadi Anda saat menggunakan layanan website kami.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">2. Informasi yang Kami Kumpulkan</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed mb-3">Kami dapat mengumpulkan informasi berikut:</p>
                    <ul class="text-sm text-slate-600 dark:text-slate-400 space-y-2 list-disc pl-5">
                        <li><strong>Informasi yang Anda berikan secara langsung:</strong> Nama, alamat email, dan isi pesan yang disampaikan melalui formulir kontak.</li>
                        <li><strong>Informasi teknis otomatis:</strong> Alamat IP, jenis browser, sistem operasi, halaman yang dikunjungi, waktu akses, dan data log server lainnya.</li>
                        <li><strong>Cookies:</strong> Kami menggunakan cookies untuk menyimpan preferensi tampilan (seperti mode gelap/terang) guna meningkatkan pengalaman pengguna.</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">3. Tujuan Penggunaan Informasi</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed mb-3">Informasi yang dikumpulkan digunakan untuk:</p>
                    <ul class="text-sm text-slate-600 dark:text-slate-400 space-y-2 list-disc pl-5">
                        <li>Menanggapi pertanyaan, aduan, atau pesan yang disampaikan melalui formulir kontak;</li>
                        <li>Meningkatkan kualitas layanan dan konten website;</li>
                        <li>Menganalisis statistik kunjungan untuk keperluan evaluasi internal;</li>
                        <li>Memenuhi kewajiban hukum dan peraturan perundang-undangan yang berlaku.</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">4. Perlindungan Data</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Kami menerapkan langkah-langkah keamanan teknis dan organisasi yang wajar untuk melindungi informasi pribadi Anda dari akses tidak sah, perubahan, pengungkapan, atau penghancuran. Data yang dikirimkan melalui formulir kontak dienkripsi menggunakan protokol HTTPS/TLS.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">5. Pembagian Informasi kepada Pihak Ketiga</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Kami <strong>tidak menjual, memperdagangkan, atau menyewakan</strong> informasi pribadi Anda kepada pihak ketiga. Informasi hanya dapat dibagikan kepada instansi pemerintah terkait apabila diwajibkan oleh peraturan perundang-undangan yang berlaku.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">6. Hak Pengguna</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed mb-3">Anda memiliki hak untuk:</p>
                    <ul class="text-sm text-slate-600 dark:text-slate-400 space-y-2 list-disc pl-5">
                        <li>Mengetahui informasi pribadi apa saja yang kami simpan terkait diri Anda;</li>
                        <li>Meminta penghapusan atau koreksi atas informasi pribadi Anda;</li>
                        <li>Menolak penggunaan cookies dengan mengatur preferensi di browser Anda.</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">7. Tautan ke Website Lain</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Website kami mungkin memuat tautan ke website eksternal. Kami tidak bertanggung jawab atas praktik privasi atau konten dari website pihak ketiga tersebut. Kami menyarankan Anda untuk membaca kebijakan privasi dari setiap website yang Anda kunjungi.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">8. Perubahan Kebijakan Privasi</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Kami berhak memperbarui Kebijakan Privasi ini sewaktu-waktu tanpa pemberitahuan sebelumnya. Perubahan akan dipublikasikan di halaman ini dengan tanggal pembaruan terbaru. Penggunaan berkelanjutan atas website ini setelah perubahan dianggap sebagai persetujuan terhadap kebijakan yang diperbarui.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">9. Hubungi Kami</h2>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                        Apabila Anda memiliki pertanyaan mengenai Kebijakan Privasi ini, silakan hubungi kami melalui:
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
