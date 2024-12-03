<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <div class="main">
        <div class="container">
            <div class="okno">
                <h1 class="zag">Панель администратора</h1>
                <div class="ssulki">
                    <a href="{{ route('admin.category') }}" class="verh">Категории</a>
                    <a href="{{ route('admin.menu') }}" class="verh">Меню</a>
                    <a href="{{ route('admin.orders') }}" class="verh orange">История заказов</a>
                </div>
                <hr class="mb-4">

                <div class="w-full">
                    @foreach ($orders as $order)
                        <div class="zakaz">
                            <h2 class="kogda">Заказ № {{ $order->id }}</h2>
                            <div class="stroki">
                                <!-- Состав заказа (перечисление продуктов) -->
                                <div class="stroka">
                                    <span class="micro">состав: </span>
                                    <span class="text">
                                        @foreach ($order->items as $item)
                                            {{ $item->dish->name }} (x{{ $item->quantity }})@if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </span>
                                </div>
                                <!-- Адрес -->
                                <div class="stroka">
                                    <span class="micro">адрес:</span>
                                    <span class="text">{{ $order->address }}</span>
                                </div>
                                <!-- Адрес -->
                                <div class="stroka">
                                    <span class="micro">Пользователь: </span>
                                    <span class="text">{{ $order->user->name }} {{ $order->user->surname }}
                                        {{ $order->user->phone }}</span>
                                </div>
                                <!-- Общая цена -->
                                <div class="stroka">
                                    <span class="micro">цена:</span>
                                    <span class="text">
                                        {{ $order->items->sum(function ($item) {
                                            return $item->price * $item->quantity;
                                        }) }}
                                        р.
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
