<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/account.css') }}">
    <div class="main">
        <div class="container">
            <div class="okno">
                <h1 class="zag">Личный кабинет</h1>
                <div class="ssulki">
                    <a href="{{ route('profile.index') }}" class="verh orange">Личные данные</a>
                    <a href="{{ route('profile.history') }}" class="verh">История заказов</a>
                </div>
                <hr>
                <div class="stroki">
                    <div class="stroka">
                        <div class="kir">
                            <label>Телефон</label>
                        </div>
                        <div class="kir">
                            <input type="tel" id="phone "name="tel" class="tel"
                                value ="{{ Auth::user()->phone }}" disabled>
                        </div>
                    </div>
                    <div class="stroka">
                        <div class="kir">
                            <label>Телефон</label>
                        </div>
                        <div class="kir">
                            <input type="email" id="email" name="email" class="tel"
                                value ="{{ Auth::user()->email }}" disabled>
                        </div>
                    </div>
                    <div class="stroka">
                        <div class="kir">
                            <label>Дата рождения</label>
                        </div>
                        <div class="kir">
                            <input type="text" name="data" class="data"
                                value="{{ \Carbon\Carbon::parse(Auth::user()->birthday)->format('Y-m-d') }}" disabled>
                        </div>
                    </div>

                    <div class="stroka">
                        <div class="kir">
                            <label>Имя</label>
                        </div>
                        <div class="kir">
                            <input type="text" name="name" class="name" value= "{{ Auth::user()->name }}"
                                disabled>
                        </div>
                    </div>
                    <div class="stroka">
                        <div class="kir">
                            <label>Фамилия</label>
                        </div>
                        <div class="kir">
                            <input type="text" name="sur" class="sur" value= "{{ Auth::user()->surname }}"
                                disabled>
                        </div>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="but">ВЫЙТИ</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
