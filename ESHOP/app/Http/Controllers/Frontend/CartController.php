<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $Product_id = $request->input('product_id');
        $Product_qty = $request->input('product_qty');

        if (Auth::check()) {
            $prodCheck = Product::where('id', $Product_id)->first();
            if ($prodCheck) {
                if (Cart::where('prod_id', $Product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prodCheck->name . " Already Added To Cart "]);
                } else {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $Product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $Product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prodCheck->name . " Added To Cart "]);
                }
            }
        } else {
            return response()->json(['status' => "Login To Continue"]);
        }
    }
}
