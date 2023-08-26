<?php

namespace App\Http\Livewire\Frontend\User;
use App\Models\Customization;

use Livewire\Component;
use App\Models\User;
class Profile extends Component
{
    public $username;
    public function mount()

{
    // Retrieve saved customizations for the authenticated user
    $this->customizations = Customization::where('user_id', auth()->user()->id)->get();
}

    public function render()
    {
$username=User::all();
        return view('livewire.frontend.user.profile', [
            'customizations' => $this->customizations, 'username' => $this->username
        ]);
    }
}
