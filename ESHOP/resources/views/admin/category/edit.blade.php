@extends('layouts.master')
<!-- @yield('content') -->
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Category</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('update-category/'.$category->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{$category->name}}" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" value="{{$category->slug}}" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" {{$category->status == "1" ? 'checked':''}} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="populer">Populer</label>
                        <input type="checkbox" {{$category->populer == "1" ? 'checked':''}} name="populer" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" value="{{$category->meta_title}}" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="metakeywords">Meta Keywords</label>
                        <textarea name="meta_keywords" class="form-control" rows="3">{{$category->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="metadescrip">Meta Description</label>
                        <textarea name="meta_descrip" rows="3" class="form-control">{{$category->meta_descrip}}</textarea>
                    </div>
                    @if($category->image)
                        <img src="{{asset ('assets/uploads/category/'.$category->image)}}" alt="Category Image" class="Gambar">
                    @endif
                    <div class="col-md-12 mb-3 mt-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3 mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
