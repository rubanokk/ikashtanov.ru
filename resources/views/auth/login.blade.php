@extends('layouts.web')

@section('title', 'Вход')
@section('description', 'Вход на сайт')

@section('content')
    <div class="max-w-md mx-auto mt-16 px-4 lg:px-0">
        {{-- <div class="inline-flex gap-6 border-b border-black font-bold text-lg">
            <div class="py-2 border-b-2 border-black">{{ __('Вход') }}</div>
            @if (Route::has('register'))
                <a href="/register" class="py-2">{{ __('Регистрация') }}</a>
            @endif
        </div> --}}

        <div class="flex justify-center mt-6 mb-4 text-lg font-semibold cursor-pointer overflow-x-scroll lg:overflow-auto">
            <div  class="px-4 py-1 border-b-2 border-black">
                {{ __('Вход') }}
            </div>

            <div  class="px-4 py-1 border-b">
                @if (Route::has('register'))
                    <a href="/register" class="">{{ __('Регистрация') }}</a>
                @endif
            </div>
        </div>

        <form method="POST" action="{{ route('login') }}" class="mt-6">
            @csrf

            <label for="email" class="">{{ __('Электронная почта') }}</label>

            <input id="email" type="email" class="input mt-1 @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password" class="mt-4 block">{{ __('Пароль') }}</label>

            <input id="password" type="password" class="input mt-1 @error('password') is-invalid @enderror" name="password"
                required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            <div class="mt-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Запомнить меня') }}
                </label>
            </div>


            <button type="submit" class="btn mt-4 w-full">
                {{ __('Войти') }}
            </button>

            {{-- <div class="text-center mt-6">

                <div class="">Войти через</div>
                <div class="flex justify-center mt-1">
                    <a href="{{ route('vkontakte.redirect') }}"
                        class="flex items-center justify-center bg-[#07F] text-white w-9 h-9 rounded-lg">
                        <svg class="h-6 w-6">
                            <use xlink:href="#icon-vk" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                    </a>
                </div>
            </div> --}}

            @if (Route::has('password.request'))
                <div class="text-center mt-2">
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('Забыли пароль?') }}
                    </a>
                </div>
            @endif

        </form>
    @endsection
