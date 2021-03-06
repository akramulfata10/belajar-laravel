<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index($id=null)
    {
        if($id){
            $blog = Blog::find($id);
        } else {
            $blog = Blog::all();
        }
        return $blog;
    }
    public function addPost(Request $request){
        $simpan = new blog;
        $simpan->title = $request->title;
        $simpan->details = $request->details;
        $result = $simpan->save();
        if ($result) {
            return ["result" => "berhasil menambahkan blog"];
        } else {
            return ["result" => "gagal menambahkan blog"];
        }
    }

    public function updateBlog(Request $request){
        $edit = Blog::find($request->id);
        $edit->title = $request->title;
        $edit->details = $request->details;
        $result = $edit->save();
        if( $result ) {
            return ["request" => "Blog Succesfully Update"];
        } else { 
            return ["request" => "Blog Not Succesfully Update"];
        }
    }

    public function deleteBlog($id){
        $hapus = Blog::find($id);
        $result = $hapus->delete();
        if($result) {
            return ["result" => "Blog Deleted"];
        } else {
            return ["result" => "Blog Not Deleted"];
        }
    }

    public function searchBlog($param){
        $cari = Blog::where('title', 'like', '%' . $param . '%')->get();
        return $cari;
    }
}
