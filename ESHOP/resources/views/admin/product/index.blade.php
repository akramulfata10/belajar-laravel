@extends('layouts.master')
<!-- @yield('content') -->
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Products Page</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col">Selling Price</th>
                <th scope="col">image</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->name}}</td>

                    <td>{{$item->selling_price}}</td>
                    <td>
                        <img src="{{asset ('assets/uploads/products/'.$item->image) }}" class="Gambar" alt="Klik Here">
                    </td>
                    <td>
                        <a href="{{url ('edit-product/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{url ('delete-category/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
@endsection
