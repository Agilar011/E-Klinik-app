<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poli; // Pastikan model Poli telah dibuat
use App\Models\PengajuanCheckUp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function showPoli()
    {
        $polis = Poli::all(); // Mengambil semua data poli dari tabel


        return view('UserUI.PoliPage', compact('polis'));
    }

    public function MedicalCheckUp($polis)
    {
        $name = Auth::user()->name;
        $bb = Auth::user()->berat_badan;
        $tb = Auth::user()->tinggi_badan;
        $politujuan = $polis;
        return view('UserUI.InformationRegister', compact('name', 'bb', 'tb', 'politujuan', 'polis'));
    }

    public function update(Request $request)
    {
        // Mengambil data pengguna yang sedang login
        $user = Auth::user();
        $idpoli = Poli::where('name', $request->idpoli)->first();

        // Memperbarui data pengguna dengan data baru dari form
        $user->update([
            'name' => $request->name,
            'divisi' => $request->divisi,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            // 'keluhan' => $request->keluhan,
        ]);


        $pengajuan = new PengajuanCheckUp();
        $pengajuan->nip = $user->nip;
        $pengajuan->idpoli = $idpoli->id;
        $pengajuan->tglpengajuan = now()->format('Y-m-d');
        $pengajuan->keluhan = $request->keluhan;
        $pengajuan->status = 'pending';
        if ($request->tglpemeriksaan == null) {
            # code...
        } else {
            $pengajuan->tglpemeriksaan = $request->tglpemeriksaan;
        }
        $pengajuan->save();
        alert()->success('Pengajuan Telah Dikirim','Pengajuan kesehatan anda telah tercatat');




        // Redirect pengguna kembali ke halaman yang sesuai
        return redirect()->route('dashboard')->with('success', 'Data pengguna berhasil diperbarui.');


}
public function daftarAntrian( $poli)
{
    $poli= Poli::where('name', $poli)->first();
    // dd($poli);


    $tanggalHariIni = now()->format('Y-m-d');

    $query = $poli->id;


    $antrian = PengajuanCheckUp::where('idpoli', 'like', "%$query%")
    ->whereDate('tglpemeriksaan', $tanggalHariIni)
    ->join('users', 'pengajuan_check_ups.nip', '=', 'users.nip')
    ->join('polis', 'pengajuan_check_ups.idpoli', '=', 'polis.id')
    ->select('pengajuan_check_ups.*', 'users.name as user_name', 'users.divisi as user_divisi', 'polis.name as poli_name')
    ->paginate(5);


    // dd($antrian);

    return view('UserUI.daftarAntrian', compact('antrian', 'poli'));
}

public function searchAntrian(Request $request)
{
    $query = $request->input('query');
    $tanggalHariIni = now()->format('Y-m-d');



    $antrian = PengajuanCheckUp::whereDate('tglpemeriksaan', $tanggalHariIni)
    ->join('users', 'pengajuan_check_ups.nip', '=', 'users.nip')
    ->join('polis', 'pengajuan_check_ups.idpoli', '=', 'polis.id')
    ->select('pengajuan_check_ups.*', 'users.name as user_name', 'users.divisi as user_divisi', 'polis.name as poli_name')->get();

    $pengajuan = $antrian::where('name', 'like', "%$query%")
    ->orWhere('user_divisi', 'like', "%$query%")
    ->get();

    dd($antrian);
    return view('UserUI.daftarAntrian', compact('antrian'));


}
}
