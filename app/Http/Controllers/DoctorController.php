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
use Illuminate\Pagination\LengthAwarePaginator;


class DoctorController extends Controller
{
    public function UserPage()
    {
        return view('dashboardUser');
    }

public function index()
{
    $polidokter = DataPoli::where('id_dokter', auth()->user()->id)->get();

    $jenisPoli = [];

    foreach ($polidokter as $p) {
        $jenisPoli[] = $p->id_poli;
    }

    $jenisPoli = array_unique($jenisPoli);

    $pengajuan = [];

    foreach ($jenisPoli as $value) {
        $dataPengajuan = PengajuanCheckUp::where('status', 'pending')
            ->where('idpoli', $value)
            ->get(); // Ambil data tanpa paginate()

        // Lakukan pengolahan manual di sini

        // Misalnya, urutkan data berdasarkan updated_at
        $dataPengajuan = collect($dataPengajuan)->sortByDesc('updated_at')->values();

        // Buat objek paginator secara manual
        $perPage = 15;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $items = $dataPengajuan->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $total = count($dataPengajuan);
        $paginator = new LengthAwarePaginator($items, $total, $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        $pengajuan[] = $paginator;
    }

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
            if ($text == request('qr_code_result')) {
                alert()->warning('Data tidak ditemukan', 'silahkan coba lagi');

                // alert()->success('Data ditemukan','pasien ditemukan');
                return view('DoctorUI.resultPage', compact('value'));
                # code...
            } else {
                alert()->warning('Data tidak ditemukan', 'silahkan coba lagi');
                return view('DoctorUI.ScanQrPage');

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
        $QR = PengajuanCheckUp::where('qrcode', $request->qr_code_result)->first();

        $QR = $QR->qrcode;
        return view('DoctorUI.QRPage', compact('QR'));
    }
}


