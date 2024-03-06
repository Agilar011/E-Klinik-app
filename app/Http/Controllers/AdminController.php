<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Poli;
use App\Models\DataPoli;



class AdminController extends Controller
{
    public function ShowUser()
    {
        $user = User::all();
        // Alert::success('Success Title', 'Success Message');
        return view('AdminUI.UserPage', compact('user'));

    }
    public function ShowPoli()
    {
        $dataPolis = DataPoli::join('polis', 'data_polis.id_poli', '=', 'polis.id')
            ->join('users', 'data_polis.id_dokter', '=', 'users.id')
            ->select('data_polis.*', 'users.name as user_name', 'polis.name as poli_name')
            ->get();

        $polisWithoutDoctor = Poli::whereDoesntHave('datapoli')->get();
        $doctorWithoutPoli = User::whereDoesntHave('datapoli')
            ->where('role', 'dokter')
            ->get();
        // dd($doctorWithoutPoli);
        //  dd($polisWithoutDoctor);



        // $polis = Poli::all(); // Mengambil semua data poli dari tabel
        // $user = User::all(); // Mengambil semua data user dari tabel
        // $datapoli = DataPoli::all(); // Mengambil semua data user dari tabel
        // $title = 'Delete Data!';
        // $text = "Are you sure you want to delete : <br/>" .
        // "Nama : " . $polis->name . "<br/>" .
        // "ID : " . $polis->id . " ?";
        // confirmDelete($title, $text);


        return view('AdminUI.PoliPage', compact('dataPolis', 'polisWithoutDoctor', 'doctorWithoutPoli'));

    }

    public function ShowDivisi()
    {
        $divisi = Divisi::all();

        return view('AdminUI.DivisiPage', compact('divisi'));

    }

    public function CreateUserPage()
    {
        $polis = Poli::all();
        $divisi = Divisi::all();

        return view('AdminUI.CreateUserPage', compact('polis', 'divisi'));

    }

    public function CreateUser()
    {
        $carbonDate = Carbon::parse(request('tanggal_lahir'));
        $defaultPassword = $carbonDate->format('d-m-Y');
        $defaultPassword = str_replace('-', '', $defaultPassword);
        $hashedPassword = Hash::make($defaultPassword);
        $user = User::create([
            'nip' => request('nip'),
            'name' => request('name'),
            'divisi' => request('divisi'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'tinggi_badan' => request('tinggi_badan'),
            'berat_badan' => request('berat_badan'),
            'role' => request('role'),
            'password' => $hashedPassword,
        ]);
        $namaPoli = request('poli');
        $idPoli = Poli::where('name', request('poli'))->first();
        // dd($idPoli->name);

        if ($namaPoli == $idPoli->name) {
            DataPoli::create([
                'id_dokter' => $user->id,
                'id_poli' => $idPoli->id,
            ]);

            # code...
        } else {
            dd('gagal');
        }
        // dd($idPoli->name);
        // if (request('role') == 'dokter') {
        //     DataPoli::create([
        //         'user_id' => request('nip'),
        //         'poli_id' => $idPoli->id,
        //     ]);
        //     # code...
        // }
        $name = request('name');
        // Alert
        alert()->success('Selamat', 'User ' . $name . ' Telah Dibuat');
        return redirect()->route('ShowUser');
    }
    public function UpdateUserPage($id)
    {
        $user = User::find($id);

        return view('AdminUI.UpdateUSerPage', compact('user'));

    }
    public function UpdateUser($id)
    {
        $user = User::find($id);

        if ($user->role == 'dokter' && (request('role') != 'dokter')) {
            $dataPoli = DataPoli::where('id_dokter', $user->id)->get();
            foreach ($dataPoli as $key => $value) {
                $value->delete();
            }
        } else {
        }

        $user->update([
            'nip' => request('nip'),
            'name' => request('name'),
            'divisi' => request('divisi'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'tinggi_badan' => request('tinggi_badan'),
            'berat_badan' => request('berat_badan'),
            'role' => request('role'),
        ]);



        alert()->success('Selamat', 'Data user ' . $user->name . ' dengan NIP :' . $user->nip . ' telah di update.');
        return redirect()->route('ShowUser');
    }
    public function SetDefaultUser($id)
    {
        $user = User::find($id);
        $carbonDate = Carbon::parse($user->tanggal_lahir);
        $defaultPassword = $carbonDate->format('d-m-Y');
        $defaultPassword = str_replace('-', '', $defaultPassword);
        $hashedPassword = Hash::make($defaultPassword);
        $user->update([
            'password' => $hashedPassword,
        ]);
        // dd($user->password);

        $name = $user->name;
        // Alert
        alert()->success('Selamat', 'Password akun user ' . $name . ' telah dikembalikan ke nilai awal');

        return redirect()->route('ShowUser');
    }

    public function DeleteUser($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        $dataPoli = DataPoli::where('id_dokter', $user->id)->get();

        foreach ($dataPoli as $key => $value) {
            $value->delete();
        }

        // Hapus pengguna
        $user->delete();

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->route('ShowUser')->with('success', 'Akun pengguna berhasil dihapus.');
    }

    public function CreatePoliPage()
    {
        return view('AdminUI.CreatePoliPage');

    }
    public function CreatePoli()
    {
        Poli::create([
            'name' => request('name'),
        ]);
        $poli = request('name');
        // Alert::success('Hore!', 'Poli Created Successfully');
        alert()->success('Selamat', 'Poli ' . $poli . ' Telah Dibuat');



        return redirect()->route('ShowPoli');
    }

    public function UpdatePoliPage($id)
    {
        $poli = Poli::find($id);

        return view('AdminUI.UpdatePoliPage', compact('poli'));

    }
    public function UpdatePoli($id)
    {
        $Poli = Poli::find($id);
        // dd($Poli);

        $Poli->update([
            'name' => request('name'),
        ]);

        $poli = request('name');
        // Alert::success('Hore!', 'Poli Created Successfully');
        alert()->success('Selamat', 'Data poli ' . $poli . ' telah diperbaharui');

        return redirect()->route('ShowPoli');
    }


    public function UpdatePoliWithoutDoctorPage($id)
    {
        $poli = Poli::find($id);
        $user = User::where('role', 'dokter')->get();

        return view('AdminUI.UpdatePoliWithoutDoctorPage', compact('poli', 'user'));

    }

    public function UpdatePoliWithoutDoctor($id)
    {
        DataPoli::create([
            'id_dokter' => request('DoctorPoli'),
            'id_poli' => $id,
        ]);
        $poli = Poli::find($id);
        $user = User::find(request('DoctorPoli')); // Menggunakan find karena hanya mencari satu record, bukan koleksi

        // dd($user->name); // Sebaiknya ini dihapus karena sudah ada peringatan error sebelumnya

        $poliName = $poli->name; // Menggunakan variable baru untuk nama poli
        $doctorName = $user->name; // Menggunakan variable baru untuk nama dokter

        // Alert::success('Hore!', 'Poli Created Successfully');
        alert()->success('Selamat', 'Dokter : ' . $doctorName . ' telah ditugaskan ke poli ' . $poliName);

        return redirect()->route('ShowPoli');
    }

    public function UpdateDoctorWithoutPoliPage($id)
    {
        $user = User::find($id);
        $poli = Poli::all();
        return view('AdminUI.UpdateDoctorWithoutPoli', compact('poli', 'user'));

    }

    public function UpdateDoctorWithoutPoli($id)
    {
        DataPoli::create([
            'id_dokter' => $id,
            'id_poli' => request('DoctorPoli'),
        ]);
        $poli = Poli::find(request('DoctorPoli'));
        $user = User::find($id); // Menggunakan find karena hanya mencari satu record, bukan koleksi

        // dd($user->name); // Sebaiknya ini dihapus karena sudah ada peringatan error sebelumnya

        $poliName = $poli->name; // Menggunakan variable baru untuk nama poli
        $doctorName = $user->name; // Menggunakan variable baru untuk nama dokter

        // Alert::success('Hore!', 'Poli Created Successfully');
        alert()->success('Selamat', 'Dokter : ' . $doctorName . ' telah ditugaskan ke poli ' . $poliName);

        return redirect()->route('ShowPoli');
    }

    public function DeletePoli($id)
    {

        // Temukan data poli berdasarkan ID
        $DataPoli = DataPoli::findOrFail($id);

        // Temukan poli terkait berdasarkan ID poli dari data poli
        $Poli = Poli::findOrFail($DataPoli->id_poli);

        // Temukan dan hapus semua data poli terkait dengan ID poli dari data poli
        $DeletedDataPoli = DataPoli::where('id_poli', $DataPoli->id_poli)->get();
        foreach ($DeletedDataPoli as $value) {
            $value->delete();
        }

        // Hapus poli terkait
        $Poli->delete();
        // Hapus data poli
        // $DataPoli->delete();

        // Tampilkan poli yang dihapus


        // alert()->question('Title','Lorem Lorem Lorem');
        // alert()->success('Hore!', 'Post Deleted Successfully');




        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->route('ShowPoli')->with('success', 'Akun pengguna berhasil dihapus.');
    }

    public function deleteDataPoli($id){
        $dataPoli = DataPoli::findOrFail($id);
        $dataPoli->delete();

        return redirect()->route('ShowPoli')->with('success', 'Akun pengguna berhasil dihapus.');
    }

    public function CreateDivisiPage()
    {
        return view('AdminUI.CreateDivisiPage');


    }

    public function CreateDivisi()
    {
        Divisi::create([
            'name' => request('name'),
        ]);

        // $poliName = $poli->name; // Menggunakan variable baru untuk nama poli
        // $doctorName = $user->name; // Menggunakan variable baru untuk nama dokter

        // Alert::success('Hore!', 'Poli Created Successfully');
        alert()->success('Selamat', 'Divisi ' . request('name') . ' telah dibuat');

        return redirect()->route('ShowUser');


    }

    public function UpdateDivisiPage($id)
    {
        $divisi = Divisi::findOrFail($id);

        return view('AdminUI.UpdateDivisiPage', compact('divisi'));

    }

    public function UpdateDivisi($id)
    {
        $divisi = Divisi::find($id);
        // dd($Poli);

        $divisi->update([
            'name' => request('name'),
        ]);

        alert()->success('Selamat', 'Divisi ' . request('name') . ' telah diperbaharui');

        return redirect()->route('ShowDivisi');
    }

    public function DeleteDivisi($id)
    {
        $divisi = Divisi::findOrFail($id);
        $divisi->delete();

        return redirect()->route('ShowDivisi');

    }
}
