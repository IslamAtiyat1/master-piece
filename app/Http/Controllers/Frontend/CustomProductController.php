<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomProductFormRequest;
use App\Models\CustomCategory;
use App\Models\CustomProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomProductController extends Controller
{
    public function customcategories()
    {
        $categories = CustomCategory::where('status', '0')->get();
        return view('frontend.collections.customcategory.index', compact('categories'));
    }

    public function index($category_slug)

    {
        $categories = CustomCategory::where('slug', $category_slug)->first();
        // $customproducts = CustomProduct::all();
        // 'customproducts',
        return view('frontend.collections.customproduct.view', compact( 'categories'));
    }


    public function create()
    {
        $customcategories = CustomCategory::all();
        // $products = CustomProduct::all();
        // $sizes = Size::all();
        // , 'sizes'
        return view('frontend.collections.customproduct.view', compact('customcategories'));
    }

    public function store(CustomProductFormRequest $request)
    {
    }
}
