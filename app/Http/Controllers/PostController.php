<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Cloudinary;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
     public function search_post(Post $post)
    {
        return view('myApplication/search_post')->with(['posts' => $post->getPaginateByLimit()]);  
    }
    public function post_comment(Post $post)
    {
        return view('myApplication/post_comment')->with(['post' => $post]);
    }
     public function post_create(PostCategory $postCategory)
    {
        return view('myApplication/post_create')->with(['postCategories' => $postCategory->get()]);  
    }
     public function post_store(PostRequest $request,Post $post)
    { 
        $post->user_id = \Auth::id();
        $input = $request['post'];
        
        if($request->file('image')){
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_url' => $image_url];
        }
        
        $post->fill($input)->save();
        return redirect('/myApplication/search_post');
    }
    public function post_edit(Post $post)
    {
        return view('/myApplication/post_edit')->with(['post' => $post]);
    }
    public function post_update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/myApplication/search_post/' . $post->id);
    }
    public function post_delete(Post $post)
    {
        $post->delete();
        return redirect('/myApplication/search_post');
    }

}
