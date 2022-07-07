<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class FileUpload extends Controller
{
    public function uploadFile(Request $request)
    {
        $upload_files = $request->file->store('public/uploads');
        $blog =  new Blog;
        $blog->title = $request->title;
        $blog->details = $request->details;
        $blog->images = $request->file->hashName();
        $result = $blog->save();
        if($result){
            return ["result" => "Blog Added"];
        } else {
            return ["result" => "Blog Not Added"];
        }
    }
}
