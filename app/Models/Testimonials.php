<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    use HasFactory;
    protected $fillable = [ 'title', 'image', 'rating', 'email', 'subject', 'designation', 'description', 'status' ];
}
