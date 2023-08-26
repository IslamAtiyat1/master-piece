<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CustomCategoryFormRequest;
class CustomCategoryController extends Controller
{
    public function index()
    {
        return view('admin.customcategory.index');
    }

    public function create()
    {
        return view('admin.customcategory.create');
    }

    public function store(CustomCategoryFormRequest $request)
    {

        $validatedData = $request->validated();
        $category = new CustomCategory;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];
        $uploadPath = 'uploads/customcategory/';
        if ($request->hasFile('image')) {
            $file = $request->file(('image'));
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/customcategory/', $filename);
            $category->image = $uploadPath . $filename;
        }
        $category->status = $request->status == true ? '1' : '0';
        $category->save();
        return redirect('/admin/customcategory')->with('message', 'Category Added Successfully');
    }

    public function edit(CustomCategory $category)
    {
        return view('admin.customcategory.edit', compact('category'));
    }
    public function update(CustomCategoryFormRequest $request, $category)
    {
        //dd($request->all());
        $category = CustomCategory::findOrFail($category);
        $validatedData = $request->validated();
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/customcategory/';
            $path = 'uploads/customcategory/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file(('image'));

            $ext = $file->getClientOriginalExtension();

            $filename = time() . '.' . $ext;
            $file->move('uploads/customcategory/', $filename);

            $category->image =$uploadPath.$filename;
        }

        $category->status = $request->status == true ? '1' : '0';


        $category->update();

        return redirect('/admin/customcategory')->with('message', 'Category updated Successfully');
    }

}
