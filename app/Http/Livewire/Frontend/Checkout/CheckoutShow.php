<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
use Livewire\Component;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $carts, $totalproductAmount = 0;
    public $emptyInputs = false; // Property to track empty inputs

    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;
    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'pincode' => 'required|digits_between:6,6',
            'address' => 'required|string|max: 500',
        ];
    }

    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'drip-' . Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id
        ]);
        foreach ($this->carts as $cartItem) {
            $orderItems = Orderitem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price,
            ]);

        }
        return $order;

    }
    public function codOrder()
    {
        $this->payment_mode = 'cash on delivery';
        $codOrder = $this->placeOrder();

        if ($codOrder) {
            // Success logic here
            Cart::where('user_id', auth()->user()->id)->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order placed successfully',
                'type' => 'success',
                'status' => 200
            ]);
                return redirect()->to('thank-you');

        } else {
            // Error logic here
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }
    public function codOrder1()
    {
        $this->payment_mode = 'online payment';
        $codOrder = $this->placeOrder();

        if ($codOrder) {
            // Success logic here
            Cart::where('user_id', auth()->user()->id)->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order placed successfully',
                'type' => 'success',
                'status' => 200
            ]);
                return redirect()->to('thank-you');

        } else {
            // Error logic here
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }


    public function totalProductAmount()
    {
                $this->totalproductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalproductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalproductAmount;
    }
    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $this->totalproductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalproductAmount' => $this->totalproductAmount
        ]);
    }
}
