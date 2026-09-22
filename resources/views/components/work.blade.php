<section class="">
    <img src="/portfolio/{{ $image }}" class="rounded-xl w-full" alt="">
    
    <h2 class="text-2xl lg:text-2xl mt-2 lg:mt-6">
        {{ $title }}
    </h2>

    <div class="mt-2">
        {{ $slot }}
    </div>

    <a href="https://{{ $link }}" target="_blank" class="link mt-2">{{ $link }}</a>
</section>