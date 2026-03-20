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
use illuminate\Support\Str;

class MitraImport implements ToCollection
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
                $reqJenisMitra = JenisMitra::where('jenis', $row[0])->first();
                $reqUnit = Unit::where('nama_unit', $row[1])->first();
                $reqDistrik = Distrik::where('nama', $row[7])->first();
                Mitra::create([
                    'id_jenis_mitra'  =>  $reqJenisMitra->id,
                    'id_unit'   => $reqUnit->id,
                    'nama_mitra'   => $row[2],
                    'slug'   => Str::slug($row[2]),
                    'telepon'    => $row[3],
                    'whatsapp'    => $row[4],
                    'email'  => $row[5],
                    'deskripsi'  => $row[6],
                    'id_distrik'   =>  $reqDistrik->id,
                    'alamat'   => $row[8],
                    'longitude'   => $row[9],
                    'latitude'   => $row[10],
                    'facebook'   => $row[11],
                    'instagram'   => $row[12],
                    'shop'   => $row[13],
                    'created_by'   =>  Auth::user()->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                Pendampingan::create([
                    'mitra' => $row[2],
                    'judul' => $row[14],
                    'keterangan' => $row[15],
                    'tahun' => $row[16],
                    'nama_pendamping' => $row[17],
                    'nidn' => $row[18],
                    'fakultas' => $row[19],
                    'prodi' => $row[20],
                    'pendanaan' => $row[21],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
