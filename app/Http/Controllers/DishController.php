<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{Category, Dish};
use Illuminate\Support\Facades\Storage;


class DishController extends Controller
{
    /*
    * Открытие главной страницы
    */
    public function index() {
        return view('index', [
            'categories' => Category::with(['dishes' => function($query) {
                $query->where('is_visible', 1);
            }])->get(),
        ]);
    }


    /*
    * Открытие старницы редактирования
    */
    public function updateIndex($id) {
        return view('admin.update', [
            'dish' => Dish::findOrFail($id),
            'categories' => Category::all()
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

        $dishes = Dish::where('name', 'like', '%' . $validated['search'] . '%')
                      ->where('is_visible', 1)
                      ->get();

        return view('search', [
            'dishes' => $dishes,
        ]);
    }


    /*
    * Удаление товара
    */
    public function delete($id) {
        $dish = Dish::findOrFail($id);
        $dish->is_visible = !$dish->is_visible;
        $dish->save();
        return redirect()->back();
    }

    /*
    * Обновление товара
    */
    public function update($id, Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        $dish = Dish::findOrFail($id);

        $photoPath = $dish->image;
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            if ($dish->image) {
                Storage::disk('public')->delete($dish->image);
            }

            $randomFileName = Str::random(20) . '.' . $request->file('photo')->getClientOriginalExtension();
            $photoPath = $request->file('photo')->storeAs('photos', $randomFileName, 'public');
        }

        $dish->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $photoPath,
            'category_id' => $request->category,
            'price' => $validated['price'],
        ]);

        return redirect()->back();
    }

}
