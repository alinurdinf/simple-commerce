<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'stock', 'status'];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
}
