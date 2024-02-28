<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Poli;

class AdminController extends Controller
{
    public function ShowUser()
    {
        $user = User::all();
        $polis = Poli::all(); // Mengambil semua data poli dari tabel

        return view('AdminUI.UserPage', compact('user'));

    }

    public function CreateUser($id){
        return view('AdminUI.index', compact('nama', 'Pengajuan'));

    }
    public function UpdateUserPage($id){
        $user = User::find($id);

        return view('AdminUI.UpdatePage', compact('user'));

    }
    public function UpdateUser($id){
        $user = User::find($id);
        $user->update([
            'nip' => request('nip'),
            'name' => request('name'),
            'divisi' => request('divisi'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'tinggi_badan' => request('tinggi_badan'),
            'berat_badan' => request('berat_badan'),
            'role' => request('role'),
        ]);

        return redirect()->route('ShowUser');
    }
    public function SetDefaultUser($id){
        $user = User::find($id);
        $carbonDate = Carbon::parse($user->tanggal_lahir);
        $defaultPassword = $carbonDate->format('d-m-Y');
        $defaultPassword = str_replace('-', '', $defaultPassword);
        $hashedPassword = Hash::make($defaultPassword);
        $user->update([
            'password' => $hashedPassword,
        ]);
        // dd($user->password);

        return redirect()->route('ShowUser');
    }

    public function DeleteUser($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);
        // dd($user);
        // dd($user);

        // // Periksa apakah pengguna ditemukan
        // if (!$user) {
        //     return redirect()->route('ShowUser')->with('error', 'Pengguna tidak ditemukan.');
        // }

        // Hapus pengguna
        $user->delete();

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->route('ShowUser')->with('success', 'Akun pengguna berhasil dihapus.');
    }
    //





}
