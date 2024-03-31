<?php

// use Closure;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Middleware\EncryptUrlMiddleware;





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
        } elseif (Auth()->user()->role === 'dokter') {
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

Route::get('daftarAntrian/{poli}', [UserController::class, 'daftarAntrian'])->name('daftarAntrian');

Route::get('cari', [UserController::class, 'searchAntrian'])->name('searchAntrian');






Route::middleware('role:admin')->group(function () {

    Route::get('/DaftarUser', [AdminController::class, 'ShowUser'])->name('ShowUser');
    Route::get('/DaftarUser/search', [AdminController::class, 'searchUser'])->name('searchUser');


    Route::get('/DaftarPoli', [AdminController::class, 'ShowPoli'])->name('ShowPoli');
    Route::get('/DaftarPoli/search', [AdminController::class, 'searchPoli'])->name('searchPoli');


    Route::get('/DaftarDivisi', [AdminController::class, 'ShowDivisi'])->name('ShowDivisi');
    Route::get('/DaftarDivisi/search', [AdminController::class, 'searchDivisi'])->name('searchDivisi');

    // Route::get('/register', [AdminController::class, 'CreateUser'])->name('CreateUser')->middleware('guest');
    Route::get('/CreateUserPage', [AdminController::class, 'CreateUserPage'])->name('CreateUserPage');
    Route::post('/CreateUser', [AdminController::class, 'CreateUser'])->name('CreateUser');

    Route::get('/CreatePoliPage', [AdminController::class, 'CreatePoliPage'])->name('CreatePoliPage');
    Route::post('/CreatePoli', [AdminController::class, 'CreatePoli'])->name('CreatePoli');

    Route::get('/CreateDivisiPage', [AdminController::class, 'CreateDivisiPage'])->name('CreateDivisiPage');
    Route::post('/CreateDivisi', [AdminController::class, 'CreateDivisi'])->name('CreateDivisi');

    Route::get('/UpdateUser/{id}', [AdminController::class, 'UpdateUserPage'])->name('UpdateUserPage');
    Route::put('/UpdateUser/{id}', [AdminController::class, 'UpdateUser'])->name('UpdateUser');

    Route::get('/UpdatePoli/{id}', [AdminController::class, 'UpdatePoliPage'])->name('UpdatePoliPage');
    Route::put('/UpdatePoli/{id}', [AdminController::class, 'UpdatePoli'])->name('UpdatePoli');

    Route::get('/UpdatePoliWithoutDoctor/{id}', [AdminController::class, 'UpdatePoliWithoutDoctorPage'])->name('UpdatePoliWithoutDoctorPage');
    Route::put('/UpdatePoliWithoutDoctor/{id}', [AdminController::class, 'UpdatePoliWithoutDoctor'])->name('UpdatePoliWithoutDoctor');

    Route::get('/UpdateDoctorWithoutPoli/{id}', [AdminController::class, 'UpdateDoctorWithoutPoliPage'])->name('UpdateDoctorWithoutPoliPage');
    Route::put('/UpdateDoctorWithoutPoli/{id}', [AdminController::class, 'UpdateDoctorWithoutPoli'])->name('UpdateDoctorWithoutPoli');

    Route::get('/UpdateDivisi/{id}', [AdminController::class, 'UpdateDivisiPage'])->name('UpdateDivisiPage');
    Route::put('/UpdateDivisi/{id}', [AdminController::class, 'UpdateDivisi'])->name('UpdateDivisi');

    Route::post('/SetDefault/{id}', [AdminController::class, 'SetDefaultUser'])->name('SetDefaultUser');

    Route::delete('DeletePoli/{id}', [AdminController::class, 'DeletePoli'])->name('DeletePoli');
    Route::delete('/DeleteUser/{id}', [AdminController::class, 'DeleteUser'])->name('DeleteUser');
    Route::delete('/DeleteDivisi/{id}', [AdminController::class, 'DeleteDivisi'])->name('DeleteDivisi');
    Route::delete('/DeleteDataPoli/{id}', [AdminController::class, 'DeleteDataPoli'])->name('DeleteDataPoli');

});

Route::middleware('role:dokter')->group(function () {
    Route::get('/antrianpengajuan', [DoctorController::class, 'index'])->name('Doctor.index');
    Route::get('/dashboard.user', [DoctorController::class, 'UserPage'])->name('Doctor.UserPage');

    Route::get('/pagetolakpengajuan/{pengajuan}', [DoctorController::class, 'RejectionPage'])->name('RecectionPage');
    Route::get('/pagesetujui/{pengajuan}', [DoctorController::class, 'AcceptionPage'])->name('AcceptionPage');

    Route::put('/tolakpengajuan/{pengajuan}', [DoctorController::class, 'TolakPengajuan'])->name('tolakpengajuan');
    Route::put('/setujuipengajuan/{id}', [DoctorController::class, 'SetujuiPengajuan'])->name('setujuipengajuan');

    Route::get('/scan-qr-code', [DoctorController::class, 'ScanQrPage'])->name('scanQrPage');
    Route::post('/QrCodeProcessing', [DoctorController::class, 'ScanQr'])->name('scanQr');
    Route::post('/QrCodeResultProcessing', [DoctorController::class, 'ScanQrResult'])->name('ScanQrResult');


});

Route::post('/QRPage', [DoctorController::class, 'QrPage'])->name('QRPage');
Route::get('/inputRating/{id}',[UserController::class, 'inputRatingPage'])->name('inputRating');
Route::post('/ratingProcessing/{id}', [UserController::class, 'ratingProcessing'])->name('ratingProcessing');

Route::get('/daftarPemeriksaan', [DoctorController::class, 'daftarPemeriksaan'])->name('daftarPemeriksaan');
Route::get('/pemeriksaanPage/{pengajuan}', [DoctorController::class, 'pemeriksaanPage'])->name('pemeriksaanPage');

Route::get('/tanpasuratizin/{pengajuan}', [DoctorController::class, 'tanpasuratizin'])->name('tanpasuratizin');
Route::get('/dengansuratizin/{pengajuan}', [DoctorController::class, 'dengansuratizin'])->name('dengansuratizin');

Route::get('/suratizin/{pengajuan}', [DoctorController::class, 'suratizin'])->name('suratizin');
Route::get('/formSuratIzin/{pengajuan}', [DoctorController::class, 'formSuratIzin'])->name('formSuratIzin');

Route::post('/generate-pdf', [DoctorController::class, 'generatePDF'])->name('generate.pdf');


// Route::get('/formSuratIzin/{pengajuan}', [DoctorController::class, 'formSuratIzin'])->name('formSuratIzin');
