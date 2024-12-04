<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /*
    * Добавление категорий
    */
    public function upload(Request $request) {
        $validate = $request->validate([
            'name' => 'required|string|min:1',
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->back();
    }
}
