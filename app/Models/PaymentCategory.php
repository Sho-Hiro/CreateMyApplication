<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCategory extends Model
{
    use HasFactory;
    
     public function getLists()
    {
        $categories = PaymentCategory::pluck('payment_category_name', 'id');

        return $categories;
    }
    public function records()   
    {
        return $this->hasMany(Record::class);  
    }
    public function getByCategory(int $limit_count = 15)
    {
         return $this->records()->with('paymentcategory')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
