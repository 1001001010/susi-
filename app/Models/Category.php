<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    /*
    * Связь с моделью Dish
    */
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }
}
