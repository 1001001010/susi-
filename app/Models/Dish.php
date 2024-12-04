<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'category_id',
        'price'
    ];

    /*
    * Связь с моделью Category
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*
    * Связь с моделью Basket
    */
    public function baskets()
    {
        return $this->hasMany(Basket::class, 'dishes_id');
    }
}
