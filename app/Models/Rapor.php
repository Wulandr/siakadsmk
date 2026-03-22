<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'rapor_detail';
    protected $guarded = [];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }
}
