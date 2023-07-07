<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'resutaurant_name',
        'body',
        'money',
        'payment_category_id',
        'user_id',
    ];
    public function payment_category()   
    {
        return $this->belongsTo(PaymentCategory::class);  
    }
    function getPaginateByLimit(int $limit_count = 15)
    {
        return $this::with('payment_category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function user()   
    {
        return $this->belongsTo(User::class);  
    }
    
}
