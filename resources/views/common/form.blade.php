<div id="lead-form-wrap" class="hidden fixed inset-0 bg-woodsmoke-1000 z-99 flex justify-center items-center px-4">
    <div id="form-spinner" class="hidden absolute inset-0 flex justify-center items-center bg-woodsmoke-800/80">
        <svg class="animate-spin h-6 w-6">
            <use xlink:href="#icon-spinner" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
    </div>
    <div class="w-full lg:min-w-105 max-w-105 border border-woodsmoke-700 rounded-md pt-6 px-6 lg:px-8 pb-10">
        <div class="flex justify-between items-center">
            <div class="text-2xl font-mono text-white">Обсудить проект</div>
            <div
                class="js-toggle-form h-9 w-9 bg-black-primary text-white flex justify-center items-center rounded-full cursor-pointer">
                <svg class="icon-svg h-6 w-6 -rotate-45">
                    <use xlink:href="#icon-close" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                </svg>
            </div>
        </div>

        <form action="/" id="lead-form" class="mt-8 ">
            <label for="lead-name" class="block">Ваше имя*</label>
            <input id="lead-name" name="name" type="text"
                class="block w-full border border-woodsmoke-700 rounded-md  py-3 px-4 mt-1 mb-6 text-white">

            <label for="lead-email" class="block">Почта*</label>
            <input id="lead-email" name="email" type="text"
                class="block w-full border border-woodsmoke-700 rounded-md  py-3 px-4 mt-1 mb-6 text-white">

            <label for="lead-phone" class="block">Телефон*</label>
            <input id="lead-phone" type="text" name="phone" id="lead-phone" placeholder="+7"
                class="block w-full border border-woodsmoke-700 rounded-md  py-3 px-4 mt-1 mb-6 text-white">

            <label for="lead-message" class="block">Сообщение</label>
            <textarea id="lead-message" name="message"
                class="block w-full border border-woodsmoke-700 rounded-md  py-3 px-4 mt-1 mb-6 text-white"></textarea>

            <button type="submit"
                class="w-full items-center justify-center cursor-pointer transition-colors text-center uppercase inline-flex bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 text-white font-mono px-6 py-2.5 text-14 rounded">Отправить</button>
        </form>

        <div id="lead-message-success" class="hidden text-center mt-8">
            Спасибо за ваше обращение!<br />
            Мы свяжемся с вами в ближайшее время.
        </div>
    </div>
</div>
