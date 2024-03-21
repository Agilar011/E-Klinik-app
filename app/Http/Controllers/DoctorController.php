<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PengajuanCheckUp;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrChttps://github.com/Agilar011/E-Klinik-app/pull/11/conflict?name=app%252FHttp%252FControllers%252FDoctorController.php&ancestor_oid=dc03015da6fe4602d4d29be86ef509623f452e1e&base_oid=f4080291880d6878b090b8f54be9897c29d372ff&head_oid=cdc57fa38c3164a5cbbe0065f6bda7cff436f606ode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Zxing\QrReader;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;


class DoctorController extends Controller
{
    public function UserPage()
    {
        return view('dashboardUser');
    }
    public function index()
    {
        $Pengajuan = PengajuanCheckUp::where('status', 'pending')->get();

        return view('DoctorUI.index', compact('Pengajuan'));
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
        return redirect()->route('Doctor.index')->with('success', 'Pengajuan Telah Disetujui.');
    }
    public function SetujuiPengajuan($id, Request $request)
    {
        $pengajuan = PengajuanCheckUp::where('id', $id)->first();

        $text = $pengajuan->id.' '.$pengajuan->nip.' '.$pengajuan->tglpemeriksaan;

        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new ImagickImageBackEnd()
        );
        $writer = new Writer($renderer);
        $writer->writeFile($text, $text.'.png');

        // $id_string = $pengajuan->id;

        // // Simpan path ke dalam kolom 'qrcode'
        // $pengajuan->qrcode = 'qrcodes/' . $id_string . '.png';

        // Set atribut-atribut lainnya
        $pengajuan->status = 'approved';
        $pengajuan->nipdokter = Auth::user()->nip;
        $pengajuan->tglpemeriksaan = $request->tglpemeriksaan;

        // Simpan perubahan ke dalam database
        $pengajuan->save();

        return redirect()->route('dashboard')->with('success', 'Pengajuan Telah Disetujui.');
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
                alert()->success('Data ditemukan','pasien ditemukan');
                return view('DoctorUI.resultPage', compact('value'));
                # code...
            } else {
                # code...
            }

            # code...
        }
        return redirect()->route('scanQrPage')->with('success', 'Pengajuan Telah Disetujui.');
    }
}
