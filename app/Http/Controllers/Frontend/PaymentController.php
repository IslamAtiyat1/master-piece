<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function create()
    {
        return view('frontend.payment.index');
    }
public function updated($field)
{
    // Check if any of the form inputs are empty
    $this->emptyInputs = empty($this->card_number) || empty($this->expire) || empty($this->cvv);
    dd($this->emptyInputs);
}


    public function store(Request $request)
    {
        $request->validate([
            'card_number' => 'required',
            'expire' => 'required',
            'cvv' => 'required',
        ]);

        // Your payment data handling logic here

        $payment = new Payment();
        $payment->card_number = $request->input('card_number');
        $payment->expire = $request->input('expire');
        $payment->cvv = $request->input('cvv');
        $payment->user_id = auth()->user()->id;

        // Save the payment data
        $payment->save();

        // Optionally, you can redirect the user to a success page or perform other actions
        return redirect()->route('checkout')->with('success', 'Debit card information was saved.');
    }



    public function index()
    {
        return view('frontend.payment.index');
    }
}
