<script setup>
const menu = [
  {
    title: "Записи",
    icon: "newspaper",
    target: "/"
  }
]

</script>
<template>
  <div class="w-full max-w-60 border-r border-gray-200 bg-gray-50">
    <div class="font-semibold text-lg p-4">Панель управления</div>
    <div class="flex flex-col gap-1 px-4 mt-8">
      <a href="/" target="_blank" class="flex items-center gap-1 px-2 py-2 rounded-lg hover:bg-gray-200">
        <svg class="icon-svg h-5 w-5">
          <use xlink:href="#icon-birdhouse" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
        Перейти на сайт
      </a>
      <router-link v-for="item in menu" :to="item.target" class="flex items-center gap-1 px-2 py-1.5 rounded-lg hover:bg-gray-200">
        <svg class="icon-svg h-5 w-5">
          <use :xlink:href="`#icon-${item.icon}`" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
        {{ item.title }}
      </router-link>
    </div>

  </div>

</template>
