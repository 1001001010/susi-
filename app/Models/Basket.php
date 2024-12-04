<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable = ['user_id', 'dishes_id'];

    /*
    * Связь с моделью User
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    * Связь с моделью Dish
    */
    public function dish()
    {
        return $this->belongsTo(Dish::class, 'dishes_id');
    }
}
