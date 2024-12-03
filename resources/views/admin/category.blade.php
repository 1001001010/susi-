<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <div class="main">
        <div class="container">
            <div class="okno">
                <h1 class="zag">Панель администратора</h1>
                <div class="ssulki">
                    <a href="{{ route('admin.category') }}" class="verh orange">Категории</a>
                    <a href="{{ route('admin.menu') }}" class="verh">Меню</a>
                    <a href="{{ route('admin.orders') }}" class="verh">История заказов</a>
                </div>
                <hr class="mb-4">

                <div class="flex w-full justify-between">
                    <div class="w-1/2">
                        <h3 class="text-center mb-4">Категории</h3>
                        @if ($categories->count())
                            @foreach ($categories as $category)
                                <div class="zakaz">
                                    <h3 class="text-center p-4">{{ $category->name }}</h3>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center">Нет категорий</p>
                        @endif
                    </div>
                    <div class="w-1/2">
                        <h3 class="text-center">Добавить категории</h3>
                        <form class="kir w-full flex flex-col justify-center items-center  py-5"
                            action="{{ route('category.upload') }}" method="POST">
                            @csrf
                            <input type="text" id="name" name="name" required
                                placeholder="Название категории"><br>
                            <button class="w-min" type="submit">Добавить</button>
                        </form>
                    </div>
                </div>
            </div> <!-- контейнер -->
        </div>
    </div>
</x-app-layout>
