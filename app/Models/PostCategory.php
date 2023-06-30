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
    public function getByCategory(int $limit_count = 15)
    {
         return $this->posts()->with('postcategory')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function posts()   
    {
        return $this->hasMany(Post::class);  
    }
}
