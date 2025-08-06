<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    
protected $fillable = ['name', 'price', 'description', 'img_path','categorory_id',];

// public function category()
//     {
//         return $this->belongsTo(Category::class);
//     }


public function category()
{
    return $this->belongsTo(Category::class, 'categorory_id');
}

public function orders()
{
    return $this->belongsToMany(Order::class, 'order_food')
                ->withPivot('quantity')
                ->withTimestamps();
}


}


