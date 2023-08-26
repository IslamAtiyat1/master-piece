<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class Index extends Component
{
        use WithPagination;
        protected $paginationTheme = 'bootstrap';
        public $product_id;

        public $search = '';

    public function deleteProduct($product_id)
    {
        // dd($category_id);
        $this->product_id = $product_id;
    }
    public function destroyProduct()
    {
        $product =  Product::find($this->product_id);
        $path = 'uploads/products/' . $product->image;

        if (File::exists($path)) {
            File::delete($path);
        }
        $product->delete();
        session()->flash('message','successfully product deleted');
        $this->dispatchBrowserEvent('close-model');
        // redirect('/admin-panel/category/');
    }
    public function mount(Request $request)
    {
        $this->search = $request->input('search');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
                $products = Product::where('name', 'like', '%' . $this->search . '%')
                   ->orderBy('id', 'DESC')
                   ->paginate(10);

        return view('livewire..admin.product.index',compact('products'));
    }
}
