<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;
use App\Models\PengajuanCheckUp;


class DoctorController extends Controller
{
    public function index()
    {
        $nama = Auth::user()->name;
         $Pengajuan = PengajuanCheckUp::where('status', 'pending')->get();

        return view('DoctorUI.index', compact('nama', 'Pengajuan'));
    }
    public function RejectionPage(PengajuanCheckUp $pengajuan)
    {
        return view('DoctorUI.RecectionPage', compact('pengajuan'));
    }
    public function AcceptionPage(PengajuanCheckUp $pengajuan)
    {
        return view('DoctorUI.AcceptionPage', compact('pengajuan'));
    }
    public function TolakPengajuan(PengajuanCheckUp $pengajuan)
    {
        $pengajuan->update([
            'status' => 'rejected'
        ]);
        return redirect()->back();
    }
    public function SetujuiPengajuan(PengajuanCheckUp $pengajuan)
    {
        $pengajuan->update([
            'status' => 'approved'
        ]);
        return redirect()->back();
    }

}
