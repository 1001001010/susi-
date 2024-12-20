<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'birthday',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /*
    * Связь с моделью Basket
    */
    public function baskets()
    {
        return $this->hasMany(Basket::class);
    }

    /*
    * Связь с моделью Category
    */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
