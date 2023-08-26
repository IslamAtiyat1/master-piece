<?php

namespace App\Http\Livewire;

use Livewire\Component;


class PriceCalculator extends Component
{
    public $quantity = 0;
    public $selectedSizes = [];
    public $price = 0;

    protected $listeners = ['calculatePrice'];

    public function render()
    {
        return view('livewire.price-calculator');
    }

    public function calculatePrice()
    {
        $basePrice = $this->quantity * 0.25;

        foreach ($this->selectedSizes as $sizeId) {
            if ($sizeId == 4) $basePrice += 2;
            if ($sizeId == 5) $basePrice += 3;
            if ($sizeId == 6) $basePrice += 4;
            if ($sizeId == 7) $basePrice += 5;
        }

        $this->price = number_format($basePrice, 2);
    }
}

