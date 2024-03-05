<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPoli extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_poli',
        'id_dokter',
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }
}
