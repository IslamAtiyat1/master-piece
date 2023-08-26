<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customization extends Model
{

    use HasFactory;
        protected $fillable = [
        'size', 'quantity', 'image_url', 'total_price',
    ];
       // Use 'image_url' when accessing the attribute
    public function getImageUrlAttribute()
    {
        return $this->attributes['image_url'];
    }

    // Use 'image_url' when setting the attribute
    public function setImageUrlAttribute($value)
    {
        $this->attributes['image_url'] = $value;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
