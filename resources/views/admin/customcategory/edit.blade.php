@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Edit Category
                        <a href="{{ url('admin/customcategory') }}" class="btn btn-primary btn-sm float-end">BAcK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ url('admin/customcategory/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{$category->name}}"/>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{$category->slug}}"/>
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Description</label>
                                <textarea type="text" name="description" class="form-control" rows="3"  >
                                    {{$category->description}}
                                </textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" />
                                <img src="{{asset('/uploads/category/'.$category->image)}}" width="60px" height="60px"   alt="">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Status</label>
                                <input type="checkbox" name="status" {{$category->status=='1'?'checked':''}}/>

                            </div>


                            <div class="col-md-6 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Save </button>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
