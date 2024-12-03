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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function baskets()
    {
        return $this->hasMany(Basket::class, 'dishes_id');
    }
}
