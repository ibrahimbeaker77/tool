<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tools;

class ToolCategories extends Model
{
    use HasFactory;
    protected $fillable = [ 'title', 'slug', 'image', 'status','description'];

    public function tools()
    {
        return $this->hasOne(Tools::class, 'category_id');
    }
}
