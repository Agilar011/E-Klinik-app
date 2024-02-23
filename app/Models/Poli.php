<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    // Attribut yang dapat diisi (fillable), sesuaikan dengan struktur tabel di database
    protected $fillable = [
        'name',
        // Tambahkan atribut lain di sini jika diperlukan
    ];
}
