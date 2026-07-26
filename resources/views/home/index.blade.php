@extends('layouts.web')

@section('title', 'Студия Каштанова')
@section('description', 'Разработка сайтов, интернет-магазинов и мобильных приложений')

@section('content')
    <div class="hero text-center border-b border-woodsmoke-800">
        <div class="container mx-auto px-5 lg:px-10 py-23 md:py-40 lg:border-x border-woodsmoke-800 relative">
            <h1 class="text-white text-3xl lg:text-5xl max-w-2xl mx-auto">
                Разработка сайтов и&nbsp;мобильных приложений
            </h1>

            <p class="text-16 lg:text-18 text-woodsmoke-200 max-w-2xl sm:px-2.5 mx-auto mt-5 lg:mt-3 mb-8 leading-7">
                10 лет разрабатываем программное обеспечение. Умеем считать метрики.
            </p>

            <div class="flex flex-row justify-center gap-4 lg:gap-6 relative">
                <div class="js-toggle-form items-center justify-center cursor-pointer transition-colors text-center uppercase inline-flex bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 text-white font-mono px-6 py-2.5 text-14 rounded">
                    Обсудить проект
            </div>
            </div>

            <div
                class="bg-[url('../images/hero-bg.webp')] bg-position-[60%] md:bg-top bg-cover absolute inset-0 pointer-events-none -z-1">
            </div>
        </div>
    </div>

    <x-why-we></x-why-we>
    <x-price></x-price>
    <x-works-list></x-works-list>
@endsection
