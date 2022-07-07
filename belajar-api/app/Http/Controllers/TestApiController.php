<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class TestApiController extends Controller
{
    public function index()
    {
       $all = Blog::all();
       return $all;
    }
}
