<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'address'];

    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}