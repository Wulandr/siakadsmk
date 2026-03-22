<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'nilai';
    protected $guarded = [];
    public function get_th_ajaran()
    {
        return $this->belongsTo(ThAjaran::class, 'id_th_ajaran', 'id');
    }
    public function get_mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id');
    }
}
