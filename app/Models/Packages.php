<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'recommended', 'type', 'price', 'savings', 'api', 'plugin', 'validity', 'user_seats', 'status' ];
}