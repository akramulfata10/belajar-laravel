<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Featured Product</h2>
            <div class="owl-carousel owl-carousel owl-theme">
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


@section('Scripts')
<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
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
