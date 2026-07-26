<a href="{{ LaravelLocalization::localizeUrl('/posts/' . $post->slug) }}" class="block py-6 lg:py-8 px-4 lg:px-8 border-t border-t-[#252525]">
    @if ($post->preview)
        <img src="{{ $post->preview }} " alt="">
    @endif
    <div class="text-xl lg:text-2xl">
        {{ $post->title }}
    </div>
</a>
