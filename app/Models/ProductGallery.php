<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductGallery extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'url', 'is_featured'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getUrlAttribute($url)
    {
        return config('app.url') . Storage::url($url);
    }
}
