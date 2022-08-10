<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permissions;
use App\Models\UserHasRole;

class Roles extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'permission_id' ];

    public function permissions()
    {
        return $this->belongsTo(Permissions::class, 'permission_id');
    }

    public function userHasRole()
    {
        return $this->hasOne(UserHasRole::class, 'role_id');
    }
}
