<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// CategoryFormRequest

class CategoryController extends Controller
{

    public function index()
    {
    return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        /* It accepts an instance of CategoryFormRequest as a parameter.
         This class  contains validation rules for incoming data*/

        $validatedData = $request->validated();
        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        //  this line of code is responsible for generating and assigning a URL-friendly slug for the category based on the validated data.
    //    his means it converts spaces to hyphens, removes special characters, and makes the string lowercase.
        $category->description = $validatedData['description'];

        $uploadPath = 'uploads/category/';
        if ($request->hasFile('image')) {
            $file = $request->file(('image'));
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            //current timestamp
            $file->move('uploads/category/', $filename);
            $category->image = $uploadPath . $filename;
        }
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';


        $category->save();

        return redirect('/admin/category')->with('message', 'Category Added Successfully');
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
    public function update(CategoryFormRequest $request, $category)
    {
        //dd($request->all());
        $category = Category::findOrFail($category);
        //retrieve and work with specific records from the database for further manipulation
        $validatedData = $request->validated();
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if ($request->hasFile('image')) {

            $uploadPath = 'uploads/category/';

            $path = 'uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file(('image'));
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/category/', $filename);
            $category->image =$uploadPath.$filename;


        }
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->update();
        return redirect('/admin/category')->with('message', 'Category updated Successfully');
    }
}
