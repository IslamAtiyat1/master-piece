<?php

namespace App\Http\Livewire\Admin\CustomCategory;
use Livewire\WithPagination;
use App\Models\CustomCategory;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;
    public function deleteCategory($category_id)
    {
        // dd($category_id);
        $this->category_id = $category_id;
    }
    public function destroyCategory()
    {
        $category =  CustomCategory::find($this->category_id);
        $path = 'upload/customcategory/' . $category->image;

        if (File::exists($path)) {
            File::delete($path);
        }
        $category->delete();
        session()->flash('message','successfully category deleted');
        $this->dispatchBrowserEvent('close-model');
        // redirect('/admin-panel/category/');
    }



    public function render()
    {
         $categories = CustomCategory::orderBy('id', 'DESC')->paginate(4);
        return view('livewire.admin.custom-category.index', ['categories' => $categories]);
    }
}
