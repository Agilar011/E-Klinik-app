<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCheckUp extends Model
{
    use HasFactory;

    protected $fillable = [
        'idpengajuan',
        'nip',
        'nipdokter',
        'idpoli',
        'qrcode',
        'tglpengajuan',
        'tglpemeriksaan',
        'keluhan',
        'status',
        'catatan_dokter',
    ];

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'nip');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'nipdokter');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'idpoli');
    }
}
