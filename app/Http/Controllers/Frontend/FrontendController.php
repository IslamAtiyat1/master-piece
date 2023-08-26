<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    // Categories
    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {
            //   $products = $category->products()->get();
            return view('frontend.collections.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    public function profile(){

        return view('frontend.profile');

    }
    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {

            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if ($product) {
                return view('frontend.collections.products.view', compact('product', 'category'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }




    // customproductView
    public function thankyou()
    {
        return view('frontend.thank-you');
    }

public function searchProducts(Request $request)
{
    if ($request->search) {
        $searchQuery = $request->search;
        $searchProducts = Product::where('name', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('description', 'LIKE', '%' . $searchQuery . '%')
            ->latest()
            // The latest() method orders the results in descending order based on the product's creation date,
            ->paginate(9); // Change this to the number of results you want per page

        return view('frontend.pages.search', compact('searchProducts', 'searchQuery'));
    }
     else {
        return redirect()->back()->with('message', 'Empty Search');
    }
}

}
