<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'body',
        'image_url',
        'category_id'
    ];
    
    public function getPaginateByLimit(int $limit_count = 15)
    {
        return $this::with('postcategory')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function postcategory()   
    {
        return $this->belongTo(PostCategory::class);  
    }
}
