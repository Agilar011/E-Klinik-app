<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCheckUp;
use Illuminate\Http\Request;
use App\Models\Poli; // Pastikan model Poli telah dibuat
use App\Models\User; // Pastikan model User telah dibuat

class PoliController extends Controller
{
    /**
     * Menampilkan daftar poli.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pengajuan = PengajuanCheckUp::all(); // Mengambil semua data pengajuan dari tabel
        $poli = Poli::all(); // Mengambil semua data poli dari tabel
        $user = User::all(); // Mengambil semua data user dari tabel

        // $poli = Poli::where('id', $pengajuan->idpoli)->all();
        // $user = User::where('id', $pengajuan->iduser)->all();

        // $poli = Poli::where('id', $pengajuan->idpoli)->first();
        // $user = User::where('id', $pengajuan->iduser)->first();


        return view('poli', compact('pengajuan', 'poli', 'user')); // Menampilkan view polis.index dan menyertakan data polis
    }
}
