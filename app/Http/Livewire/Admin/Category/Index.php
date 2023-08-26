<?php

namespace App\Http\Livewire\Admin\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
//third party library


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
        $category =  Category::find($this->category_id);
        $path = 'upload/category/' . $category->image;

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

        $categories = Category::orderBy('id', 'DESC')->paginate(4);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}
