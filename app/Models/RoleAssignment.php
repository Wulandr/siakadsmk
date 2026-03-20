<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class RoleAssignment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'role_assignment';
    protected $guarded = [];

    public function ke_role()
    {
        return $this->belongsTo('Spatie\Permission\Models\Role', 'id_role', 'id');
    }
    public function ke_user()
    {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
}
