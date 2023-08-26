<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Customization;
use Livewire\WithFileUploads;
use App\Events\CustomizationAddedToCart;

use Livewire\Component;

class StickerCustomization extends Component
{
    use WithFileUploads;

    public $size;
    public $quantity = 1;
    public $image;
    public $totalPrice = 0;
    public $prices; // Define the $prices array at the class level

    public function __construct()
    {
        parent::__construct();

        // Define the prices array here or in the constructor
        $this->prices = [
            'small' => [50 => 10, 100 => 15, 150 => 17, 200 => 23, 250 => 25],
            'medium' => [50 => 12, 100 => 17, 150 => 20, 200 => 25, 250 => 30],
            'large' => [50 => 15, 100 => 20, 150 => 25, 200 => 30, 250 => 35],
        ];
    }

    public function calculatePrice()
    {
        $this->totalPrice = $this->prices[$this->size][$this->quantity] ?? 0;
    }

    public function saveSticker()
    {
        // Validate inputs if needed
        $this->validate([
            'size' => 'required',
            'quantity' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new Customization instance
        $customization = new Customization();

        // Set attributes based on user selections
        $customization->size = $this->size;
        $customization->quantity = $this->quantity;

        // Calculate total price and set it
        $totalPrice = $this->prices[$this->size][$this->quantity];
        $customization->total_price = $totalPrice;

        // Handle image upload and set image path
        $imagePath = $this->image->store('images', 'public'); // Assuming you have a 'public' disk configured
        $customization->image_url = $imagePath; // Set the 'image_url' attribute

        // Set the user ID for the customization
        $customization->user_id = auth()->user()->id;

        // Save the customization data to the database
        $customization->save();

        // Dispatch the event to add the customization to the cart

        // Clear form fields after successful submission
        $this->reset(['size', 'quantity', 'image']);

        // Optionally, you can redirect to a success page or show a success message
        session()->flash('success', 'Customization saved successfully!');
        return redirect()->to('profile');
    }



    public function render()
    {
        return view('livewire.frontend.sticker-customization');
    }
}
