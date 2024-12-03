<div class="container">
    <div class="header">
        <div class="blok"><a href="{{ route('index') }}"><img src="{{ asset('media/logo_sushi.png') }}" alt="Suzya_Sishi"
                    class="logotip_sushi"></a></div>
        <div class="blok er-1">
            <span class="blue">Ваш город Иркутск</span> <span class="blue">+7 (800) 100-10-10</span>
        </div>
        <div class="blok er-3">
            <form action="{{ route('search') }}" method="POST" style="display: flex; width: 100%; gap: 5px">
                @csrf
                <input type="text" id="search-input" name="search" class="search" placeholder= "Поиск..." required>
                <button type="submit" id="search-button"><img src="{{ asset('media/lupka.png') }}" alt="Поиск"
                        class="lupka"></button>
            </form>
        </div>
        <div class="blok er-1">
            <span class="blue" style="align-self: center;">Бесплатная доставка</span> <span class="blue"
                style="align-self: center;">от 500 рублей!</span>
        </div>
        <div class="blok">
            <a href="{{ route('profile.index') }}"><img src="{{ asset('media/man.svg') }}" alt="Личный кабинет"
                    class="header-icons"></a>
            @auth
                <a href="{{ route('basket.index') }}"><img src="{{ asset('media/basket.svg') }}" alt="Корзина"
                        class="header-icons"></a>
            @endauth
        </div>
    </div>
</div>
<div class="container">
    <div class="nav">
        <nav class="nav-scroller">
            @if (!empty($categories))
                @foreach ($categories as $category)
                    <a class="link-nav" href="/#{{ $category->id }}">{{ $category->name }}</a>
                @endforeach
            @endif
        </nav>
        <div class="flex flex-row" style="gap: 5px;">
            @if (Auth::user() && Auth::user()->is_admin == 1)
                <a href="{{ route('admin.category') }}" class="o_nas">Админка</a>
            @endif
            <a href="{{ route('about') }}" class="o_nas">О НАС</a>
        </div>
    </div>
</div>
