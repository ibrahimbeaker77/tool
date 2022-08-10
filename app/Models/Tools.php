<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tools;

class Tools extends Model
{
    use HasFactory;
    protected $fillable = [ 'title', 'slug', 'status', 'feature', 'category_id' ];

    public function categories()
    {
        return $this->belongsTo(ToolCategories::class, 'category_id');
    }
}
