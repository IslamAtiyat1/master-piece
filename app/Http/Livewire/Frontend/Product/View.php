<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Comment;
use App\Models\Wishlist;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity ,$comments
    ,$prodSizeSelectedQuantity, $quantityCount = 1, $productColorId, $productSizeId;


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
            session()->flash('alert', 'please loging to continue');
            return false;
        }
    }

    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }


    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }
    public function decrementQuantity()
    {
        if ($this->quantityCount > 0) {
            $this->quantityCount--;
        }
    }
    public function mount($category, $product, $productId )
    {
        $this->category = $category;
        $this->product = Product::findOrFail($productId);


    }



    public function addToCart(int $productId)
    {
        if (Auth::check()) {

            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                // check for color Insert Product to Cart
                if ($this->product->productColors()->count() > 1)
                 {
                    if ($this->prodColorSelectedQuantity != NULL) {
                        if(Cart::where('user_id',auth()->user()->id)
                        ->where('product_id',$productId)
                        ->where('product_color_id',$this->productColorId)
                        ->exists())
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product Already Added',
                                    'type' => 'warning',
                                    'status' => 200
                                ]);
                            }
                            else
                            {

                                $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                                if($productColor->quantity > 0)
                                {

                                        if ($productColor->quantity > $this->quantityCount)
                                        {
                                            // Insert Product to Cart
                                            Cart::create([
                                            'user_id' => auth()->user()->id,
                                            'product_id' => $productId,
                                            'product_color_id' => $this->productColorId,
                                            'product_size_id' => $this->productSizeId,
                                            'quantity' =>   $this->quantityCount,
                                            ]);

                                            $this->emit('CartAddedUpdated');

                                            $this->dispatchBrowserEvent('message', [
                                                'text' => 'product added  To Cart',
                                                'type' => 'success',
                                                'status' => 200
                                                ]);
                                        } else {
                                            $this->dispatchBrowserEvent('message', [
                                                'text' => 'only' . $productColor->quantity . 'Qantity Avaliable',
                                                'type' => 'warning',
                                                'status' => 404
                                            ]);
                                        }

                                }
                                else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'out of stock',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                             }
                    }
                     else
                     {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select your Color product',
                            'type' => 'info',
                            'status' => 404
                        ]);
                    }
                }
                 else
                 {
                    if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists())
                    {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product Already Added',
                            'type' => 'warning',
                            'status' => 200
                        ]);
                    }
                    else
                    {
                        if ($this->product->quantity > 0)
                        {

                            if ($this->product->quantity > $this->quantityCount)
                            {
                                // Insert Product to Cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' =>   $this->quantityCount,
                                ]);
                                $this->emit('CartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'product added  To Cart',
                                    'type' => 'success',
                                    'status' => 200
                                    ]);
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'only' . $this->product->quantity . 'Qantity Avaliable',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }

                        }
                        else
                        {
                            $this->dispatchBrowserEvent('message', [
                                session()->flash('message', 'out of stock'),

                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Does not exists',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('alert', [
                session()->flash('alert', 'please loging to continue'),
                'type' => 'info',
                'status' => 401
            ]);
        }
    }
    public function render()
    {
        return view('livewire.frontend.product.view', [

            'category' => $this->category,
            'product' =>  $this->product


        ]);
    }
}
