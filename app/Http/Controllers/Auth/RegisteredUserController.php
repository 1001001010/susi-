<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10', 'max:12', 'regex:/^\+?[0-9]{10,12}$/'],
            'birthday' => ['required', 'date', 'before:today'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.required' => 'Имя обязательно для заполнения.',
            'surname.required' => 'Фамилия обязательна для заполнения.',
            'phone.required' => 'Телефон обязателен для заполнения.',
            'phone.regex' => 'Телефон должен содержать только цифры и, при необходимости, начинаться с +.',
            'phone.min' => 'Телефон должен содержать минимум 10 символов.',
            'phone.max' => 'Телефон не может превышать 12 символов.',
            'email.required' => 'Email обязателен для заполнения.',
            'email.email' => 'Введите корректный email.',
            'email.unique' => 'Этот email уже занят.',
            'password.required' => 'Пароль обязателен для заполнения.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
            'password.confirmed' => 'Пароли не совпадают.',
            'birthday.required' => 'Дата рождения обязательна для заполнения.',
            'birthday.date' => 'Введите корректную дату.',
            'birthday.before' => 'Дата рождения не может быть в будущем.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'birthday' => Carbon::parse($request->birthday),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('profile.index', absolute: false));
    }
}
