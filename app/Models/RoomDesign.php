<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomDesign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'room_type',
        'dimensions',
        'furniture',
        'color_scheme',
        'lighting',
        'share_token'
    ];

    protected $casts = [
        'dimensions' => 'array',
        'furniture' => 'array',
        'color_scheme' => 'array',
        'lighting' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($design) {
            $design->share_token = str_random(32);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFurnitureItemsAttribute()
    {
        return Product::whereIn('id', collect($this->furniture)->pluck('id'))->get();
    }
} 