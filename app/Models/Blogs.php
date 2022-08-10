<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategories;

class Blogs extends Model
{
    use HasFactory;
    protected $fillable = [ 'title', 'slug', 'feature', 'category_id', 'reading_time', 'auth', 'role', 'status', 'publish_time', 'views', 'description' ];
    
    public function categories()
    {
        return $this->belongsTo(BlogCategories::class, 'category_id');
    }
}