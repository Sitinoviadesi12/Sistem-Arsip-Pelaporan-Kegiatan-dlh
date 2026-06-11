<?php

namespace App\Http\Controllers;

use App\Models\DokumentasiKegiatan;
use App\Models\KategoriKegiatan;
use App\Models\Kegiatan;
use App\Models\LokasiKegiatan;
use App\Mail\KontakPesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home(): View
    {
        $kegiatanTerbaru = Kegiatan::published()
            ->with(['kategori', 'lokasi', 'bidang'])
            ->latest('published_at')
            ->take(6)
            ->get();

        $dokumentasiTerbaru = DokumentasiKegiatan::whereHas('kegiatan', function ($q) {
                $q->published();
            })
            ->latest()
            ->take(8)
            ->get();

        $stats = [
            'kegiatan' => Kegiatan::published()->count(),
            'kategori' => KategoriKegiatan::where('is_active', true)->count(),
            'bidang' => \App\Models\Bidang::count(),
            'lokasi' => LokasiKegiatan::where('is_active', true)->count(),
            'dokumentasi' => DokumentasiKegiatan::whereHas('kegiatan', fn($q) => $q->published())->count(),
        ];

        return view('public.home', compact('kegiatanTerbaru', 'dokumentasiTerbaru', 'stats'));
    }

    public function kegiatan(Request $request): View
    {
        $kategori = KategoriKegiatan::where('is_active', true)->orderBy('nama')->get();
        $lokasiList = LokasiKegiatan::where('is_active', true)->orderBy('nama')->get();
        $bidangList = \App\Models\Bidang::orderBy('nama')->get();

        $kegiatan = Kegiatan::published()
            ->with(['kategori', 'lokasi', 'bidang'])
            ->when($request->keyword, function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('judul', 'like', "%{$keyword}%")
                       ->orWhere('deskripsi', 'like', "%{$keyword}%");
                });
            })
            ->when($request->kategori, function ($query, $kategoriSlug) {
                $query->whereHas('kategori', function ($q) use ($kategoriSlug) {
                    $q->where('slug', $kategoriSlug);
                });
            })
            ->when($request->lokasi, function ($query, $lokasiSlug) {
                $query->whereHas('lokasi', function ($q) use ($lokasiSlug) {
                    $q->where('slug', $lokasiSlug);
                });
            })
            ->when($request->bidang, function ($query, $bidangSlug) {
                $query->whereHas('bidang', function ($q) use ($bidangSlug) {
                    $q->where('slug', $bidangSlug);
                });
            })
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();

        return view('public.kegiatan.index', compact('kegiatan', 'kategori', 'lokasiList', 'bidangList'));
    }

    public function kegiatanDetail($slug): View
    {
        $kegiatan = Kegiatan::published()
            ->with(['kategori', 'lokasi', 'bidang', 'dokumentasi', 'user'])
            ->where('slug', $slug)
            ->firstOrFail();

        $kegiatanTerkait = Kegiatan::published()
            ->with(['kategori', 'lokasi', 'bidang'])
            ->where('id', '!=', $kegiatan->id)
            ->where('kategori_kegiatan_id', $kegiatan->kategori_kegiatan_id)
            ->latest('published_at')
            ->take(3)
            ->get();

        // Fallback to recent if not enough related
        if ($kegiatanTerkait->count() < 3) {
            $recent = Kegiatan::published()
                ->with(['kategori', 'lokasi', 'bidang'])
                ->where('id', '!=', $kegiatan->id)
                ->latest('published_at')
                ->take(3 - $kegiatanTerkait->count())
                ->get();
            $kegiatanTerkait = $kegiatanTerkait->concat($recent);
        }

        return view('public.kegiatan.show', compact('kegiatan', 'kegiatanTerkait'));
    }

    public function dokumentasi(): View
    {
        $dokumentasi = DokumentasiKegiatan::whereHas('kegiatan', function ($q) {
                $q->published();
            })
            ->with('kegiatan')
            ->latest()
            ->paginate(24);

        return view('public.dokumentasi', compact('dokumentasi'));
    }

    public function tentang(): View
    {
        return view('public.tentang');
    }

    public function kategoriBidang(): View
    {
        $kategori = KategoriKegiatan::where('is_active', true)->orderBy('nama')->get();
        $bidang = \App\Models\Bidang::orderBy('nama')->get();
        return view('public.kategori-bidang', compact('kategori', 'bidang'));
    }

    public function titikLokasi(): View
    {
        $lokasi = LokasiKegiatan::where('is_active', true)->orderBy('nama')->get();
        return view('public.titik-lokasi', compact('lokasi'));
    }

    public function kontak(): View
    {
        return view('public.kontak');
    }

    public function kirimPesan(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string|max:5000',
            'g-recaptcha-response' => 'required',
        ], [
            'g-recaptcha-response.required' => 'Silakan centang kotak reCAPTCHA untuk memverifikasi bahwa Anda bukan robot.'
        ]);

        $secret = env('RECAPTCHA_SECRET_KEY', '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');
        $response = \Illuminate\Support\Facades\Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secret,
            'response' => $validated['g-recaptcha-response'],
            'remoteip' => request()->ip(),
        ]);

        if (! $response->json('success')) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['g-recaptcha-response' => 'Validasi reCAPTCHA gagal. Silakan coba lagi.']);
        }

        try {
            $mailTo = config('mail.contact_to', env('CONTACT_MAIL_TO', 'sitinoviadesi666@gmail.com'));

            Mail::to($mailTo)->send(new KontakPesan(
                $validated['nama'],
                $validated['email'],
                $validated['subjek'],
                $validated['pesan']
            ));

            return redirect()->back()->with('success', 'Pesan Anda berhasil terkirim! Terima kasih telah menghubungi kami.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Maaf, terjadi kendala saat mengirim pesan. Silakan coba lagi nanti atau hubungi kami melalui telepon.');
        }
    }

    public function kebijakanPrivasi(): View
    {
        return view('public.kebijakan-privasi');
    }

    public function syaratKetentuan(): View
    {
        return view('public.syarat-ketentuan');
    }
}
