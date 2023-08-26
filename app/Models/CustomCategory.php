<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomCategory extends Model
{
    use HasFactory;
    protected $table = 'customcategories';

    protected $fillable = [
        'name',  'slug',  'description',  'image',
       'status',


    ];
    public function customproducts(){
        return $this->hasMany(CustomProduct::class,'category_id','id');
    }




}
