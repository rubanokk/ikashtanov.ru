@php
    $items = [
        [
            'title' => 'Посадочная страница, сайт-визитка, от 7 дней',
            'price' => 'от 70 000 ₽',
        ],
        [
            'title' => 'Интернет-магазин, корпоративный сайт, от 20 дней',
            'price' => 'от 120 000 ₽',
        ],
        [
            'title' => 'Мобильное приложение, индивидуальная разработка',
            'price' => 'Цена по запросу',
        ],
    ];
@endphp

<div id="price" class="px-4 lg:px-0">
    <div class="grid lg:grid-cols-[1fr_600px_1fr] items-center mt-10 lg:mt-20">
        <div class="relative hidden lg:block">
            <div class="h-px w-full bg-[#8AC6FD]"></div>
            <div class="absolute right-0 -top-1.5 w-3 h-3 bg-[#8AC6FD] rounded-full"></div>
        </div>
        <h3 class="text-3xl lg:text-4xl lg:text-center">Стоимость и сроки</h3>
        <div class="relative hidden lg:block">
            <div class="h-px w-full bg-[#8AC6FD]"></div>
            <div class="absolute left-0 -top-1.5 w-3 h-3 bg-[#8AC6FD] rounded-full"></div>
        </div>
    </div>
        <div class="grid lg:grid-cols-3 gap-8 max-w-350 mx-auto py-12 lg:py-18 bg-[url('/public/images/bg-price.png')] bg-no-repeat bg-bottom">
            @foreach ($items as $item)
                <x-price-item :item="$item"></x-price-item>
            @endforeach
        </div>
</div>
