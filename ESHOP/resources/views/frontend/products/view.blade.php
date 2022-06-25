@extends('layouts.front')
@section('title', $products->name)
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections / {{$products->category->name}} / {{$products->name}}</h6>
    </div>
</div>
<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assets/uploads/products/'.$products->image)}}" class="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$products->name}}
                        @if($products->trending == '1')
                            <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                        @endif
                    </h2>

                    <hr>
                    <label class="me-3">Original Price : <s>Rs {{$products->original_price}}</s></label>
                    <label class="fw-bold">selling_price : Rs {{$products->selling_price}}</label>
                    <p class="mt-3">
                        {{$products->small_description}}
                    </p>

                    <hr>
                    @if($products->qty > 0)
                        <label class="badge bg-success">In Stock</label>
                    @else
                        <label class="badge bg-danger">Out Of Stock</label>
                    @endif

                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" class="prod_id" value="{{$products->id}}">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn"> - </button>
                                <input type="text" name="quantity" value=" 1 " class="form-control text-center qty-input">
                                <button class="input-group-text increment-btn"> + </button>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br>
                            <button type="button" class="btn btn-primary AddToCartBtn me-3 float-start">Add To Cart <i class="bi bi-cart-check"></i></button>
                            <button type="button" class="btn btn-success me-3 float-start"> Add To Wishlist <i class="bi bi-suit-heart-fill"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                        <h3>Description</h3>
                        <p class="mt-3">
                            {{$products->description}}
                        </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(document).ready(function(){
        $('.AddToCartBtn').click(function(e){
            e.preventDefault();
            var Product_id = $(this).closest('.product_data').find('.prod_id').val();
            var Product_qty = $(this).closest('.product_data').find('.qty-input').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method :'POST',
                url: '/addToCart',
                data: {
                    'product_id' : Product_id,
                    'product_qty' : Product_qty,
                },
                success:function(response){
                    alert(response.status);
                }
            });
        });
        $('.increment-btn').click(function(e){
            e.preventDefault();
            var inc_Value = $('.qty-input').val();
            var increment = parseInt(inc_Value, 10);
            increment = isNaN(increment) ? 0 : increment;
            if(increment < 10 ){
                increment++;
                $('.qty-input').val(increment);
            }
        });

        $('.decrement-btn').click(function(e){
            e.preventDefault();
            var dec_Value = $('.qty-input').val();
            var decrement = parseInt(dec_Value, 10);
            decrement = isNaN(decrement) ? 0 : decrement;
            if(decrement > 1 ){
                decrement--;
                $('.qty-input').val(decrement);
            }
        });
    });
</script>
@endsection
