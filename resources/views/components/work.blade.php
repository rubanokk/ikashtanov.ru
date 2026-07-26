<section class="flex flex-col lg:flex-row justify-between gap-8 border-t border-woodsmoke-800 p-4 lg:p-8">
    <div class="">
        <h2 class="text-2xl lg:text-2xl text-white">
            {{ $title }}
        </h2>
        <div class="mt-4 lg:mt-8 max-w-3xl">
            {{ $slot }}
        </div>

        <a href="https://{{ $link }}" target="_blank"
            class="block mt-8 text-indigo-600 font-mono">{{ $link }}</a>
    </div>

    <div class="w-full lg:max-w-150 lg:min-w-150 flex justify-center items-center">
        <img src="/portfolio/{{ $image }}" class="" width="{{ $imageWidth }}"
        alt="">
    
</section>
