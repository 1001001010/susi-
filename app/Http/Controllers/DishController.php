<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{Category, Dish};

class DishController extends Controller
{
    /*
    * Открытие главной страницы
    */
    public function index() {
        return view('index', [
            'categories' => Category::with('dishes')->get(),
        ]);
    }

    /*
    * Добавление блюда
    */
    public function upload(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
            'price' => 'required|numeric|min:0',
        ]);


        $photoPath = null;
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $randomFileName = Str::random(20) . '.' . $request->file('photo')->getClientOriginalExtension();
            $photoPath = $request->file('photo')->storeAs('photos', $randomFileName, 'public');
        }

        Dish::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $photoPath,
            'category_id' => $request->category,
            'price' => $validated['price'],
        ]);

        return redirect()->back();
    }

    /*
    * Поиск по ключевому слову
    */
    public function search(Request $request) {
        $validated = $request->validate([
            'search' => 'required|string|max:255',
        ]);

        return view('search', [
            'dishes' => Dish::where('name', 'like', '%' . $validated['search'] . '%')->get()
        ]);
    }
}
