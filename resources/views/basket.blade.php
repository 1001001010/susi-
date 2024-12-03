<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/basket.css') }}">
    <div class="main">
        <div class="container">
            <div class="okno">
                <h1 class="zag">Корзина</h1>
                <hr>
                @if ($items->count())
                    <div class="twix">
                        <div class="levo">
                            <h2 class="mini_zag">Состав заказа</h2>
                            @foreach ($items as $item)
                                <div class="zakaz">
                                    <div class="fotka">
                                        <img src="{{ asset('storage/' . $item->dish->image) }}" alt="Ваши роллы"
                                            class="pic">
                                    </div>
                                    <div class="dicrab">
                                        <div class="disc">
                                            <h3 class="h3">{{ $item->dish->name }}</h3>
                                        </div>
                                        <div class="disc ots">
                                            <p class="opisanie">{{ $item->dish->description }}</p>
                                        </div>
                                        <div class="disc bok ots">
                                            <span class="cena" style="border: 1px solid rgb(254, 65, 17);padding:3px">
                                                {{ $item->dish->price }} р.</span>
                                            <form action="{{ route('basket.delete') }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="text" name="position_id" id="position_id"
                                                    value="{{ $item->id }}" style="display: none">
                                                <button class="remove">Удалить</button>
                                            </form>
                                            {{-- <a class="remove" href="">Удалить</a> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="pravo">
                            <h2 class="mini_zag">Оформление заказа</h2>
                            <form action="{{ route('order.upload') }}" method="POST">
                                @csrf
                                <div class="stroki">
                                    <div class="stroka">
                                        <label class="text">Адрес</label>
                                        <input type="text" id="address" name="address" class="add" required
                                            value="ул. 1-ая Советская, д. 1, кв. 10">
                                    </div>
                                </div>
                                <div class="stroka-btn flex">
                                    <span class="text">Общая стоимость: {{ $summ }} р.</span>
                                </div>
                                <input type="submit" value="ПРОДОЛЖИТЬ" name="delivery_method" class="but">
                            </form>
                        </div>
                    </div>
                @else
                    <p>В корзине нет товаров</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
