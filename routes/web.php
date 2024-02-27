<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth()->user()->role === 'admin') {
            return view('dashboard');
        } elseif (Auth()->user()->role === 'doctor') {
            return view('dashboardDoctor');
        } else {
            return view('dashboardUser');
        }


    })->name('dashboard');
});

Route::get('/polis', [PoliController::class, 'index'])->name('polis.index');

Route::get('/poliPage', [UserController::class, 'showPoli'])->name('poliPage');

Route::get('/poli/{poli}', [UserController::class, 'MedicalCheckUp'])->name('poli.show');

Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
Route::get('/antrianpengajuan', [DoctorController::class, 'index'])->name('Doctor.index');

Route::get('/pagetolakpengajuan/{pengajuan}', [DoctorController::class, 'RejectionPage'])->name('RecectionPage');
Route::get('/pagesetujui/{pengajuan}', [DoctorController::class, 'AcceptionPage'])->name('AcceptionPage');

Route::get('/tolakpengajuan/{pengajuan}', [DoctorController::class, 'TolakPengajuan'])->name('tolakpengajuan');
Route::put('/setujui/{pengajuan}', [DoctorController::class, 'SetujuiPengajuan'])->name('setujuipengajuan');
Route::put('/setujuipengajuan/{id}', [DoctorController::class, 'SetujuiPengajuan'])->name('setujuipengajuan');





