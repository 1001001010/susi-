<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/log_in.css') }}">

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="main">
            <div class="container">
                <div class="okno">
                    <div class="stroki">
                        <div class="stroka">
                            <div class="kir">
                                <label
                                    style="font-size:22px; display: flex; justify-content: center; align-items: center; text-align: center;">Вход</label>
                            </div>
                            <div class="kir">
                                <input type="email" id="email" name="email" class="tel" required
                                    placeholder="Email"><br>
                            </div>
                            <div class="kir">
                                <input type="password" id="password" name="password" class="tel" minlength="8"
                                    required placeholder="Пароль"><br>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: center;">
                        <a href="{{ route('register') }}"
                            style="color:rgb(254, 65, 17); margin:10px;">Зарегистрироваться</a>
                    </div>
                    <input type="submit" value="ВОЙТИ" name="button" class="but">
                </div>
            </div> <!-- контейнер -->
        </div>
    </form>
</x-app-layout>
