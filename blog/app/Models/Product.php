<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function productToCategory(){
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault();
    }
}
