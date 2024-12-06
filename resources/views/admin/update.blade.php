<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <div class="main">
        <div class="container">
            <div class="okno">
                <h1 class="zag">Панель администратора</h1>
                <div class="flex w-full justify-between">
                    <form class="kir w-full flex flex-col justify-center items-center py-5"
                        action="{{ route('dish.update', [$dish->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <h3 class="text-center pb-4">Редактирование {{ $dish->name }}</h3>
                        <input type="text" id="name" name="name" required placeholder="Название"
                            value="{{ $dish->name }}"><br>
                        <textarea name="description" placeholder="Описание">{{ $dish->description }}</textarea><br>
                        <input type="file" name="photo" id="photo"><br>
                        <select name="category" id="category">
                            <option value="">Категория</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $dish->category_id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select><br>
                        <input type="number" name="price" value="{{ $dish->price }}" id="price"
                            placeholder="Цена"><br>
                        <button class="w-min" type="submit">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
