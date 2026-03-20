<?php

namespace App\Exports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UnitExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'Id',
            'Nama Unit',
            'telepon',
            'email',
            'created_at',
            'updated_at'
        ];
    }
    public function collection()
    {
        return Unit::all();
    }
}
