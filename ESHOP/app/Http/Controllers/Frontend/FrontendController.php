<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $trend = Category::where('populer', '1')->take(15)->get();
        return view('frontend.index', compact('trend', 'featured_products'));
    }
    public function category()
    {
        $category = Category::where('status', '0')->get();
        return view('frontend.category', compact('category'));
    }

    public function viewcategory($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'products'));
        } else {
            return redirect('/')->with('status', "Slug Doesnot Exists");
        }
    }
    public function productview($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists()) {
            if (Product::where('slug', $prod_slug)->exists()) {
                // maka ambil product
                $products = Product::where('slug', $prod_slug)->first();
                return view('frontend.products.view', compact('products'));
            } else {
                return redirect('/')->with('status', 'The Link Was Broken');
            }
        } else {
            return redirect('/')->with('status', 'No Such Category Found');
        }
    }
}
