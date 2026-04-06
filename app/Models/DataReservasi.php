<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataReservasi extends Model
{
    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'tgl_reservasi',
        'jam_reservasi',
        'keluhan',
        'status',
        'alasan_tolak'
    ];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'pasien_id');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }
}
