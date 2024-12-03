<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <div class="main">
        <div class="container">
            <div class="okno">
                <h1 class="zag">Панель администратора</h1>
                <div class="ssulki">
                    <a href="{{ route('admin.category') }}" class="verh">Категории</a>
                    <a href="{{ route('admin.menu') }}" class="verh orange">Меню</a>
                    <a href="{{ route('admin.orders') }}" class="verh">История заказов</a>
                </div>
                <hr class="mb-4">

                <div class="flex w-full justify-between">
                    <form class="kir w-full flex flex-col justify-center items-center py-5"
                        action="{{ route('dish.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h3 class="text-center pb-4">Добавление продукта</h3>
                        <input type="text" id="name" name="name" required placeholder="Название"><br>
                        <textarea name="description" placeholder="Описание"></textarea><br>
                        <input type="file" name="photo" id="photo"><br>
                        <select name="category" id="category">
                            <option value="">Категория</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select><br>
                        <input type="number" name="price" id="price" placeholder="Цена"><br>
                        <button class="w-min" type="submit">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
