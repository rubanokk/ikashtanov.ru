@extends('layouts.web')

@section('title', 'Разработка, сайтов, мобильных приложений и ПО на заказ — Студия Каштанова')
@section('description', 'Услуги по разработке на заказ программного обеспечения (ПО) и созданию технически сложных веб и
мобильных решений для бизнеса от профессионалов студии Каштанова')

@section('content')

<h1 class="text-3xl lg:text-6xl mt-45">
    Разработка программного<br />обеспечения на заказ
</h1>

<p class="max-w-[80%] text-xl mt-12">
    Студия Каштанова — компания по разработке программных продуктов. Помогаем бизнесу реализовывать амбициозные проекты,
    используя современные подходы и технологии. Сотрудничаем с корпорациями и стартапами, делаем open source и выступаем
    на главных IT-конференциях.
</p>

<div
    class="mt-4 js-toggle-form items-center justify-center cursor-pointer transition-colors text-center uppercase inline-flex bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 text-white font-mono px-6 py-2.5 text-14 rounded">
    Обсудить проект
</div>

<x-why-we></x-why-we>
<x-price></x-price>
<x-works-list></x-works-list>
@endsection