<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Memeriksa apakah pengguna sudah login
        if (Auth::check()) {
            // Memeriksa peran (role) pengguna saat ini
            $userRole = Auth::user()->role;

            // Memeriksa apakah peran pengguna termasuk dalam daftar peran yang diizinkan
            if (in_array($userRole, $roles)) {
                // Lanjutkan ke halaman yang diminta
                return $next($request);
            }
        }

        // Jika pengguna tidak memiliki peran yang diizinkan, Anda dapat mengarahkannya ke halaman tertentu
        // Misalnya, halaman beranda dengan pesan kesalahan atau halaman login
        return redirect('/dashboard')->with('error', 'Unauthorized.');
    }
}
