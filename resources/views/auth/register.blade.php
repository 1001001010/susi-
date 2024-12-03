<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/registration.css') }}">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="main">
            <div class="container">
                <div class="okno">
                    <h1 class="zag">Регистрация</h1>
                    <form action="registr.php" method="post">
                        <div class="stroki-1">
                            <div class="stroka">
                                <div class="kir">
                                    <label>Почта</label>
                                </div>
                                <div class="kir">
                                    <input type="text" name="email" class="sur" placeholder= "email" required>
                                </div>
                                @error('email')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="stroka">
                                <div class="kir">
                                    <label>Фамилия</label>
                                </div>
                                <div class="kir">
                                    <input type="text" name="surname" class="sur" placeholder= "Аркашьевич"
                                        required>
                                </div>
                                @error('surname')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="stroka">
                                <div class="kir">
                                    <label>Ваша дата рождения</label>
                                </div>
                                <div class="kir">
                                    <input type="date" name="birthday" class="data" required min="1924-01-01"
                                        max="2018-01-01">
                                </div>
                                @error('birthday')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="stroka">
                                <div class="kir">
                                    <label>Имя</label>
                                </div>
                                <div class="kir">
                                    <input type="text" name="name" class="name" placeholder= "Аркаша" required>
                                </div>
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="stroka">
                                <div class="kir">
                                    <label>Ваш номер телефона</label>
                                </div>
                                <div class="kir">
                                    <input type="tel" id="phone" name="phone" class="tel" required
                                        value="+7" maxlength="12" minlength="12">
                                </div>
                                @error('phone')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="stroki-2">
                            <div class="stroka">
                                <div class="kir">
                                    <label>Пароль</label>
                                </div>
                                <div class="kir">
                                    <input type="password" id="password" name="password" class="tel" required
                                        minlength="8" placeholder="Пароль">
                                </div>
                                @error('password')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="stroka">
                                <div class="kir">
                                    <label>Подтверждение пароля</label>
                                </div>
                                <div class="kir">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="tel" placeholder="Подтверждение пароля" required minlength="8">
                                </div>
                                @error('password_confirmation')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <a href="{{ route('login') }}"
                            style="color:rgb(254, 65, 17);display:flex;justify-content:center">
                            Авторизоваться</a>
                        <input type="submit" value="ПРОДОЛЖИТЬ" name="button" class="but">
                    </form>
                </div>
            </div> <!-- контейнер -->
        </div>
        {{-- <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div> --}}
    </form>
</x-app-layout>
