<div id="lead-form-wrap"
    class="hidden fixed inset-0 z-99 flex justify-center items-center px-4 bg-white/30 backdrop-blur-md">

    <div class="w-full lg:min-w-105 max-w-105 bg-black text-white rounded-md pt-6 px-6 lg:px-8 pb-10 relative">
        <div id="form-spinner" class="hidden absolute inset-0 flex justify-center items-center bg-black/50 z-9">
            <svg class="animate-spin h-6 w-6">
                <use xlink:href="#icon-spinner" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
        </div>


        <form action="/" id="lead-form" class="">
            <div class="flex justify-between items-center">
                <div class="text-2xl">Обсудить проект</div>
                <div
                    class="js-toggle-form h-9 w-9 bg-black-primary text-white flex justify-center items-center rounded-full cursor-pointer">
                    <svg class="icon-svg h-6 w-6 -rotate-45">
                        <use xlink:href="#icon-close" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
            </div>
            <label for="lead-name" class="block text-[16px] mt-8">Ваше имя *</label>
            <input id="lead-name" name="name" type="text"
                class="block w-full border border-gray-700  rounded-md py-2 px-4 mt-1 mb-6 ">

            <label for="lead-email" class="block">Почта*</label>
            <input id="lead-email" name="email" type="text"
                class="block w-full border border-gray-700 rounded-md py-2 px-4 mt-1 mb-6 ">

            <label for="lead-phone" class="block">Телефон*</label>
            <input id="lead-phone" type="text" name="phone" id="lead-phone" placeholder="+7"
                class="block w-full border border-gray-700 rounded-md  py-2 px-4 mt-1 mb-6 ">

            <label for="lead-message" class="block">Сообщение</label>
            <textarea id="lead-message" name="message"
                class="block w-full border border-gray-700 rounded-md py-2 px-4 mt-1 mb-6 "></textarea>

            <div class="relative">
                <button type="submit"
                    class="w-full items-center justify-center cursor-pointer transition-colors text-center inline-flex bg-[#f53] text-white  px-6 py-2 text-14 rounded">Отправить</button>
            </div>
        </form>

        <div id="lead-message-success" class="hidden text-center mt-8">
            Спасибо за ваше обращение!<br />
            Мы свяжемся с вами в ближайшее время.<br>
            <div class="js-toggle-form inline-block mt-4 border-b border-white cursor-pointer">Закрыть</div>
        </div>
    </div>
</div>