<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\ProductColor;
use App\Models\Color;
class Index extends Component
{
    public $products,$productColorId, $category, $priceInput;
    public $colorFilters = [];

    protected $queryString = [
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];
    public function mount($category)
    {
        // $this->products = $products;
        $this->category = $category;
    }

    public function addToWishList($productId)
    {
        if (Auth::check()) {

            if (Wishlist::where('user_id', auth::user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Already added to Wishlist');
                return false;
            } else {
                Wishlist::create([
                    "user_id" => auth::user()->id,
                    "product_id" => $productId
                ]);
                session()->flash('message', 'Wishlist  added successfully');
            }
        } else {
            session()->flash('message', 'please loging to continue');
            return false;
        }
    }
public function applyColorFilters($query)
{
    if (!empty($this->colorFilters)) {
        $query->whereHas('productColors', function ($subQuery) {
            $subQuery->whereIn('color_id', $this->colorFilters);
        });
    }
    return $query;
}


public function render()
{
    $query = Product::where('category_id', $this->category->id)
        ->when($this->priceInput, function ($q) {
            if ($this->priceInput === 'high-to-low') {
                $q->orderBy('selling_price', 'desc');
            } elseif ($this->priceInput === 'low-to-high') {
                $q->orderBy('selling_price', 'asc');
            }
        });

    $this->applyColorFilters($query); // Apply color filters

    $this->products = $query->where('status', '0')->get();

    $colors = Color::all();

    return view('livewire.frontend.product.index', [
        'colors' => $colors,
        'products' => $this->products,
        'category' => $this->category,
    ]);
}







}
