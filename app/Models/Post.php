<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'image_url',
        'post_category_id',
        'user_id',
    ];
    public function post_category()   
    {
        return $this->belongsTo(PostCategory::class);  
    }
    function getPaginateByLimit(int $limit_count = 15)
    {
        return $this::with('post_category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function user()   
    {
        return $this->belongsTo(User::class);  
    }
    public function favorites()   
    {
        return $this->hasMany(Favorite::class);  
    }
    public function isLikedBy($user): bool {
        return Favorite::where('user_id', $user->id)->where('post_id', $this->id)->first() !==null;
    }
}
