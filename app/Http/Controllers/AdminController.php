<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Dish, Order, OrderItems};


class AdminController extends Controller
{
    public function category() {
        return view('admin.category', [
            'categories' => Category::all()
        ]);
    }

    public function menu() {
        return view('admin.menu', [
            'categories' => Category::all(),
            'menu' => Dish::all()
        ]);
    }

    public function orders() {
        $orders = Order::with(['user', 'items.dish'])->orderBy('created_at', 'desc')->get();

        return view('admin.orders', [
            'orders' => $orders,
        ]);
    }
}
