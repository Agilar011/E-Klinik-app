<?php

namespace App\Models;

use App\Models\Poli;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_poli',
        'id_pengajuan',
        'nip_pasien',
        'id_dokter',
        'keluhan',
        'rating',
        'komentar',
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'nip');
    }
}
