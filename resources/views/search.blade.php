<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
    <div class="main">
        <div class="container">
            <div class="reklama">
                <img src="media/banner.jpg" alt="Suzya_Sushi" class="banner">
            </div>

            <div class="items">
                @foreach ($dishes as $item)
                    <div class="item">
                        <div class="i-blok ir-2">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="rolls&sushi" class="blok_img">
                        </div>
                        <div class="i-blok ir-3">
                            <span class="f-24">{{ $item->name }}</span><span class="f70-14"></span>
                        </div>
                        <div class="i-blok ir-4">
                            <span class="f70-14">{{ $item->description }}</span>
                        </div>
                        <div class="i-blok ir-4 flex justify-between">
                            <span class="f-24">{{ $item->price }} р.</span>
                            <form action="{{ route('basket.upload') }}" method="POST">
                                @csrf
                                <input type="text" name="id" style="display: none" value="{{ $item->id }}">
                                <button class="plus"><img src="{{ asset('media/plus.svg') }}" alt="Добавить"></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
