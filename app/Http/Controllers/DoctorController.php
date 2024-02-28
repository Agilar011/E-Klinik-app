<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;
use App\Models\PengajuanCheckUp;


class DoctorController extends Controller
{
    public function UserPage()
    {
        return view('dashboardUser');
    }
    public function index()
    {
        $nama = Auth::user()->name;
         $Pengajuan = PengajuanCheckUp::where('status', 'pending')->get();

        return view('DoctorUI.index', compact('nama', 'Pengajuan'));
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
            'catatan_dokter'  => request('catatan_dokter'),
            'status' => 'rejected'
        ]);
        return view('DoctorUI.index');
    }
    public function SetujuiPengajuan($id, Request $request)
    {

        $pengajuan = PengajuanCheckUp::where('id', $id)->first();

        $pengajuan->status = 'approved';

        $pengajuan->nipdokter = Auth::user()->nip;
         // Access the tglpemeriksaan from the request
    $tglpemeriksaan = $request->tglpemeriksaan;

    // Update the tglpemeriksaan attribute
    $pengajuan->tglpemeriksaan = $tglpemeriksaan;

    // Save the changes
    $pengajuan->save();

        // $pengajuan = PengajuanCheckUp::find($id);
        // $pengajuan->update([
        //     'status' => 'approved',
        //     'nipdokter' => Auth::user()->nip,
        //     'tglpemeriksaan' => $request->tglpemeriksaan, // '2021-08-12'


        // ]);

        return redirect()->route('dashboard')->with('success', 'Pengajuan Telah Disetujui.');
    }

}
