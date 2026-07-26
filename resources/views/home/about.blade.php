@extends('layouts.web')

@section('title', 'Студия')
@section('description', 'О студии Каштанова')

@section('content')
    <div class="px-4 lg:px-8">
        <h1 class="text-4xl lg:text-7xl mt-10">Студия</h1>
        <div class=" max-w-4xl mt-10">

                <div class="text-xl lg:text-3xl">
                    Мы начались как студия разработки в Сыктывкаре в 2016 году с двух человек. Сегодня это 8 профессионалов в       своей сфере.
                </div>
                <div class="text-xl lg:text-3xl mt-6">
                    Разрабатываем, поддерживаем
                    и продвигаем корпоративные и промо-сайты, порталы,
                    e-commerce и web-системы.
                </div>
                <div class="text-xl lg:text-3xl mt-6">
                    Дизайн и технологии — лишь инструменты для решения бизнес-задач. Результат нашей работы — это продукт,
                    сделанный вовремя и в рамках ожиданий заказчика.
                </div>
                <img src="/kashtanov.jpg" class="max-w-32 rounded-full mt-8" alt="">
                <div class="text-xl mt-2 mb-20">Илья&nbsp;Каштанов</div>

        </div>
    </div>
@endsection
