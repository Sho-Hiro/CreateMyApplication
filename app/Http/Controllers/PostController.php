<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Cloudinary;
use Illuminate\Http\Request;

class PostController extends Controller
{
     public function search_post(Post $post)
    {
        return view('myApplication/search_post')->with(['posts' => $post->getPaginateByLimit()]);  
    }
    public function search_comment(Post $post)
    {
        return view('myApplication/search_comment')->with(['post' => $post]);
    }
     public function post_create()
    {
        return view('myApplication/post_create');  
    }
     public function post_store(PostRequest $request,Post $post)
    { 
        $input = $request['post'];
        
        if($request->file('image')){
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_url' => $image_url];
        }
        
        $post->fill($input)->save();
        return redirect('/myApplication/search_post' . $post->id);
    }

}
