<?php

namespace App\Http\Livewire\Frontend\Cart;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart , $totalPrice=0;


    public function  incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {

            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity  > $cartData->quantity) {

                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $productColor->quantity . ' Quantity available',
                        'type' => 'success',
                        'status' => 200,
                        'quantity' => $productColor->quantity
                    ]);
                }

            } else {
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only' . $cartData->product->quantity . 'Quantity available',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Quantity Updated',
                'type' => 'success',
                'status' => 404
            ]);
        }
    }
public function decrementQuantity(int $cartId)
{
    $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

    if ($cartData) {
        if ($cartData->quantity > 1) { // Check if quantity is greater than 1
            $cartData->decrement('quantity');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Quantity Updated',
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Quantity cannot be lower than 1',
                'type' => 'error',
                'status' => 400
            ]);
        }
    } else {
        $this->dispatchBrowserEvent('message', [
            'text' => 'Quantity Updated',
            'type' => 'success',
            'status' => 404
        ]);
    }
}


    public function removecartItem(int $cartId)
    {

        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
        if ($cartRemoveData) {
            $cartRemoveData->delete();
            $this->emit(' item was Added to cart');

            $this->dispatchBrowserEvent('message', [
                'text' => 'cart Item Removed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            $this->emit(' item was Added to cart');

            $this->dispatchBrowserEvent('message', [
                'text' => 'smth went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}
