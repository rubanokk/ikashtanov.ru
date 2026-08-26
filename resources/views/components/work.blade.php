<section class="">
    <img src="/portfolio/{{ $image }}" class="rounded w-full" alt="">
    
    <h2 class="text-2xl lg:text-2xl mt-6">
        {{ $title }}
    </h2>

    <div class="mt-4 lg:mt-4 max-w-3xl text-base">
        {{ $slot }}
    </div>

    <a href="https://{{ $link }}" target="_blank" class="link mt-4 ">{{ $link }}</a>
</section>