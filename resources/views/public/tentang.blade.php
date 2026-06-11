@extends('layouts.public')

@section('title', 'Tentang Kami')

@section('content')
    {{-- Header Banner --}}
    <section class="pt-32 pb-16 bg-slate-50 dark:bg-slate-900 border-b border-slate-100 dark:border-slate-850">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-public.breadcrumb :items="[['label' => 'Tentang']]" />

            <div class="mt-8">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">Tentang Dinas
                    Lingkungan Hidup Kab.Tegal</h1>
                <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm sm:text-base">Mengenal visi, misi, tugas pokok dan
                    jajaran kepengurusan DLH.</p>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-emerald dark:prose-invert max-w-none prose-content space-y-12">

                <div>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Profile Dinas Lingkungan Hidup Kab.
                        Tegal
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Kelembagaan di daerah yang menangani urusan lingkungan hidup pada awalnya adalah salah satu Bagian
                        di lingkungan Sekretariat Wilayah/Daerah berdasarkan Peraturan Daerah Kabupaten Tingkat II Tegal
                        Nomor : 18 Tahun 1992 tentang Susunan Organisasi dan Tata Kerja Sekretariat Wilayah/Daerah dan
                        Sekretariat Dewan Perwakilan Rakyat Daerah Kabupaten Daerah Tingkat II Tegal. Pada tahun 2000,
                        Bagian Lingkungan Hidup dilikuidasi karena terbentuknya Badan Pengendalian Dampak Lingkungan Hidup
                        Daerah (BAPEDALDA), akan tetapi Badan ini tidak berumur panjang, karena pada tahun 2002 mengalami
                        degradasi kelembagaan menjadi Kantor Pengendalian Dampak Lingkungan Daerah ( Kantor PEDALDA).

                        Selanjutnya pada tahun 2005 Kantor PEDALDA bergabung dengan Kantor Kebersihan dan Pertamanan menjadi
                        Dinas Lingkungan Hidup, Kebersihan dan Pertamanan (DLHKP) yang kemudian pada tahun 2008 berubah
                        menjadi Badan Lingkungan Hidup (BLH) berdasarkan Peraturan Daerah Nomor 9 Tahun 2008 jo Perda Nomor
                        10 Tahun 2009 tentang Pembentukan Organisasi dan Lembaga Teknis Daerah.

                        Dalam perkembangannya yang terakhir, Badan Lingkungan Hidup berubah menjadi Dinas Lingkungan Hidup
                        Kabupaten Tegal yang merupakan salah satu Perangkat Daerah berupa Dinas Type A yang dibentuk
                        berdasarkan Peraturan Daerah Nomor 12 Tahun 2016 tentang Pembentukan Organisasi Inspektorat dan
                        lembaga Teknis Daerah, yang mempunyai tugas pokok dan fungsi membantu Bupati Tegal dalam
                        penyelenggaraan pemerintahan daerah di bidang tata lingkungan, bidang pengelolaan sampah dan limbah
                        B3, bidang pengendalian pencemaran dan kerusakan lingkungan hidup, dan bidang penaatan dan
                        peningkatan kapasitas lingkungan hidup.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-6">
                    <div
                        class="p-8 rounded-3xl bg-slate-50 dark:bg-slate-850 border border-slate-100 dark:border-slate-800">
                        <h3 class="text-xl font-bold text-emerald-600 dark:text-emerald-400 mb-4">Visi</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed font-medium">
                            Memperkuat Daya Saing Daerah Melalui Pembangunan Infrastruktur Yang Andal, Berkualitas Dan
                            Terintegrasi Serta Berwawasan Lingkungan
                        </p>
                    </div>

                    <div
                        class="p-8 rounded-3xl bg-slate-50 dark:bg-slate-850 border border-slate-100 dark:border-slate-800">
                        <h3 class="text-xl font-bold text-emerald-600 dark:text-emerald-400 mb-4">Misi</h3>
                        <ol class="text-sm text-slate-600 dark:text-slate-400 space-y-3 list-decimal pl-4 leading-relaxed">
                            <li>Mengembangkan sumber daya aparatur dan masyarakat di bidang pengelolaan lingkungan hidup dan
                                sumber daya alam</li>
                            <li>Melaksanakan upaya pengendalian yang meliputi pencegahan, penanggulangan dan pemulihan
                                terhadap pencemaran dan kerusakan lingkungan hidup</li>
                            <li>Melaksanakan dan menilai pengkajian dampak lingkungan hidup</li>
                            <li>Mengembangkan kapasitas, sarana dan teknologi lingkungan untuk pengendalian pencemaran dan
                                kerusakan lingkungan hidup</li>
                            <li>Melaksanakan pengawasan dan penegakan hukum lingkungan</li>
                        </ol>
                    </div>
                </div>





                <div class="pt-6 not-prose">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Tugas Pokok</h2>

                    <div class="border-t border-slate-200 dark:border-slate-800 divide-y divide-slate-200 dark:divide-slate-800"
                        x-data="{ activeAccordion: null }">

                        <!-- 1. KEPALA DINAS LINGKUNGAN HIDUP -->
                        <div class="py-4">
                            <button @click="activeAccordion = activeAccordion === 1 ? null : 1"
                                class="w-full flex justify-between items-center text-left focus:outline-none group">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="text-sm font-semibold text-slate-400 dark:text-slate-500 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">01</span>
                                    <h3
                                        class="font-bold text-slate-900 dark:text-white text-base group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                                        Kepala Dinas Lingkungan Hidup</h3>
                                </div>
                                <svg :class="activeAccordion === 1 ? 'rotate-180 text-emerald-600' : 'text-slate-400'"
                                    class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="activeAccordion === 1" x-collapse x-cloak class="mt-4 pl-8">
                                <h4
                                    class="text-[11px] font-bold text-emerald-600 dark:text-emerald-400 tracking-wider uppercase mb-3">
                                    Uraian Tugas:</h4>
                                <div class="space-y-3 text-sm text-slate-650 dark:text-slate-300 leading-relaxed">

                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">a.
                                        </div>
                                        <div>merumuskan dan menetapkan perencanaan Dinas berdasarkan peraturan
                                            perundang-undangan dan hasil evaluasi kegiatan tahun sebelumnya sebagai pedoman
                                            pelaksanaan tugas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">b.
                                        </div>
                                        <div>menyelenggarakan koordinasi dan konsultasi dengan instansi/lembaga terkait
                                            dalam pelaksanaan program-program di bidang penataan lingkungan hidup, bidang
                                            pengendalian dan pengawasan lingkungan hidup, dan bidang pengelolaan sampah dan
                                            limbah Bahan Berbahaya Beracun;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">c.
                                        </div>
                                        <div>merumuskan kebijakan umum dan teknis operasional di bidang penataan lingkungan
                                            hidup, bidang pengendalian dan pengawasan lingkungan hidup, dan bidang
                                            pengelolaan sampah dan limbah Bahan Berbahaya Beracun;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">d.
                                        </div>
                                        <div>menelaah dan mengkaji peraturan perundang-undangan di bidang penataan
                                            lingkungan hidup, bidang pengendalian dan pengawasan lingkungan hidup, dan
                                            bidang pengelolaan sampah dan limbah Bahan Berbahaya Beracun sebagai bahan
                                            perumusan kebijakan teknis serta pedoman pelaksanaan tugas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">e.
                                        </div>
                                        <div>membina dan memberikan dukungan atas penyelenggaraan tugas di bidang penataan
                                            lingkungan hidup, bidang pengendalian dan pengawasan lingkungan hidup, dan
                                            bidang pengelolaan sampah dan limbah Bahan Berbahaya Beracun sesuai peraturan
                                            perundang-undangan agar kinerja Dinas mencapai target yang ditetapkan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">f.
                                        </div>
                                        <div>menyelenggarakan pelayanan prima, fasilitasi dan inovasi di bidang penataan
                                            lingkungan hidup, bidang pengendalian dan pengawasan lingkungan hidup, dan
                                            bidang pengelolaan sampah dan limbah Bahan Berbahaya Beracun sesuai dengan
                                            ketentuan guna peningkatan kualitas kerja;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">g.
                                        </div>
                                        <div>menerapkan SOP-AP dalam penyelenggaraan kegiatan di bidang penataan lingkungan
                                            hidup, bidang pengendalian dan pengawasan lingkungan hidup, dan bidang
                                            pengelolaan sampah dan limbah Bahan Berbahaya Beracun agar diperoleh hasil kerja
                                            yang optimal;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">h.
                                        </div>
                                        <div>mengoordinasikan penyusunan, penetapan, pengendalian dan pengawasan di bidang
                                            penataan lingkungan hidup, bidang pengendalian dan pengawasan lingkungan hidup,
                                            dan bidang pengelolaan sampah dan limbah Bahan Berbahaya Beracun;
                                            menyelenggarakan kerjasama dan kemitraan di bidang penataan lingkungan hidup,
                                            bidang pengendalian dan pengawasan lingkungan hidup, dan bidang pengelolaan
                                            sampah dan limbah Bahan Berbahaya Beracun dengan Pemerintah Pusat, Pemerintah
                                            Provinsi dan pihak lain agar terjalin sinkronisasi program kegiatan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">i.
                                        </div>
                                        <div>mengelola dan mengembangkan sistem informasi dan data di bidang penataan
                                            lingkungan hidup, bidang pengendalian dan pengawasan lingkungan hidup, dan
                                            bidang pengelolaan sampah dan limbah Bahan Berbahaya Beracun agar diperoleh
                                            efektivitas dan efisiensi pelaksanaan kegiatan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">j.
                                        </div>
                                        <div>menyelenggarakan koordinasi pengelolaan taman hutan raya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">k.
                                        </div>
                                        <div>membina pengelolaan kesekretariatan/ketatausahaan dinas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">l.
                                        </div>
                                        <div>membina pengelolaan aset dinas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">m.
                                        </div>
                                        <div>membina pemungutan retribusi dinas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">n.
                                        </div>
                                        <div>membina unit pelaksana teknis di bidang lingkungan hidup;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">o.
                                        </div>
                                        <div>menginventarisasi dan menyelesaikan permasalahan yang berhubungan dengan bidang
                                            penataan lingkungan hidup, bidang pengendalian dan pengawasan lingkungan hidup,
                                            dan bidang pengelolaan sampah dan limbah bahan berbahaya beracun;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">p.
                                        </div>
                                        <div>mendistribusikan tugas kepada bawahan agar pelaksanaan tugas berjalan sesuai
                                            dengan proporsi masing-masing;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">q.
                                        </div>
                                        <div>memberikan motivasi dan penilaian kepada bawahan guna meningkatkan prestasi,
                                            dedikasi dan loyalitas bawahan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">r.
                                        </div>
                                        <div>mengendalikan, mengevaluasi dan melaporkan pelaksanaan tugas di bidang penataan
                                            lingkungan hidup, bidang pengendalian dan pengawasan lingkungan hidup, dan
                                            bidang pengelolaan sampah dan limbah bahan berbahaya beracun; dan</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">s.
                                        </div>
                                        <div>menyelenggarakan tugas lain yang di berikan oleh Bupati sesuai dengan peraturan
                                            perundang-undangan yang berlaku.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2. SEKRETARIS -->
                        <div class="py-4">
                            <button @click="activeAccordion = activeAccordion === 2 ? null : 2"
                                class="w-full flex justify-between items-center text-left focus:outline-none group">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="text-sm font-semibold text-slate-400 dark:text-slate-500 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">02</span>
                                    <h3
                                        class="font-bold text-slate-900 dark:text-white text-base group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                                        Sekretaris</h3>
                                </div>
                                <svg :class="activeAccordion === 2 ? 'rotate-180 text-emerald-600' : 'text-slate-400'"
                                    class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="activeAccordion === 2" x-collapse x-cloak class="mt-4 pl-8">
                                <h4
                                    class="text-[11px] font-bold text-emerald-600 dark:text-emerald-400 tracking-wider uppercase mb-3">
                                    Uraian Tugas:</h4>
                                <div class="space-y-3 text-sm text-slate-650 dark:text-slate-300 leading-relaxed">

                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">a.
                                        </div>
                                        <div>menyusunan rencana kerja;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">b.
                                        </div>
                                        <div>merumuskan kebijakan kesekretariatan/ketatausahaan, umum dan teknis
                                            operasional;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">c.
                                        </div>
                                        <div>melaksanakan pengoordinasian penyiapan bahan rencana kerja Dinas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">d.
                                        </div>
                                        <div>menyiapkan konsep kebijakan Kepala Dinas dan naskah dinas yang berkaitan dengan
                                            kegiatan perencanaan, evaluasi, pelaporan, sistem informasi, keuangan,
                                            administrasi umum, kepegawaian dan fungsi lain yang diberikan oleh Kepala Dinas;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">e.
                                        </div>
                                        <div>mengoordinasikan dan menyiapkan konsep Rencana Kegiatan dan Anggaran, Dokumen
                                            Pelaksanaan Anggaran serta perubahan anggaran sesuai ketentuan dan plafon
                                            anggaran yang ditetapkan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">f.
                                        </div>
                                        <div>mengoordinasikan dan menyiapkan konsep Renstra, Renja, Indikator Kinerja Utama,
                                            Perjanjian Kinerja dan jenis dokumen perencanaan lainnya sesuai dengan ketentuan
                                            yang berlaku;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">g.
                                        </div>
                                        <div>mengoordinasikan dan menyiapkan konsep LKPJ, LKjIP, LPPD, Evaluasi Kinerja
                                            Pembangunan Daerah, Sistem Pengendalian Intern Pemerintah, Pengendalian
                                            Operasional Kegiatan dan jenis pelaporan lainnya sesuai dengan ketentuan yang
                                            berlaku;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">h.
                                        </div>
                                        <div>menyelenggarakan Sistem Pengendalian Intern Pemerintah Dinas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">i.
                                        </div>
                                        <div>mengelola sistem informasi dan data Dinas sesuai dengan ketentuan yang berlaku
                                            agar diperoleh efektivitas dan efisiensi pelaksanaan kegiatan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">j.
                                        </div>
                                        <div>menyelenggarakan pelayanan administrasi umum, kepegawaian, keuangan,
                                            ketatalaksanaan, kehumasan, protokoler, perpustakaan, kearsipan, dokumentasi,
                                            perlengkapan/perbekalan, pengamanan kantor, kebersihan dan pertamanan,
                                            pengelolaan aset tetap dan aset tidak tetap, serta fasilitasi kegiatan rapat dan
                                            penerimaan kunjungan tamu Dinas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">k.
                                        </div>
                                        <div>mengoordinasikan rencana dan proses pengadaan barang dan jasa di lingkungan
                                            Dinas sesuai dengan peraturan perundang-undangan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">l.
                                        </div>
                                        <div>mengoordinasikan dan memfasilitasi penyusunan SOP-AP, analisis jabatan,
                                            analisis beban kerja, evaluasi jabatan, budaya kerja, reformasi birokrasi,
                                            survei kepuasan masyarakat, standar pelayanan serta pengusulan formasi kebutuhan
                                            pegawai Dinas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">m.
                                        </div>
                                        <div>melaksanakan pengoordinasian penyelenggaraan tugas Dinas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">n.
                                        </div>
                                        <div>melaksanakan koordinasi dan pengelolaan urusan keuangan, kepegawaian dan umum;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">o.
                                        </div>
                                        <div>menginventarisasi permasalahan yang berhubungan dengan urusan
                                            kesekretariatan/ketatausahaan serta menyajikan alternatif pemecahannya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">p.
                                        </div>
                                        <div>mendistribusikan tugas kepada bawahan agar pelaksanaan tugas berjalan sesuai
                                            dengan proporsi masing-masing;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">q.
                                        </div>
                                        <div>membentuk tim kerja, mengarahkan dan mengevaluasi kinerja tim;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">r.
                                        </div>
                                        <div>memberikan motivasi dan penilaian kepada bawahan guna meningkatkan prestasi,
                                            dedikasi dan loyalitas bawahan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">s.
                                        </div>
                                        <div>melaksanakan pengendalian, evaluasi dan menyusun laporan pelaksanaan tugas; dan
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">t.
                                        </div>
                                        <div>melaksanakan tugas lain yang diberikan oleh Atasan sesuai dengan peraturan
                                            perundang-undangan yang berlaku.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 3. KEPALA SUBBAGIAN KEUANGAN -->
                        <div class="py-4">
                            <button @click="activeAccordion = activeAccordion === 3 ? null : 3"
                                class="w-full flex justify-between items-center text-left focus:outline-none group">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="text-sm font-semibold text-slate-400 dark:text-slate-500 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">03</span>
                                    <h3
                                        class="font-bold text-slate-900 dark:text-white text-base group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                                        Kepala Subbagian Keuangan</h3>
                                </div>
                                <svg :class="activeAccordion === 3 ? 'rotate-180 text-emerald-600' : 'text-slate-400'"
                                    class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="activeAccordion === 3" x-collapse x-cloak class="mt-4 pl-8">
                                <h4
                                    class="text-[11px] font-bold text-emerald-600 dark:text-emerald-400 tracking-wider uppercase mb-3">
                                    Uraian Tugas:</h4>
                                <div class="space-y-3 text-sm text-slate-650 dark:text-slate-300 leading-relaxed">

                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">a.
                                        </div>
                                        <div>menyusun rencana dan program kegiatan Subbagian berdasarkan peraturan
                                            perundang-undangan dan hasil evaluasi kegiatan tahun sebelumnya sebagai pedoman
                                            pelaksanaan tugas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">b.
                                        </div>
                                        <div>menjabarkan perintah pimpinan melalui pengkajian permasalahan dan peraturan
                                            perundang-undangan agar pelaksanaan tugas berjalan efektif dan efisien;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">c.
                                        </div>
                                        <div>melakukan pengumpulan, pengolahan dan penelaahan data/informasi sebagai bahan
                                            perumusan kebijakan umum dan teknis operasional;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">d.
                                        </div>
                                        <div>melaksanakan koordinasi dan konsultasi dengan instansi terkait baik vertikal
                                            maupun horizontal untuk mendapatkan informasi, masukan, serta dalam rangka
                                            sinkronisasi dan harmonisasi pelaksanaan tugas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">e.
                                        </div>
                                        <div>menelaah dan mengkaji peraturan perundang-undangan sesuai lingkup tugasnya
                                            sebagai bahan atau pedoman untuk melaksanakan kegiatan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">f.
                                        </div>
                                        <div>menyiapkan bahan penyusunan petunjuk teknis, petunjuk pelaksanaan, dan naskah
                                            dinas sesuai lingkup tugasnya guna mendukung kelancaran pelaksanaan kegiatan;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">g.
                                        </div>
                                        <div>menyiapkan bahan dan menyusun konsep Rencana Kegiatan dan Anggaran, Dokumen
                                            Pelaksanaan Anggaran serta perubahan anggaran sesuai ketentuan dan plafon
                                            anggaran yang ditetapkan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">h.
                                        </div>
                                        <div>menyiapkan bahan dan menyusun materi tindak lanjut hasil pemeriksaan atau audit
                                            sesuai dengan peraturan perundang-undangan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">i.
                                        </div>
                                        <div>menyiapkan bahan dan sarana administrasi keuangan dalam rangka pencairan
                                            anggaran, pengelolaan, pembukuan, dan pelaporan pertanggungjawaban keuangan;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">j.
                                        </div>
                                        <div>menghimpun dan memproses usulan pencairan anggaran baik di lingkungan
                                            Sekretariat, Bidang, dan Unit Pelaksana Teknis sesuai dengan prosedur dan
                                            ketentuan yang berlaku;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">k.
                                        </div>
                                        <div>menyiapkan bahan dan mengoordinasikan proses administrasi keuangan melalui
                                            aplikasi sistem informasi untuk pengelolaan keuangan daerah sesuai dengan
                                            peraturan perundang-undangan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">l.
                                        </div>
                                        <div>menyiapkan bahan pembinaan, sosialisasi, dan bimbingan teknis di bidang
                                            keuangan kepada pejabat pengelola keuangan dan bendahara di lingkungan Dinas;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">m.
                                        </div>
                                        <div>memfasilitasi penyusunan reformasi birokrasi;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">n.
                                        </div>
                                        <div>melaksanakan inventarisasi permasalahan yang berhubungan dengan tugas, serta
                                            menyajikan alternatif pemecahannya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">o.
                                        </div>
                                        <div>melaksanakan pengendalian dan evaluasi penyerapan anggaran dengan cara
                                            membandingkan laporan perkembangan realisasi belanja dengan rencana pembiayaan
                                            yang ditetapkan sebelumnya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">p.
                                        </div>
                                        <div>melaksanakan verifikasi terhadap berkas/dokumen pertanggungjawaban keuangan
                                            pelaksanaan kegiatan guna menghindari kesalahan serta memberikan koreksi
                                            penyempurnaan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">q.
                                        </div>
                                        <div>menyiapkan bahan dan menyusun laporan pertanggungjawaban keuangan Dinas serta
                                            jenis pelaporan keuangan lainnya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">r.
                                        </div>
                                        <div>menyiapkan bahan dan menyusun konsep SOP-AP dalam penyelenggaraan kegiatan di
                                            lingkup tugasnya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">s.
                                        </div>
                                        <div>menginventarisasi permasalahan yang berhubungan dengan urusan
                                            kesekretariatan/ketatausahaan serta menyajikan alternatif pemecahannya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">t.
                                        </div>
                                        <div>mendistribusikan tugas kepada bawahan agar pelaksanaan tugas berjalan sesuai
                                            dengan proporsi masing-masing;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">u.
                                        </div>
                                        <div>membentuk tim kerja, mengarahkan dan mengevaluasi kinerja tim yang melaksanakan
                                            perencanaan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">v.
                                        </div>
                                        <div>memberikan motivasi dan penilaian kepada bawahan guna meningkatkan prestasi,
                                            dedikasi dan loyalitas bawahan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">w.
                                        </div>
                                        <div>melaksanakan pengendalian, evaluasi dan menyusun laporan pelaksanaan tugas; dan
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">x.
                                        </div>
                                        <div>melaksanakan tugas lain yang diberikan oleh Atasan sesuai dengan peraturan
                                            perundang-undangan yang berlaku.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 4. KEPALA SUBBAGIAN UMUM DAN KEPEGAWAIAN -->
                        <div class="py-4">
                            <button @click="activeAccordion = activeAccordion === 4 ? null : 4"
                                class="w-full flex justify-between items-center text-left focus:outline-none group">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="text-sm font-semibold text-slate-400 dark:text-slate-500 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">04</span>
                                    <h3
                                        class="font-bold text-slate-900 dark:text-white text-base group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                                        Kepala Subbagian Umum dan Kepegawaian</h3>
                                </div>
                                <svg :class="activeAccordion === 4 ? 'rotate-180 text-emerald-600' : 'text-slate-400'"
                                    class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="activeAccordion === 4" x-collapse x-cloak class="mt-4 pl-8">
                                <h4
                                    class="text-[11px] font-bold text-emerald-600 dark:text-emerald-400 tracking-wider uppercase mb-3">
                                    Uraian Tugas:</h4>
                                <div class="space-y-3 text-sm text-slate-650 dark:text-slate-300 leading-relaxed">

                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">a.
                                        </div>
                                        <div>menyusun rencana dan program kegiatan Subbagian berdasarkan peraturan
                                            perundang-undangan dan hasil evaluasi kegiatan tahun sebelumnya sebagai pedoman
                                            pelaksanaan tugas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">b.
                                        </div>
                                        <div>menjabarkan perintah pimpinan melalui pengkajian permasalahan dan peraturan
                                            perundang-undangan agar pelaksanaan tugas berjalan efektif dan efisien;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">c.
                                        </div>
                                        <div>melakukan pengumpulan, pengolahan dan penelaahan data/informasi sebagai bahan
                                            perumusan kebijakan umum dan teknis operasional;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">d.
                                        </div>
                                        <div>melaksanakan koordinasi dan konsultasi dengan instansi terkait baik vertikal
                                            maupun horizontal untuk mendapatkan informasi, masukan, serta dalam rangka
                                            sinkronisasi dan harmonisasi pelaksanaan tugas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">e.
                                        </div>
                                        <div>menelaah dan mengkaji peraturan perundang-undangan sesuai lingkup tugasnya
                                            sebagai bahan atau pedoman untuk melaksanakan kegiatan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">f.
                                        </div>
                                        <div>menyiapkan bahan penyusunan petunjuk teknis, petunjuk pelaksanaan, dan naskah
                                            dinas sesuai lingkup tugasnya guna mendukung kelancaran pelaksanaan kegiatan;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">g.
                                        </div>
                                        <div>melaksanakan layanan kegiatan surat menyurat, perlengkapan, ketatalaksanaan,
                                            kehumasan, dokumentasi, perpustakaan, kearsipan, serta pengelolaan aset tetap
                                            dan aset tidak tetap;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">h.
                                        </div>
                                        <div>memfasilitasi penyusunan analisis jabatan, analisis beban kerja, evaluasi
                                            jabatan, budaya kerja, survei kepuasan masyarakat, standar pelayanan serta
                                            pengusulan formasi kebutuhan pegawai Dinas sesuai dengan peraturan
                                            perundang-undangan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">i.
                                        </div>
                                        <div>merencanakan, memproses dan melaporkan pengadaan barang dan jasa untuk
                                            keperluan Dinas serta mengusulkan penghapusan aset tetap, aset tidak tetap dan
                                            barang persediaan sesuai dengan peraturan perundang-undangan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">j.
                                        </div>
                                        <div>melaksanakan koordinasi dengan melaksanakan fungsi layanan pengadaan dan
                                            Layanan Pengadaan Secara Elektronik Daerah dalam rangka pengadaan barang dan
                                            jasa Dinas sesuai dengan peraturan perundang-undangan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">k.
                                        </div>
                                        <div>melaksanakan penatausahaan, inventarisasi, dan pelaporan aset semesteran dan
                                            tahunan untuk tertib administrasi serta melakukan pengawasan, pengendalian,
                                            pemeliharaan aset tetap dan aset tidak tetap agar dapat digunakan optimal;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">l.
                                        </div>
                                        <div>menyiapkan bahan dan menyusun laporan bidang kepegawaian secara rutin dan
                                            berkala serta memelihara file/dokumen kepegawaian seluruh pegawai Dinas guna
                                            terciptanya tertib administrasi kepegawaian;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">m.
                                        </div>
                                        <div>menyiapkan bahan dan memproses usulan kenaikan pangkat, mutasi, gaji berkala,
                                            pemberhentian/pensiun, pembuatan kartu suami/isteri, tabungan asuransi pensiun,
                                            pengiriman peserta pendidikan dan pelatihan/bimbingan teknis, dan urusan
                                            kepegawaian lainnya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">n.
                                        </div>
                                        <div>melaksanakan urusan rumah tangga serta menyiapkan sarana, akomodasi, dan
                                            protokoler dalam kegiatan rapat-rapat maupun penerimaan kunjungan tamu Dinas;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">o.
                                        </div>
                                        <div>mengoordinasikan kegiatan pengamanan kantor, kebersihan, dan pertamanan agar
                                            tercipta lingkungan kantor yang tertib, bersih, aman dan nyaman;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">p.
                                        </div>
                                        <div>menyiapkan bahan dan menyusun konsep SOP-AP dalam penyelenggaraan kegiatan di
                                            lingkup tugasnya, serta menghimpun dan mendokumentasi SOP-AP yang disusun oleh
                                            masing-masing subbagian, Bidang, dan UPT;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">q.
                                        </div>
                                        <div>menginventarisasi permasalahan yang berhubungan dengan urusan
                                            kesekretariatan/ketatausahaan serta menyajikan alternatif pemecahannya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">r.
                                        </div>
                                        <div>mendistribusikan tugas kepada bawahan agar pelaksanaan tugas berjalan sesuai
                                            dengan proporsi masing-masing;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">s.
                                        </div>
                                        <div>membentuk tim kerja, mengarahkan dan mengevaluasi kinerja tim;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">t.
                                        </div>
                                        <div>memberikan motivasi dan penilaian kepada bawahan guna meningkatkan prestasi,
                                            dedikasi dan loyalitas bawahan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">u.
                                        </div>
                                        <div>melaksanakan pengendalian, evaluasi dan menyusun laporan pelaksanaan tugas; dan
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">v.
                                        </div>
                                        <div>melaksanakan tugas lain yang diberikan oleh Atasan sesuai dengan peraturan
                                            perundang-undangan yang berlaku.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 5. KEPALA BIDANG PENATAAN LINGKUNGAN HIDUP -->
                        <div class="py-4">
                            <button @click="activeAccordion = activeAccordion === 5 ? null : 5"
                                class="w-full flex justify-between items-center text-left focus:outline-none group">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="text-sm font-semibold text-slate-400 dark:text-slate-500 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">05</span>
                                    <h3
                                        class="font-bold text-slate-900 dark:text-white text-base group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                                        Kepala Bidang Penataan Lingkungan Hidup</h3>
                                </div>
                                <svg :class="activeAccordion === 5 ? 'rotate-180 text-emerald-600' : 'text-slate-400'"
                                    class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="activeAccordion === 5" x-collapse x-cloak class="mt-4 pl-8">
                                <h4
                                    class="text-[11px] font-bold text-emerald-600 dark:text-emerald-400 tracking-wider uppercase mb-3">
                                    Uraian Tugas:</h4>
                                <div class="space-y-3 text-sm text-slate-650 dark:text-slate-300 leading-relaxed">

                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">a.
                                        </div>
                                        <div>menyiapkan bahan penyusunan rencana kerja;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">b.
                                        </div>
                                        <div>menyiapkan bahan perumusan kebijakan teknis bidang penataan lingkungan hidup;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">c.
                                        </div>
                                        <div>menyelenggarakan penyusunan dan penetapan rencana perlindungan dan pengelolaan
                                            lingkungan hidup daerah;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">d.
                                        </div>
                                        <div>menyelenggarakan pengendalian pelaksanaan rencana perlindungan dan pengelolaan
                                            lingkungan hidup daerah;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">e.
                                        </div>
                                        <div>menyelenggarakan proses persetujuan lingkungan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">f.
                                        </div>
                                        <div>menyelenggarakan pembuatan dan pelaksanaan kajian lingkungan hidup strategis
                                            rencana tata ruang;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">g.
                                        </div>
                                        <div>menyelenggarakan pembuatan dan pelaksanaan Kajian Lingkungan Hidup Strategis
                                            Rencana Pembangunan Jangka Panjang Daerah dan RPJMD daerah;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">h.
                                        </div>
                                        <div>menyelenggarakan pembuatan dan pelaksanaan Kajian Lingkungan Hidup Strategis
                                            untuk Kebijakan, Rencana dan Program yang berpotensi menimbulkan dampak/resiko
                                            lingkungan hidup;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">i.
                                        </div>
                                        <div>menyelenggarakan peningkatan kapasitas dan kompetensi sumber daya manusia
                                            bidang lingkungan hidup untuk lembaga kemasyarakatan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">j.
                                        </div>
                                        <div>menyelenggarakan pendampingan gerakan peduli lingkungan hidup;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">k.
                                        </div>
                                        <div>menyelenggarakan penyusunan dan penetapan rencana pengelolaan keanekaragaman
                                            hayati;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">l.
                                        </div>
                                        <div>menyelenggarakan pengelolaan taman Keanekaragaman Hayati di luar kawasan hutan
                                            dan taman Keanekaragaman Hayati lainnya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">m.
                                        </div>
                                        <div>menyelenggarakan pengelolaan Ruang Terbuka Hijau;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">n.
                                        </div>
                                        <div>menyelenggarakan pengelolaan sarana dan prasarana Keanekaragaman Hayati;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">o.
                                        </div>
                                        <div>menyelenggarakan koordinasi pengelolaan Taman Hutan Raya (kabupaten);</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">p.
                                        </div>
                                        <div>menyelenggarakan koordinasi, sinkronisasi, penyediaan data dan informasi
                                            kearifan lokal atau pengetahuan tradisional terkait perlindungan dan pengelolaan
                                            lingkungan hidup;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">q.
                                        </div>
                                        <div>menyelenggarakan pemberdayaan, kemitraan, pendampingan dan penguatan
                                            kelembagaan kearifan lokal atau pengetahuan tradisional terkait perlindungan dan
                                            pengelolaan lingkungan hidup;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">r.
                                        </div>
                                        <div>menyusun dan menerapkan SOP-AP dalam penyelenggaraan kegiatan di lingkup
                                            tugasnya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">s.
                                        </div>
                                        <div>menginventarisasi permasalahan yang berhubungan dengan urusan Bidang serta
                                            menyajikan alternatif pemecahannya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">t.
                                        </div>
                                        <div>mendistribusikan tugas kepada bawahan agar pelaksanaan tugas berjalan sesuai
                                            dengan proporsi masing-masing;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">u.
                                        </div>
                                        <div>membentuk tim kerja, mengarahkan dan mengevaluasi kinerja tim;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">v.
                                        </div>
                                        <div>memberikan motivasi dan penilaian kepada bawahan guna meningkatkan prestasi,
                                            dedikasi dan loyalitas bawahan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">w.
                                        </div>
                                        <div>melaksanakan pengendalian, evaluasi dan menyusun laporan pelaksanaan tugas; dan
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">x.
                                        </div>
                                        <div>melaksanakan tugas lain yang diberikan oleh Atasan sesuai dengan peraturan
                                            perundang-undangan yang berlaku.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 6. KEPALA BIDANG PENGENDALIAN DAN PENGAWASAN LINGKUNGAN HIDUP -->
                        <div class="py-4">
                            <button @click="activeAccordion = activeAccordion === 6 ? null : 6"
                                class="w-full flex justify-between items-center text-left focus:outline-none group">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="text-sm font-semibold text-slate-400 dark:text-slate-500 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">06</span>
                                    <h3
                                        class="font-bold text-slate-900 dark:text-white text-base group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                                        Kepala Bidang Pengendalian dan Pengawasan LH</h3>
                                </div>
                                <svg :class="activeAccordion === 6 ? 'rotate-180 text-emerald-600' : 'text-slate-400'"
                                    class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="activeAccordion === 6" x-collapse x-cloak class="mt-4 pl-8">
                                <h4
                                    class="text-[11px] font-bold text-emerald-600 dark:text-emerald-400 tracking-wider uppercase mb-3">
                                    Uraian Tugas:</h4>
                                <div class="space-y-3 text-sm text-slate-650 dark:text-slate-300 leading-relaxed">

                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">a.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan penyusunan rencana kerja Bidang berdasarkan
                                            Renstra, Renja, usulan yang ada dan skala prioritas untuk kejelasan rencana;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">b.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan penyusunan kebijakan umum dan teknis Bidang
                                            berdasarkan usulan yang ada dan skala prioritas untuk pedoman pelaksanaan tugas;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">c.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan pengumpulan, pengolahan dan penelaahan
                                            data/informasi sebagai bahan perumusan kebijakan umum dan teknis operasional
                                            pengendalian pencemaran dan/atau kerusakan lingkungan, pengawasan dan pengaduan
                                            lingkungan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">d.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan penyusunan kebijakan pengendalian pencemaran
                                            dan/atau kerusakan lingkungan, pengawasan dan penanganan pengaduan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">e.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan kebijakan teknis pencegahan, penanggulangan
                                            dan pemulihan pencemaran dan/atau kerusakan lingkungan, Pengawasan dan
                                            Penanganan Pengaduan Lingkungan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">f.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan pemantauan kualitas air, kualitas udara,
                                            kualitas tanah, sumber pencemar institusi dan non institusi dan pemantauan
                                            kerusakan lingkungan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">g.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan inventarisasi permasalahan yang berhubungan
                                            dengan pencegahan, penanggulangan dan pemulihan pencemaran dan/atau kerusakan
                                            lingkungan, serta menyajikan alternatif pemecahannya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">h.
                                        </div>
                                        <div>mengoordinasikan, melaksanakan, dan sinkronisasi upaya pencegahan pencemaran
                                            lingkungan terhadap media tanah, air, dan udara;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">i.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan program kali bersih dan upaya peningkatan
                                            Indeks Kualitas Air dan Indeks Kualitas Udara;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">j.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan proses penerbitan persetujuan teknis
                                            pemenuhan baku mutu air limbah kegiatan pembuangan dan pemanfaatan air limbah
                                            serta persetujuan teknis pemenuhan baku mutu emisi kegiatan pembuangan emisi;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">k.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan pengendalian pencemaran udara melalui tahapan
                                            penetapan kebijakan pengendalian pencemaran udara, penetapan program kerja,
                                            penyusunan rencana kerja, pelaksanaan rencana kerja dan evaluasi hasil
                                            pelaksanaan rencana kerja;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">l.
                                        </div>
                                        <div>mengoordinasikan dan sinkronisasi serta pelaksanaan pengendalian emisi gas
                                            rumah kaca, mitigasi dan adaptasi terhadap Perubahan Iklim;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">m.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan pengembangan sistem pemberian informasi
                                            peringatan pencemaran dan/atau kerusakan lingkungan, sistem informasi Pengawasan
                                            dan Penanganan Pengaduan Lingkungan kepada masyarakat;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">n.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan isolasi dan Penghentian Pencemaran dan/atau
                                            Kerusakan Lingkungan dalam rangka penanggulangan meluasnya area pencemaran
                                            dan/atau kerusakan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">o.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan sinkronisasi upaya Penghentian Sumber
                                            Pencemaran dan Pembersihan Unsur Pencemar;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">p.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan sinkronisasi dan melaksanakan Remediasi,
                                            rehabilitasi dan restorasi;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">q.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan ketentuan baku mutu lingkungan hidup dan
                                            kriteria baku kerusakan lingkungan hidup;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">r.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan penyiapan bahan penyusunan kebijakan
                                            pembinaan kepada masyarakat;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">s.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan pembinaan, fasilitasi dan tindaklanjut
                                            rekomendasi hasil evaluasi terhadap sumber pencemar institusi dan non institusi;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">t.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan pembinaan dan fasilitasi kepada pelaku usaha
                                            dalam rangka Pemenuhan Ketentuan dan Kewajiban yang tercantum dalam Izin
                                            Lingkungan, izin perlindungan dan pengelolaan lingkungan hidup dan peraturan
                                            perundang-undangan dibidang lingkungan hidup;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">u.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan pengawasan terhadap ketaatan pelaku usaha
                                            dan/atau kegiatan yang Izin Lingkungan dan Izin Perlindungan Dan Pengelolaan
                                            Lingkungan Hidupnya diterbitkan oleh Pemerintah Daerah;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">v.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan perumusan rekomendasi penerapan sanksi
                                            berdasarkan temuan pelanggaran pelaku usaha dan/kegiatan pada saat pelaksanaan
                                            pengawasan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">w.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan pengawasan terhadap tindak lanjut sanksi
                                            administrasi;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">x.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan pengelolaan pengaduan masyarakat atas dugaan
                                            terjadinya pencemaran dan/atau perusakan lingkungan yang dilakukan pelaku usaha
                                            dan/atau kegiatan, dari tahap penerimaan pengaduan, penelaahan, verifikasi
                                            lapangan dan perumusan hasil verifikasi;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">y.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan penyusunan rekomendasi tindaklanjut pengaduan
                                            masyarakat berdasarkan hasil verifikasi pengaduan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">z.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan pelaksanaan koordinasi dan sinkronisasi
                                            penerapan sanksi administrasi, penyidikan tindak pidana lingkungan hidup,
                                            dan/atau penyelesaian sengketa lingkungan di luar pengadilan atau melalui
                                            pengadilan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">aa.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan penilaian kinerja dan fasilitasi penghargaan
                                            kepada masyarakat/lembaga masyarakat/dunia usaha/dunia pendidikan/ filantropi
                                            dalam peran sertanya melakukan upaya perlindungan dan pengelolaan lingkungan
                                            hidup;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">bb.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan pengelolaan pengaduan masyarakat atas dugaan
                                            terjadinya pencemaran dan/atau perusakan lingkungan karena pengelolaan sampah;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">cc.
                                        </div>
                                        <div>melaksanakan penindakan hukum atas terjadinya pencemaran dan/atau perusakan
                                            lingkungan karena pengelolaan sampah;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">dd.
                                        </div>
                                        <div>mengoordinasikan pelaksanaan kerja sama dengan instansi terkait dalam rangka
                                            mendukung pelaksanaan tugas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">ee.
                                        </div>
                                        <div>menyusun dan menerapkan SOP-AP dalam penyelenggaraan kegiatan di lingkup
                                            tugasnya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">ff.
                                        </div>
                                        <div>menginventarisasi permasalahan yang berhubungan dengan urusan bidang serta
                                            menyajikan alternatif pemecahannya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">gg.
                                        </div>
                                        <div>mendistribusikan tugas kepada bawahan agar pelaksanaan tugas berjalan sesuai
                                            dengan proporsi masing-masing;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">hh.
                                        </div>
                                        <div>membentuk tim kerja, mengarahkan dan mengevaluasi kinerja tim;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">ii.
                                        </div>
                                        <div>memberikan motivasi dan penilaian kepada bawahan guna meningkatkan prestasi,
                                            dedikasi dan loyalitas bawahan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">jj.
                                        </div>
                                        <div>melaksanakan pengendalian, evaluasi dan menyusun laporan pelaksanaan tugas; dan
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">kk.
                                        </div>
                                        <div>melaksanakan tugas lain yang diberikan oleh Atasan sesuai dengan peraturan
                                            perundang-undangan yang berlaku.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 7. KEPALA BIDANG PENGELOLAAN SAMPAH DAN LIMBAH BAHAN BERBAHAYA DAN BERACUN -->
                        <div class="py-4">
                            <button @click="activeAccordion = activeAccordion === 7 ? null : 7"
                                class="w-full flex justify-between items-center text-left focus:outline-none group">
                                <div class="flex items-center gap-4">
                                    <span
                                        class="text-sm font-semibold text-slate-400 dark:text-slate-500 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">07</span>
                                    <h3
                                        class="font-bold text-slate-900 dark:text-white text-base group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                                        Kepala Bidang Pengelolaan Sampah dan Limbah B3</h3>
                                </div>
                                <svg :class="activeAccordion === 7 ? 'rotate-180 text-emerald-600' : 'text-slate-400'"
                                    class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="activeAccordion === 7" x-collapse x-cloak class="mt-4 pl-8">
                                <h4
                                    class="text-[11px] font-bold text-emerald-600 dark:text-emerald-400 tracking-wider uppercase mb-3">
                                    Uraian Tugas:</h4>
                                <div class="space-y-3 text-sm text-slate-650 dark:text-slate-300 leading-relaxed">

                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">a.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan penyusunan rencana kerja Bidang berdasarkan
                                            Renstra, Renja, usulan yang ada dan skala prioritas untuk kejelasan rencana;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">b.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan penyusunan kebijakan umum dan teknis Bidang
                                            berdasarkan usulan yang ada dan skala prioritas untuk pedoman pelaksanaan tugas;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">c.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan pengumpulan, pengolahan dan penelaahan
                                            data/informasi sebagai bahan perumusan kebijakan umum dan teknis operasional;
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">d.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan penyiapan bahan pembinaan dan pengawasan
                                            pelaksanaan pengelolaan sampah dan limbah bahan berbahaya beracun;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">e.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan perumusan informasi pengelolaan sampah dan
                                            limbah bahan berbahaya beracun;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">f.
                                        </div>
                                        <div>mengoordinasikan penyelenggaraan penyusunan informasi pengelolaan sampah
                                            tingkat kabupaten;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">g.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan perumusan kebijakan manajemen pengelolaan
                                            sampah;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">h.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan penyelenggaraan dan penyeliaan pemungutan
                                            retribusi atas jasa layanan pengelolaan sampah;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">i.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan penyusunan sistem tanggap darurat pengelolaan
                                            sampah;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">j.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan penyusunan kebijakan pemberian kompensasi
                                            dampak negatif kegiatan pemrosesan akhir sampah;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">k.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan penyelenggaraan proses dan pemberian
                                            rekomendasi perizinan persampahan dan tempat penyimpanan sementara limbah Bahan
                                            Berbahaya Beracun;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">l.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan penyelenggaraan pembinaan, pengawasan,
                                            monitoring dan evaluasi kinerja pengelolaan sampah dan limbah Bahan Berbahaya
                                            Beracun;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">m.
                                        </div>
                                        <div>mengoordinasikan dan melaksanakan kerja sama dengan instansi terkait dalam
                                            rangka mendukung pelaksanaan tugas;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">n.
                                        </div>
                                        <div>menyusun dan menerapkan SOP-AP dalam penyelenggaraan kegiatan di lingkup
                                            tugasnya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">o.
                                        </div>
                                        <div>menginventarisasi permasalahan yang berhubungan dengan urusan bidang serta
                                            menyajikan alternatif pemecahannya;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">p.
                                        </div>
                                        <div>mendistribusikan tugas kepada bawahan agar pelaksanaan tugas berjalan sesuai
                                            dengan proporsi masing-masing;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">q.
                                        </div>
                                        <div>membentuk tim kerja, mengarahkan dan mengevaluasi kinerja tim;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">r.
                                        </div>
                                        <div>memberikan motivasi dan penilaian kepada bawahan guna meningkatkan prestasi,
                                            dedikasi dan loyalitas bawahan;</div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">s.
                                        </div>
                                        <div>melaksanakan pengendalian, evaluasi dan menyusun laporan pelaksanaan tugas; dan
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="w-5 shrink-0 font-semibold text-emerald-650 dark:text-emerald-450">t.
                                        </div>
                                        <div>melaksanakan tugas lain yang diberikan oleh Atasan sesuai dengan peraturan
                                            perundang-undangan yang berlaku.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection