    <div class="flex flex-col">
        <div>
            <img src="/images/{{ $item['image'] }}" class="w-10" alt="">
            <div class="text-2xl text-white mt-6">{{ $item['title'] }}</div>
            <div class="mt-4">{{ $item['text'] }}</div>
        </div>
        <div class="mt-10">
            <div class="text-3xl text-white">
                {{ $item['price'] }}
            </div>
            <div class="text-lg opacity-70">
                {{ $item['period'] }}
            </div>
        </div>
    </div>
