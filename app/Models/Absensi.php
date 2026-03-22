<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'absensi';
    protected $guarded = [];

    public function murid()
    {
        return $this->belongsTo(Murid::class, 'id_murid');
    }

    public function thAjaran()
    {
        return $this->belongsTo(ThAjaran::class, 'id_th_ajaran');
    }
}
