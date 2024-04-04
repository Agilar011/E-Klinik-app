<?php

namespace App\Http\Controllers;

use App\Models\DataPoli;
use App\Models\RekapMedis;
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
use Barryvdh\DomPDF\Facade\Pdf;
use TCPDF;


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
        $pengajuan->status_qrcode = 'aktif';

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

        // Anda dapat melakukan operasi tambahan di sini, misalnya menyimpan path foto ke database

        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('ambil-foto')->with('success', 'Foto berhasil disimpan.');


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
            if ($text == request('qr_code_result') && $value->status_qrcode == 'aktif') {
                $pengajuan = PengajuanCheckUp::where('id', $value->id)->first();
                $pengajuan->status = 'on process';
                $pengajuan->status_qrcode = 'expired';
                $pengajuan->save();
                // dd($pengajuan);

                alert()->success('Data ditemukan', 'pasien ditemukan');
                return view('DoctorUI.resultPage', compact('value'));
                # code...
            } else {
                # code...
            }

            # code...
        }
        alert()->error('Data tidak ditemukan', 'Data tidak ditemukan / QR Code sudah expired');

        return redirect()->route('scanQrPage')->with('success', 'Pengajuan Telah Disetujui.');
    }
    public function QrPage(Request $request)
    {
        $QR = PengajuanCheckUp::where('qrcode', $request->qr_code_result)
            ->join('users', 'pengajuan_check_ups.nip', '=', 'users.nip')
            ->join('polis', 'pengajuan_check_ups.idpoli', '=', 'polis.id')
            ->join('users as dokter', 'pengajuan_check_ups.nipdokter', '=', 'dokter.nip') // Use 'as' to alias the joined table
            ->select('pengajuan_check_ups.*', 'users.name as nip_name', 'users.divisi as nip_divisi', 'users.tanggal_lahir as nip_tgl_lahir', 'polis.name as idpoli_name', 'dokter.name as dokter_name')
            ->first(); // Ambil data dengan paginasi

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
        return view('DoctorUI.pemeriksaanPage', compact('pengajuan'));
    }

    public function suratizin(PengajuanCheckUp $pengajuan, Request $request)
    {
        // dd(request('suratizin'));
        if (request('suratizin') == 'tanpasuratizin') {
            return redirect()->route('tanpasuratizin', $pengajuan)->with('success', 'Pemeriksaan Selesai.');
        } else {
            $datapoli = Poli::where('id', $pengajuan->idpoli)->first();
            $datauser = User::where('nip', $pengajuan->nip)->first();
            $idpengajuan = $pengajuan->id;
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
// Tentukan path temporer untuk menyimpan gambar sementara
$tempDir = sys_get_temp_dir();

// Path lengkap ke gambar logo
$logoPath = public_path('/img/pal-logo.png');

// Tentukan path untuk gambar sementara
$tempLogoPath = $tempDir . '/temp-logo.png';

// Salin gambar logo ke temp dir
copy($logoPath, $tempLogoPath);

// Konversi gambar sementara menjadi base64
$foto = 'data:image/png;base64,' . base64_encode(file_get_contents($tempLogoPath));

// Hapus gambar sementara setelah konversi selesai
unlink($tempLogoPath);

// Set data untuk digunakan di dalam view atau di proses selanjutnya
$data = [
    'logo' => $foto,
    'pengajuan' => $pengajuan,
    'datapoli' => $datapoli,
    'datauser' => $datauser,
    'umur' => $umur,
    'request' => $request,
    'tglmulai' => $tglmulai,
    'tglakhir' => $tglakhir
];



        // Render the view 'suratIzin' and store it in the $content variable
        $content = view('DoctorUI.suratIzin', $data)->render();

        // Create a new TCPDF object
        $pdf = new TCPDF();

        // Set document information
        $pdf->SetCreator('Your Name');
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Surat Izin');

        // Add a page
        $pdf->AddPage();

        // Write content to the PDF document
        $pdf->writeHTML($content, true, false, true, false, '');

        // Save the PDF to the specified directory
        $tglakhir = date('Y-m-d'); // For example
        $pdf->Output(public_path('pdf/' .$pengajuan->id.$datauser->nip. $tglakhir . '.pdf'), 'F');

        // dd($pengajuan);
        $pengajuan->status = 'done';
        $pengajuan->save();

        $rekapmedis = new RekapMedis();
        $rekapmedis->no_rekap_medis = 'RM_PT_PAL'.$pengajuan->id.$datauser->nip. $tglakhir;
        $rekapmedis->nip = $datauser->nip;
        $rekapmedis->nip_dokter = Auth::user()->nip;
        $rekapmedis->id_pengajuan = $pengajuan->id;
        $rekapmedis->qrcode = $pengajuan->qrcode;
        $rekapmedis->surat_izin = $pengajuan->id.$datauser->nip. $tglakhir . '.pdf';

        $rekapmedis->save();
        // dd($pengajuan);
        alert()->success('Pembuatan Surat Selesai','Surat Izin telah Dibuat');
        return redirect()->route('dashboard');
    }

    public function generatePDF(Request $request)
    {
        // dd($request->content);
        // Mendapatkan konten dari request
        $content = $request->content;

        // dd($content);

        // Generate PDF dengan menggunakan library DOMPDF
        // $pdf = PDF::loadView('DoctorUI.suratIzin.blade', $content);

        // $pdf = Pdf::loadView('pdf.invoice', $data);
        // return $pdf->download('invoice.pdf');



        // $pdf = PDF::loadView('DoctorUI.suratIzin', ['content' => $content]);
        // // Simpan atau kirim PDF sesuai kebutuhan Anda
        // $pdf->save(public_path('Surat Izin/lembar_izin.pdf'));

                alert()->success('Pembuatan Surat Selesai','Surat Izin telah Dibuat');
        return redirect()->route('dashboard');

    }

}
