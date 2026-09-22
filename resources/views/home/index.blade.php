@extends('layouts.web')

@section('title', 'Разработка сайтов, мобильных приложений и ПО на заказ — Студия Каштанова')
@section('description', 'Услуги по разработке на заказ программного обеспечения (ПО) и созданию технически сложных веб и
мобильных решений для бизнеса от профессионалов студии Каштанова')

@section('content')
<div class="-t-30 h-100 lg:h-170 bg-[url('/public/images/bg.png')] bg-no-repeat bg-cover bg-left flex flex-col justify-center gap-6">

    <h1 class="text-4xl lg:text-6xl  text-center">
        <span class="text-[#8AC6FD]">Разработка программного</span><br />обеспечения на&nbsp;заказ
    </h1>

    <p class="lg:text-xl text-center lg:max-w-175 mx-auto px-4">
        Помогаем бизнесу реализовывать амбициозные проекты, используя современные подходы и технологии.
    </p>

    <!-- <div
        class="mt-4 js-toggle-form items-center justify-center cursor-pointer transition-colors text-center inline-flex bg-[#f53] text-white px-6 py-2.5 text-14 rounded-lg">
        Обсудить проект
    </div> -->
</div>
<x-why-we></x-why-we>
<x-price></x-price>
<x-works-list></x-works-list>
@endsection