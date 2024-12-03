<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Basket;
use App\Models\OrderItems;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function upload(Request $request)
    {
        $basketItems = Basket::with('dish')->where('user_id', Auth::id())->get();

        if ($basketItems->isEmpty()) {
            return redirect()->back();
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'address' => $request->address
        ]);

        foreach ($basketItems as $basketItem) {
            $existingItem = OrderItems::where('order_id', $order->id)
                                     ->where('dish_id', $basketItem->dish->id)
                                     ->first();

            if ($existingItem) {
                $existingItem->quantity += 1;
                $existingItem->save();
            } else {
                OrderItems::create([
                    'order_id' => $order->id,
                    'dish_id' => $basketItem->dish->id,
                    'quantity' => 1,
                    'price' => $basketItem->dish->price,
                ]);
            }
        }

        Basket::where('user_id', Auth::id())->delete();

        return view('order');
    }

}
