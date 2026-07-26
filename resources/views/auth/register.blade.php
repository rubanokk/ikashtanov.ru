@extends('layouts.web')

@section('title', 'Регистрация')
@section('description', 'Зарегистрироваться на сайте')

@section('content')
    {{-- {!! NoCaptcha::renderJs('ru') !!} --}}
    <div class="max-w-md mx-auto mt-16 px-4 lg:px-0">

        @if ($errors->has('g-recaptcha-response'))
            <span class="help-block">
                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
            </span>
        @endif

        <div class="flex justify-center mt-6 mb-4 text-lg font-semibold cursor-pointer overflow-x-scroll lg:overflow-auto">
            <a href="/login" class="px-4 py-1 border-b">
                {{ __('Вход') }}
            </a>

            <div class="px-4 py-1 border-b-2 border-black">
                <a href="/register" class="">{{ __('Регистрация') }}</a>
            </div>
        </div>

        <form method="POST" action="{{ route('register') }}" id="register-form" class="mt-6">
            @csrf

            <label for="name" class="">{{ __('Имя') }}</label>

            <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            <label for="email" class="mt-4 block">{{ __('Электронная почта') }}</label>

            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password" class="mt-4 block">{{ __('Пароль') }}</label>

            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password"
                required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password-confirm" class="block mt-4">{{ __('Пароль еще раз') }}</label>

            <input id="password-confirm" type="password" class="input" name="password_confirmation" required
                autocomplete="new-password">

            <input type="submit" value="Зарегистрироваться">
            {{-- <div class="w-full mt-6">
                {!! NoCaptcha::displaySubmit('register-form', 'Зарегистрироваться') !!}
            </div> --}}
            {{-- {!! NoCaptcha::displaySubmit('my-form-id', 'submit now!', ['data-theme' => 'dark']) !!} --}}
            {{-- {!! NoCaptcha::display(['data-theme' => 'dark']) !!} --}}

            {{-- <button type="submit" class="btn w-full mt-6">
                {{ __('Зарегистрироваться') }}
            </button> --}}

        </form>
    </div>
@endsection
