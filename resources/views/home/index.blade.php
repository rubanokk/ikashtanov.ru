@extends('layouts.web')

@section('title', 'Разработка сайтов, мобильных приложений и ПО на заказ — Студия Каштанова')
@section('description', 'Услуги по разработке на заказ программного обеспечения (ПО) и созданию технически сложных веб и
мобильных решений для бизнеса от профессионалов студии Каштанова')

@section('content')
<div class="max-w-440 mx-auto lg:px-16 px-4">

    <h1 class="text-5xl lg:text-6xl mt-30 lg:mt-45">
        Разработка программного<br />обеспечения на&nbsp;заказ
    </h1>

    <p class="lg:max-w-[80%] text-xl mt-12">
        Студия Каштанова — компания по разработке программных продуктов. Помогаем бизнесу реализовывать амбициозные
        проекты, используя современные подходы и технологии. 
    </p>

    <div
        class="mt-4 js-toggle-form items-center justify-center cursor-pointer transition-colors text-center inline-flex bg-[#f53] text-white px-6 py-2.5 text-14 rounded-lg">
        Обсудить проект
    </div>

    <x-why-we></x-why-we>
    <x-price></x-price>
    <x-works-list></x-works-list>
</div>
@endsection