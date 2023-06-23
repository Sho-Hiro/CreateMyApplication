<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;
    
    public function getLists()
    {
        $categories = PostCategory::pluck('category_name', 'id');

        return $categories;
    }
    
    public function posts()
    {
        return $this->(Post::class);
    }
}
