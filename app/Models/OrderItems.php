<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $fillable = ['order_id', 'dish_id', 'quantity', 'price'];

    /*
    * Связь с моделью Order
    */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /*
    * Связь с моделью Dish
    */
    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}
