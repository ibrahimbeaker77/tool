<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class subscribers extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'user_id', 'email', 'status' ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
