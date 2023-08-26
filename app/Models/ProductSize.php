<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    protected $table = 'customproduct_sizes';
    protected $fillable = [
        'product_id',
        'size_id',

    ];
    public function size() {
        return $this->belongsTo(Size::class,'size_id','id');
    }
    public function product() {
        return $this->belongsTo(CustomProduct::class,'product_id','id');
    }





}
