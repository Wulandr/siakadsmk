<?php

namespace App\Exports;

use App\Models\JenisMitra;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class JenisMitraExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'Id',
            'Jenis Mitra',
            'created_at',
            'updated_at'
        ];
    }
    public function collection()
    {
        return JenisMitra::all();
    }
}
