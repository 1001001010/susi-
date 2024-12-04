<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use Auth;

class BasketController extends Controller
{
    /*
    * Открытие корзины
    */
    public function index() {
        $basketItems = Basket::with('dish')->where('user_id', Auth::id())->get();

        $summ = 0;
        foreach ($basketItems as $basketItem) {
            $summ += $basketItem->dish->price;
        }
        return view('basket', [
            'items' => $basketItems,
            'summ' => $summ
        ]);
    }

    /*
    * Добавление товара в корзину
    */
    public function upload(Request $request) {
        $validate = $request->validate([
            'id' => 'required|integer|min:1',
        ]);

        Basket::create([
            'user_id' => Auth::id(),
            'dishes_id' => $request->id
        ]);

        return redirect()->back();
    }

    /*
    * Удаление товара из корзины
    */
    public function delete(Request $request) {
        Basket::where('id', $request->position_id)->delete();

        return redirect()->back();
    }
}
