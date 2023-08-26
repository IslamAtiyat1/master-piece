<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomCategory;

class CustomProduct extends Model
{
    use HasFactory;
    protected $table = 'customproducts';
    protected $fillable = [
        'category_id','name',  'slug',  'description',
        ,'quantity', 'price',



    ];
    public function customcategory(){
        return $this->belongsTo(CustomCategory::class,'category_id','id');
    }
    public function productSize() {
        return $this->hasMany(ProductSize::class,'product_id','id');
    }
    public function productImages() {
        return $this->hasMany(CustomProductImage::class,'product_id','id');
    }





}
