<?php

namespace App\Exports;

use App\Models\Mitra;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class MitraExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'Id',
            'Jenis Mitra',
            'Id Unit',
            'Nama Mitra',
            'Deskripsi',
            'Id Distrik',
            'Alamat',
            'Created by',
            'id Pendampingan',
            'Judul',
            'Keterangan',
            'Tahun',
            'Nama Pendamping',
            'NIDN',
            'Fakultas',
            'Prodi',
            'Pendanaan',
        ];
    }
    public function collection()
    {
        return DB::table('mitra')
            ->join('pendampingan', 'mitra.id', '=', 'pendampingan.id_mitra')
            ->select(
                'mitra.id',
                'mitra.id_jenis_mitra',
                'mitra.id_unit',
                'mitra.nama_mitra',
                'mitra.deskripsi',
                'mitra.id_distrik',
                'mitra.alamat',
                'mitra.created_by',
                'pendampingan.id as id_pendampingan',
                'pendampingan.judul',
                'pendampingan.keterangan',
                'pendampingan.tahun',
                'pendampingan.nama_pendamping',
                'pendampingan.nidn',
                'pendampingan.fakultas',
                'pendampingan.prodi',
                'pendampingan.pendanaan'
            )
            ->get();
    }
}
