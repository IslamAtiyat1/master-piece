<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomProductImage extends Model
{
    use HasFactory;
    protected $table = 'customproduct_images';
    protected $fillable = [
        'product_id'
        , 'image'


    ];
}
