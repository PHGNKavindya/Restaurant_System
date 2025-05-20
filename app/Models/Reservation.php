<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
use App\Models\Table;



class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'date',
        'time',
        'customer_id',
        'table_id',
    ];

    public function table()
{
    return $this->belongsTo(Table::class);
}

}


