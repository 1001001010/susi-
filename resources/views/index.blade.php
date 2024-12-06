<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
    <div class="main">
        <div class="container">
            <div class="reklama">
                <img src="media/banner.jpg" alt="Suzya_Sushi" class="banner">
            </div>
            @foreach ($categories as $category)
                <div class="slot">
                    <h1 class="zag" id="{{ $category->id }}">{{ $category->name }}</h1>
                    <div class="items">
                        @foreach ($category->dishes as $item)
                            <div class="item">
                                <div class="i-blok ir-2">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="rolls&sushi"
                                        class="blok_img">
                                </div>
                                <div class="i-blok ir-3">
                                    <span class="f-24">{{ $item->name }}</span><span class="f70-14"></span>
                                </div>
                                <div class="i-blok ir-4">
                                    <span class="f70-14">{{ $item->description }}</span>
                                </div>
                                <div class="i-blok ir-4 flex justify-between">
                                    <span class="f-24">{{ $item->price }} р.</span>
                                    <div class="flex gap-2">

                                        <a href="{{ route('dish.updateIndex', [$item->id]) }}">
                                            <button class="plus" type="submit">
                                                <svg class="h-5 w-5 text-svg" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                                                </svg>
                                            </button>
                                        </a>
                                        <form action="{{ route('dish.delete', [$item->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="plus" type="submit">
                                                <svg class="h-5 w-5 text-svg" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>

                                        <form action="{{ route('basket.upload') }}" method="POST">
                                            @csrf
                                            <input type="text" name="id" style="display: none"
                                                value="{{ $item->id }}">
                                            <button class="plus"><img src="{{ asset('media/plus.svg') }}"
                                                    alt="Добавить"></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
