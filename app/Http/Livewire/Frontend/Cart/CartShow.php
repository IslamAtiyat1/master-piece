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
                    session()->flash('message', 'Quantity Updated');
        session()->flash('message_type', 'success'); // You can also set a message type if needed

                }else {
                    session()->flash('message',  'Only ' . $productColor->quantity . ' Quantity available'
              );
                }

            } else {
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                  session()->flash('message', 'Quantity Updated');

                } else {
                     session()->flash('message', 'Only ' . $cartData->product->quantity . ' Quantity available');
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
      if ($cartData->quantity > 1) {
    $cartData->decrement('quantity');
    session()->flash('message', 'Quantity Updated');
    session()->flash('message_type', 'success'); // You can also set a message type if needed
} else {
    session()->flash('message', 'Quantity cannot be lower than 1');
    session()->flash('message_type', 'error'); // Set appropriate message type
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
            session()->flash('message', 'Cart Item Removed Successfully');
            session()->flash('message_type', 'success');

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
