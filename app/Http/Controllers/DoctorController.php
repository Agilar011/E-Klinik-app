<?php

namespace App\Http\Controllers;

use App\Models\DataPoli;
use App\Models\Divisi;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PengajuanCheckUp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use NunoMaduro\Collision\Adapters\Phpunit\Style;
use Zxing\QrReader;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Carbon\Carbon;
use PDF;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;



class DoctorController extends Controller
{
    public function UserPage()
    {
        return view('dashboardUser');
    }

    // public function index()
    // {
    //     $polidokter = DataPoli::where('id_dokter', auth()->user()->id)->get();

    //     $jenisPoli = [];

    //     foreach ($polidokter as $p) {
    //         $jenisPoli[] = $p->id_poli;
    //     }

    //     $jenisPoli = array_unique($jenisPoli);

    //     $pengajuan = [];

    //     foreach ($jenisPoli as $value) {
    //         $dataPengajuan = PengajuanCheckUp::where('status', 'pending')
    //             ->where('idpoli', $value)
    //             ->join('users', 'pengajuan_check_ups.nip', '=', 'users.nip')
    //             ->join('polis', 'pengajuan_check_ups.idpoli', '=','polis.id')
    //             ->select('pengajuan_check_ups.*', 'users.name as nip_name','users.divisi as nip_divisi', 'polis.name as idpoli_name')
    //             ->get(); // Ambil data tanpa paginate()

    //         // Lakukan pengolahan manual di sini

    //         // Misalnya, urutkan data berdasarkan updated_at
    //         $dataPengajuan = collect($dataPengajuan)->sortByDesc('updated_at')->values();

    //         // Buat objek paginator secara manual
    //         $perPage = 5;
    //         $currentPage = LengthAwarePaginator::resolveCurrentPage();
    //         $currentItems = $dataPengajuan->slice(($currentPage - 1) * $perPage, $perPage)->all();
    //         $total = count($dataPengajuan);
    //         $paginator = new LengthAwarePaginator($currentItems, $total, $perPage, $currentPage, [
    //             'path' => LengthAwarePaginator::resolveCurrentPath(),
    //         ]);

    //         $pengajuan[] = $paginator;
    //         // dd($pengajuan);
    //     }

    //     return view('DoctorUI.index', compact('pengajuan'));
    // }


    public function index()
    {
        $polidokter = DataPoli::where('id_dokter', auth()->user()->id)->get();

        $jenisPoli = [];

        foreach ($polidokter as $p) {
            $jenisPoli[] = $p->id_poli;
        }

        $jenisPoli = array_unique($jenisPoli);

        $pengajuan = collect(); // Inisialisasi kumpulan koleksi kosong

        foreach ($jenisPoli as $key => $value) {
            $dataPengajuan = PengajuanCheckUp::where('status', 'pending')
                ->where('idpoli', $value)
                ->join('users', 'pengajuan_check_ups.nip', '=', 'users.nip')
                ->join('polis', 'pengajuan_check_ups.idpoli', '=', 'polis.id')
                ->select('pengajuan_check_ups.*', 'users.name as nip_name', 'users.divisi as nip_divisi', 'polis.name as idpoli_name')
                ->get(); // Ambil data dengan paginasi

            $pengajuan = $pengajuan->merge($dataPengajuan); // Gabungkan item dataPengajuan ke dalam koleksi pengajuan

        }
        $pengajuan = $pengajuan->sortByDesc('updated_at');

        // $pengajuan = new Paginator($pengajuan, 5); // Konversi pengajuan menjadi objek paginator
        // $pengajuan->withPath('/antrianpengajuan'); // Contoh path khusus, sesuaikan dengan rute Anda


        return view('DoctorUI.index', compact('pengajuan'));
    }



    public function RejectionPage(PengajuanCheckUp $pengajuan)
    {
        return view('DoctorUI.Rejection', compact('pengajuan'));
    }
    public function AcceptionPage(PengajuanCheckUp $pengajuan)
    {

        return view('DoctorUI.AcceptionPage', compact('pengajuan'));
    }
    public function TolakPengajuan(PengajuanCheckUp $pengajuan, Request $request)
    {
        $pengajuan->update([
            'catatan_dokter' => request('catatan_dokter'),
            'status' => 'rejected'
        ]);
        alert()->warning('Penolakan Pengajuan', 'Pengajuan oleh user dengan nip ' . $pengajuan->nip . ' telah ditolak');

        return redirect()->route('Doctor.index')->with('success', 'Pengajuan Telah Disetujui.');
    }
    public function SetujuiPengajuan($id, Request $request)
    {
        $pengajuan = PengajuanCheckUp::where('id', $id)->first();

        $pengajuan->status = 'approved';
        $pengajuan->nipdokter = Auth::user()->nip;
        $pengajuan->tglpemeriksaan = $request->tglpemeriksaan;

        $text = $pengajuan->id . ' ' . $pengajuan->nip . ' ' . $pengajuan->tglpemeriksaan;

        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new ImagickImageBackEnd()
        );

        // Mengubah rute penyimpanan QR menjadi public/images/
        $ruteSimpan = public_path('qrcodes/') . $text . '.png';

        $writer = new Writer($renderer);
        $writer->writeFile($text, $ruteSimpan);
        $pengajuan->qrcode = $text . '.png';

        // Simpan perubahan ke dalam database
        $pengajuan->save();
        alert()->success('Pengajuan Diterima', 'Pengajuan oleh user dengan nip ' . $pengajuan->nip . ' telah disetujui');


        return redirect()->route('Doctor.index')->with('success', 'Pengajuan Telah Disetujui.');
    }

    public function ScanQrPage()
    {
        return view('DoctorUI.ScanQrPage');
    }

    public function ScanQr(Request $request)
    {
        $request->validate([
            'foto' => 'required|image', // Pastikan file adalah gambar
        ]);

        // Simpan foto ke penyimpanan yang diinginkan (misalnya: storage/app/public/qrcodes)
        $fotoPath = $request->file('foto')->store('qrcodes', 'public');
        dd($fotoPath);

        // Anda dapat melakukan operasi tambahan di sini, misalnya menyimpan path foto ke database

        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('ambil-foto')->with('success', 'Foto berhasil disimpan.');
        // // $request->validate([
        // //     'foto' => 'required|image', // Pastikan file adalah gambar
        // // ]);

        // $foto = $request->file('foto');
        // dd($foto);


        // // Simpan foto ke penyimpanan yang diinginkan (misalnya: storage/app/public/qrcodes)
        // $fotoPath = $foto->store('qrcodes', 'public');

        // // Path lengkap dari foto yang disimpan
        // $fullFotoPath = storage_path('app/public/' . $fotoPath);

        // try {
        //     // Ambil file gambar dari permintaan
        //     $foto = $request->file('foto');

        //     // Simpan foto ke penyimpanan yang diinginkan (misalnya: storage/app/public/qrcodes)
        //     $fotoPath = $foto->store('qrcodes', 'public');

        //     // Path lengkap dari foto yang disimpan
        //     $fullFotoPath = storage_path('app/public/' . $fotoPath);

        //     // Sekarang Anda dapat menggunakan $fullFotoPath untuk membaca QR code atau melakukan operasi lain
        //     // Misalnya:
        //     // $qrcode = new QrReader($fullFotoPath);
        //     // $text = $qrcode->text();

        //     // Proses selanjutnya (misalnya: mencari pengajuan check-up) ...
        // } catch (\Exception $e) {
        //     // Tangani jika terjadi kesalahan saat menyimpan foto
        //     dd('Gagal menyimpan foto: ' . $e->getMessage());
        // }

        // $qrcode = new QrReader($fullFotoPath);
        // $text = $qrcode->text(); //return decoded text from QR Code
        // dd($text);

        // $pengajuan = PengajuanCheckUp::where('id', $text)->first();

        // if ($pengajuan == null) {
        //     dd($pengajuan->nipdokter);
        //     # code...
        // } else {
        //     dd('kode tidak ditemukan');
        //     # code...
        // }

    }

    public function ScanQrResult(Request $request)
    {
        $dataHariIni = PengajuanCheckUp::where('tglpemeriksaan', date('Y-m-d'))->get();
        foreach ($dataHariIni as $key => $value) {
            $text = $value->id . ' ' . $value->nip . ' ' . $value->tglpemeriksaan;
            $pasien = User::where('nip', $value->nip)->first();
            // dd($pasien->divisi);
            $value->pasien = $pasien->name;
            $value->divisi = $pasien->divisi;
            // dd($text);
            if ($text == request('qr_code_result')) {
                // alert()->warning('Data tidak ditemukan', 'silahkan coba lagi');
                $pengajuan = PengajuanCheckUp::where('nip', $value->nip)->first();
                $pengajuan->status = 'on process';
                $pengajuan->save();

                alert()->success('Data ditemukan', 'pasien ditemukan');
                return view('DoctorUI.resultPage', compact('value'));
                # code...
            } else {
                // alert()->warning('Data tidak ditemukan', 'silahkan coba lagi');
                // return view('DoctorUI.ScanQrPage');

                # code...
            }

            # code...
        }
        return redirect()->route('scanQrPage')->with('success', 'Pengajuan Telah Disetujui.');
    }
    public function QrPage(Request $request)
    // dd($request);
    {
        // dd($request->qr_code_result);

        $QR = PengajuanCheckUp::where('qrcode', $request->qr_code_result)
            ->join('users', 'pengajuan_check_ups.nip', '=', 'users.nip')
            ->join('polis', 'pengajuan_check_ups.idpoli', '=', 'polis.id')
            ->join('users as dokter', 'pengajuan_check_ups.nipdokter', '=', 'dokter.nip') // Use 'as' to alias the joined table
            ->select('pengajuan_check_ups.*', 'users.name as nip_name', 'users.divisi as nip_divisi', 'users.tanggal_lahir as nip_tgl_lahir', 'polis.name as idpoli_name', 'dokter.name as dokter_name')
            ->first(); // Ambil data dengan paginasi

        // $QR = $QR->qrcode;
        return view('DoctorUI.QRPage', compact('QR'));
    }

    public function daftarPemeriksaan()
    {

        $polidokter = DataPoli::where('id_dokter', auth()->user()->id)->get();

        $jenisPoli = [];

        foreach ($polidokter as $p) {
            $jenisPoli[] = $p->id_poli;
        }

        $jenisPoli = array_unique($jenisPoli);

        $pengajuan = collect(); // Inisialisasi kumpulan koleksi kosong

        foreach ($jenisPoli as $key => $value) {
            $dataPengajuan = PengajuanCheckUp::where('status', 'on process')
                ->where('idpoli', $value)
                ->join('users', 'pengajuan_check_ups.nip', '=', 'users.nip')
                ->join('polis', 'pengajuan_check_ups.idpoli', '=', 'polis.id')
                ->select('pengajuan_check_ups.*', 'users.name as nip_name', 'users.divisi as nip_divisi', 'polis.name as idpoli_name')
                ->get(); // Ambil data dengan paginasi

            $pengajuan = $pengajuan->merge($dataPengajuan); // Gabungkan item dataPengajuan ke dalam koleksi pengajuan

        }
        $pengajuan = $pengajuan->sortByDesc('updated_at');

        // $pengajuan = new Paginator($pengajuan, 5); // Konversi pengajuan menjadi objek paginator
        // $pengajuan->withPath('/antrianpengajuan'); // Contoh path khusus, sesuaikan dengan rute Anda

        return view('DoctorUI.daftarPemeriksaanPage', compact('pengajuan'));
    }

    public function pemeriksaanPage(PengajuanCheckUp $pengajuan)
    {
        // $pengajuan = PengajuanCheckUp::where('id', $id)
        //     ->join('users', 'pengajuan_check_ups.nip', '=', 'users.nip')
        //     ->join('polis', 'pengajuan_check_ups.idpoli', '=', 'polis.id')
        //     ->select('pengajuan_check_ups.*', 'users.name as nip_name', 'users.divisi as nip_divisi', 'polis.name as idpoli_name')
        //     ->first();

        return view('DoctorUI.pemeriksaanPage', compact('pengajuan'));
    }

    public function suratizin(PengajuanCheckUp $pengajuan, Request $request)
    {
        // dd(request('suratizin'));
        if (request('suratizin') == 'tanpasuratizin') {
            return redirect()->route('tanpasuratizin', $pengajuan)->with('success', 'Pemeriksaan Selesai.');

            # code...
        } else {
            // dd(request());
            $datapoli = Poli::where('id', $pengajuan->idpoli)->first();
            $datauser = User::where('nip', $pengajuan->nip)->first();
            $idpengajuan = $pengajuan->id;

            // dd($datauser->tanggal_lahir);

            $tanggal_lahir = Carbon::createFromFormat('Y-m-d', $datauser->tanggal_lahir);

            // Hitung umur berdasarkan tanggal lahir
            $umur = $tanggal_lahir->age;

            return view('DoctorUI.formSuratSakit', compact('pengajuan', 'request', 'datapoli', 'datauser', 'umur'));
            // redirect()->route('dengansuratizin', $pengajuan)->with('success', 'Pemeriksaan telah selesai.');
            # code...
        }


    }

    public function tanpasuratizin(PengajuanCheckUp $pengajuan)
    {
        $pengajuan->status = 'done';
        $pengajuan->save();

        alert()->success('Pemeriksaan Selesai', 'User dapat langsung bekerja kembali');
        return redirect()->route('dashboard')->with('success', 'Pemeriksaan Selesai.');
    }
    public function dengansuratizin(PengajuanCheckUp $pengajuan)
    {
        $pengajuan->status = 'done';
        $pengajuan->save();

        // alert()->success('Pemeriksaan Selesai','User dapat langsung bekerja kembali');
        return redirect()->route('dashboard')->with('success', 'Pemeriksaan Selesai.');
    }

    public function formSuratIzin(PengajuanCheckUp $pengajuan, Request $request)
    {
        $datapoli = Poli::where('id', $pengajuan->idpoli)->first();
        $datauser = User::where('nip', $pengajuan->nip)->first();
        $idpengajuan = $pengajuan->id;

        // dd($datauser->tanggal_lahir);

        $tanggal_lahir = Carbon::createFromFormat('Y-m-d', $datauser->tanggal_lahir);

        // Hitung umur berdasarkan tanggal lahir
        $umur = $tanggal_lahir->age;

        // Hitung Durasi Izin
        $tglmulai = Carbon::createFromFormat('Y-m-d', $request->tglpemeriksaan);

        $tglakhir = $tglmulai->add($request->jumlahHariIzin, 'days');

        $tglmulai = date_format($tglmulai, 'Y-m-d');
        $tglakhir = date_format($tglakhir, 'Y-m-d');

        return view('DoctorUI.suratIzin', compact('pengajuan', 'datapoli', 'datauser', 'umur', 'request', 'tglmulai', 'tglakhir'));
    }

    public function generatePDF(Request $request)
    {
        // Mendapatkan konten dari request
        $content = json_decode($request->content, true);

        // Generate PDF dengan menggunakan library DOMPDF
        $pdf = PDF::loadView('pdf.template', $content);

        // Simpan atau kirim PDF sesuai kebutuhan Anda
        $pdf->save(public_path('Surat Izin/lembar_izin.pdf'));

                alert()->success('Pembuatan Surat Selesai','Surat Izin telah Dibuat');
        return redirect()->route('dashboard');

    }

}
