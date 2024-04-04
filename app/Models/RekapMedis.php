<?php

namespace App\Models;

use App\Models\PengajuanCheckUp;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class RekapMedis extends Model
{
    protected $table = 'rekap_medis';

    protected $fillable = [
        'no_rekap_medis',
        'nip',
        'nip_dokter',
        'id_pengajuan',
        'qrcode',
        'surat_izin',
    ];

    // Relasi dengan model Pengajuan
    public function pengajuan()
    {
        return $this->belongsTo(PengajuanCheckUp::class, 'id_pengajuan');
    }
    public function nip(){
        return $this->belongsTo(User::class, 'nip');
    }
    public function nip_dokter(){
        return $this->belongsTo(User::class, 'nip');
    }

}
