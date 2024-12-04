<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'address'];

    /*
    * Связь с моделью OrderItems
    */
    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }

    /*
    * Связь с моделью User
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
