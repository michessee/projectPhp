<?php

namespace App\Imports;

use App\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            'nama_depan' => (isset($row[1]) ? $row[1] : ''),
            'nama_belakang' => (isset($row[2]) ? $row[2] : ''),
            'alamat' => (isset($row[3]) ? $row[3] : ''),
            'nim' => (isset($row[4]) ? $row[4] : ''),
            'jurusan' => (isset($row[5]) ? $row[5] : ''),
        ]);
    }
}
