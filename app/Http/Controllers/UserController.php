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


        // Redirect pengguna kembali ke halaman yang sesuai
        return redirect()->route('dashboard')->with('success', 'Data pengguna berhasil diperbarui.');


}
}
