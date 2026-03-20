<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'kelas';
    protected $guarded = [];

    public function get_wali_kelas($id)
    {
        return Guru::where('id', $id)
            ->where('jabatan', 'Wali Kelas')
            ->first();
    }
}
