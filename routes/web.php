<?php

use App\Http\Controllers\AdminController;
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
            return view('dashboardAdmin');
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
Route::get('/dashboard.user}', [DoctorController::class, 'UserPage'])->name('Doctor.UserPage');

Route::get('/pagetolakpengajuan/{pengajuan}', [DoctorController::class, 'RejectionPage'])->name('RecectionPage');
Route::get('/pagesetujui/{pengajuan}', [DoctorController::class, 'AcceptionPage'])->name('AcceptionPage');

Route::put('/tolakpengajuan/{pengajuan}', [DoctorController::class, 'TolakPengajuan'])->name('tolakpengajuan');
Route::put('/setujui/{pengajuan}', [DoctorController::class, 'SetujuiPengajuan'])->name('setujuipengajuan');
Route::put('/setujuipengajuan/{id}', [DoctorController::class, 'SetujuiPengajuan'])->name('setujuipengajuan');


Route::get('/DaftarUser', [AdminController::class, 'ShowUser'])->name('ShowUser');
Route::get('/DaftarPoli', [AdminController::class, 'ShowPoli'])->name('ShowPoli');
Route::get('/CreateUser', [AdminController::class, 'CreateUser'])->name('CreateUser');
Route::get('/UpdateUser/{id}', [AdminController::class, 'UpdateUserPage'])->name('UpdateUserPage');
Route::put('/UpdateUser/{id}', [AdminController::class, 'UpdateUser'])->name('UpdateUser');
// Route::get('/DeletUser', [AdminController::class, 'CreateUser'])->name('CreateUser');
Route::post('/SetDefault/{id}', [AdminController::class, 'SetDefaultUser'])->name('SetDefaultUser');
Route::delete('/DeleteUser/{id}', [AdminController::class, 'DeleteUser'])->name('DeleteUser');

Route::get('/UpdatePoli/{id}', [AdminController::class, 'UpdatePoliPage'])->name('UpdatePoliPage');
Route::put('/UpdatePoli/{id}', [AdminController::class, 'UpdatePoli'])->name('UpdatePoli');
Route::delete('/DeletePoli/{id}', [AdminController::class, 'DeletePoli'])->name('DeletePoli');



