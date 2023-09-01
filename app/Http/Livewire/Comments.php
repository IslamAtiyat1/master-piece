<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Comments extends Component
{
    public $comments = [];
    public $newcomment;
    public $productId;

    public function mount($productId)
    {
        // Fetch comments associated with the given product_id using Eloquent
        $this->comments = Comment::where('product_id', $productId)->get();
        $this->productId = $productId; // Set the $productId property
    }

    public function addComment()
    {
        if (!Auth::check()) {
            // User is not logged in, show alert message
              session()->flash('alert', 'Please log in to continue');
            return redirect()->route('login'); // Change 'login' to the actual login route name
        }

        $newComment = Comment::create([
            'body' => $this->newcomment,
            'created_at' => Carbon::now(),
            'product_id' => $this->productId,
            'user_id' => auth()->user()->id,
        ]);

        // Prepend the new comment to the beginning of the comments array
        $this->comments->prepend($newComment);

        // Reset the new comment input field
        $this->newcomment = "";
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
