@extends('layouts.front')
@section('title')
    Category
@endsection
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Categories</h2>
                </div>
                <div class="row">
                    @foreach($category as $categori)
                        <div class="col-md-3 mb-3">
                            <a href="{{url ('category/'.$categori->slug)}}">
                                <div class="card">
                                    <img src="{{asset('assets/uploads/category/'.$categori->image)}}" alt="Category">
                                    <div class="card-body">
                                        <h5>{{$cate->name}}</h5>
                                        <p>{{$cate->description}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
