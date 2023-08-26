<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\ProductColor;
use App\Models\Comment;
class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'category_id',
         'name',
          'slug',
          'small_description',
         'description',
          'orginal_price',
         'selling_price',
         'quantity',
          'trending',
           'status',
            'meta_title',
          'meta_keyword',
           'meta_description'
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function productImages() {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function productColors() {
        return $this->hasMany(ProductColor::class,'product_id','id');
    }
    public function comments() {
        return $this->hasMany(Comment::class,'comment_id','id');
    }

    // ProductSize
}
