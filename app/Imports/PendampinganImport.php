<?php

namespace App\Imports;

use App\Models\JenisMitra;
use App\Models\Mitra;
use App\Models\Unit;
use App\Models\Distrik;
use App\Models\Pendampingan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PendampinganImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        $firstline = true;
        foreach ($rows as $key => $row) {
            if ($key != 0) {
                $namaMitra = Mitra::where('id', $row[0])->first();
                Pendampingan::create([
                    'id_mitra' => $row[0],
                    'mitra' => $row[1],
                    'judul' => $row[2],
                    'keterangan' => $row[3],
                    'tahun' => $row[4],
                    'nama_pendamping' => $row[5],
                    'nidn' => $row[6],
                    'fakultas' => $row[7],
                    'prodi' => $row[8],
                    'pendanaan' => $row[9],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
