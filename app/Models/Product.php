<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image',
        'stock',
        'dimensions',
        'material',
        'color',
        'weight',
        'warranty_period',
        'is_featured',
        'is_customizable'
    ];

    protected $casts = [
        'dimensions' => 'array',
        'is_featured' => 'boolean',
        'is_customizable' => 'boolean',
        'price' => 'decimal:2'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function wishlistItems()
    {
        return $this->hasMany(WishlistItem::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image;
    }
}
