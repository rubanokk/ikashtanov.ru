@extends('layouts.web')

@section('title', 'Журнал студии Каштанова')
@section('description', 'Медиа о разработке, веб-дизайне')

@section('content')
    <h1 class="text-6xl lg:text-8xl px-4 lg:px-8 mb-8">Журнал</h1>
    @each('posts/post', $posts, 'post')
@endsection
