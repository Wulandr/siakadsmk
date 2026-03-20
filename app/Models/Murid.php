<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'murid';
    protected $guarded = [];

    public function get_kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
    public function get_th_ajaran()
    {
        return $this->belongsTo(ThAjaran::class, 'id_th_ajaran', 'id');
    }
}
