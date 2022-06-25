@extends('layouts.front')
@section('title')
    Welcome To E-Shop
@endsection
@section('content')
@include('layouts.inc.slider')
<div class="py-5 mt-3">
    <div class="container">
        <div class="row">
            <h2>Featured Product</h2>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach($featured_products as $prod)
                    <div class="item">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/products/'.$prod->image)}}" alt="Product Image" class="w-100">
                            <div class="card-body">
                                <h5>{{$prod->name}}</h5>
                                <span class="float-start">{{$prod->selling_price}}</span>
                                <span class="float-end"><s>{{$prod->original_price}}</s></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection






@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})
</script>
@endsection



@section('show')
<div class="py-5 mt-3 mb-3">
    <div class="container">
        <div class="row">
            <h2>Trending Category</h2>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach($trend as $categori)
                    <div class="item">
                    <a href="{{url ('category/'.$categori->slug)}}">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/category/'.$categori->image)}}" alt="Product Image" class="w-100">
                            <div class="card-body">
                                <h5>{{$categori->name}}</h5>
                                <p>{{$categori->description}}</p>
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


@section('scripts')
<script>
    $('.trending-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})
</script>
@endsection
