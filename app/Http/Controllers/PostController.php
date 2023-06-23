<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
     public function search_post(Post $post)
    {
        return view('myApplication/search_post')->with(['posts' => $post->get()]);  
    }
     public function post_create()
    {
        return view('myApplication/post_create');  
    }
     public function post_store(PostRequest $request,Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/myApplication/search_post' . $post->id);
    }
}
