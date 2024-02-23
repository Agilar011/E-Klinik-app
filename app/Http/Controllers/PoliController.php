<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poli; // Pastikan model Poli telah dibuat

class PoliController extends Controller
{
    /**
     * Menampilkan daftar poli.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $polis = Poli::all(); // Mengambil semua data poli dari tabel

        return view('poli', compact('polis')); // Menampilkan view polis.index dan menyertakan data polis
    }
}
