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
        'status_qrcode',
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

    public function getStatusClass()
    {
        switch ($this->status) {
            case 'done':
                return 'bg-green-400';
            case 'on process':
                return 'bg-yellow-400';
            case 'approved':
                return 'bg-blue-400';
            case 'rejected':
                return 'bg-red-400';
            case 'pending':
                return 'bg-blue-200';
            default:
                return 'bg-blue-200';
        }
    }

}
