@php
    $items = [
        [
            'image' => '4.svg',
            'title' => 'Посадочная страница',
            'text' => 'Быстрый способ привлечения потенциальных клиентов',
            'price' => 'от 35 000 ₽',
            'period' => 'от 7 дней',
        ],
        [
            'image' => '5.svg',
            'title' => 'Корпоративный сайт',
            'text' => 'Все что нужно для компании — от блога до лидогенерации',
            'price' => 'от 100 000 ₽',
            'period' => 'от 20 дней',
        ],
        [
            'image' => '6.svg',
            'title' => 'Интернет-магазин',
            'text' => 'Собственная платформа как дополнение или замена маркетплейсам',
            'price' => 'Цена по запросу',
            'period' => 'от 35 дней',
        ],
    ];
@endphp

<div id="price">
        <div class="mt-36">
            <h3 class="text-4xl lg:text-4xl">Стоимость и сроки</h3>
        </div>
        <p class="max-w-[80%] text-xl mt-8">
            Все что нужно для компании — от блога и лидогенерации до собственнгого интернет-магазина и мобильного приложения.
        </p>

        <div class="grid lg:grid-cols-3 gap-14 mt-8">
            @foreach ($items as $item)
                <x-price-item :item="$item"></x-price-item>
            @endforeach
        </div>
</div>
