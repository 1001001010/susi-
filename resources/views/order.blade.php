<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/congrat.css') }}">
    <div class="main">
        <div class="container">
            <div class="okno">
                <div class="stroki">
                    <h1 class="zag">Заказ оформлен!</h1>
                    <div class="stroka">
                        <h2 class="text">
                            Курьер свяжется с вами за 20 минут до прибытия к вам
                        </h2>
                    </div>
                    <div class="stroka">
                        <a href="{{ route('index') }}" class="but">
                            На главную
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
