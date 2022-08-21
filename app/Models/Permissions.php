<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Roles;

class Permissions extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'guard_name' ];

    public function roles()
    {
        return $this->hasOne(Roles::class, 'permission_id');
    }
}
