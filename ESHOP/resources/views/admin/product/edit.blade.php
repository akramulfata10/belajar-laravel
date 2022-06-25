@extends('layouts.master')
<!-- @yield('content') -->
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Products</h4>
        </div>
        <div class="card-body">
            <form action="{{url ('update-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select">
                                <option value="">{{$products->category->name}}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{$products->name}}" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" value="{{$products->slug}}" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" rows="3" class="form-control"> {{$products->small_description}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{$products->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" value="{{$products->original_price}}" name="original_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" value="{{$products->selling_price}}" name="selling_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">tax</label>
                        <input type="number" class="form-control" value="{{$products->tax}}" name="tax">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control"  value="{{$products->qty}}" name="qty">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" {{$products->status == "1" ? 'checked':''}} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" {{$products->trending == "1" ? 'checked':''}} name="trending">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" value="{{$products->meta_title}}" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="metakeywords">Meta Keywords</label>
                        <textarea name="meta_keywords" class="form-control" rows="3">{{$products->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{$products->meta_description}}</textarea>
                    </div>
                    @if($products->image)
                        <img src="{{asset ('assets/uploads/products/'.$products->image)}}" alt="Product Here">
                    @endif
                    <div class="col-md-12">
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
