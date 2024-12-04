<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\{Order};

class ProfileController extends Controller
{
    /**
     * Отображение профиля
     */
    public function index(Request $request): View
    {
        return view('profile', [
            'user' => $request->user()
        ]);
    }

    /**
     * Отображение истории заказов
     */
    public function history(Request $request): View
    {
        return view('history', [
            'user' => $request->user(),
            'orders' => Order::with(['user', 'items.dish'])->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Измененние данных пользователя
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

}
