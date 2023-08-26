<?php
namespace App\Http\Livewire\Admin\User;

use App\Models\Customization;
use Livewire\Component;

class Custom extends Component
{
    public $customizations; // Declare the variable

    public function mount()
    {
        // Retrieve saved customizations
        $this->customizations = Customization::all(); // Use the all() method to fetch all records
    }

    public function render()
    {
        return view('livewire.admin.user.custom', [
            'customizations' => $this->customizations,
        ]);
    }
}
