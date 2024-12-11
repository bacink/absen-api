<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pppk extends Model
{
    protected $table = 'pegawai_pppk';

    protected $fillable = [
        'nomor_urut',
        'nomor_peserta',
        'nik',
        'nama_lengkap',
        'jadwal',
        'lokasi',
        'sesi',
        'ruang',
        'signature'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'jadwal' => 'datetime:d-m-Y',
        ];
    }
}
