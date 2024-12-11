<?php

namespace App\Imports;

use App\Models\Pppk;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PppkImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pppk([
            'nomor_urut'  => $row['nomor_urut'],
            'nomor_peserta'  => $row['nomor_peserta'],
            'nik'  => $row['nik'],
            'nama_lengkap'  => $row['nama_lengkap'],
            'jadwal'  => $row['jadwal'],
            'lokasi'  => $row['lokasi'],
            'sesi'  => $row['sesi'],
            'ruang'  => $row['ruang'],
        ]);
    }
}
