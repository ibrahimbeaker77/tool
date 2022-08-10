<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blogs;

class BlogCategories extends Model
{
    use HasFactory;
    protected $fillable = [ 'title', 'slug', 'status' ];

    public function blogs()
    {
        return $this->hasOne(Blogs::class, 'category_id');
    }
}
