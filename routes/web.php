<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoliController;


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
        }elseif (Auth()->user()->role === 'doctor') {
            return view('dashboardDoctor');
        } else {
            return view('dashboardUser');
        }


    })->name('dashboard');
});

Route::get('/polis', [PoliController::class, 'index'])->name('polis.index');

