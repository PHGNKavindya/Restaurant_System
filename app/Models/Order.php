<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id', 'table_id','status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function items()
    {
        return $this->belongsToMany(Food::class, 'order_food')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function table()
    {
        // return $this->belongsTo(Table::class);
        return $this->belongsTo(\App\Models\Table::class);
    }

    public function customer()
{
    return $this->hasOne(Customer::class);
}

}
