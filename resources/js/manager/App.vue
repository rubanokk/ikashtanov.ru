<script setup>
  import Sidebar from './components/Sidebar.vue';
  import Icons from './components/Icons.vue';
</script>
<template>
  <div class="flex h-screen">
    <Sidebar />
    <main class="w-full">
      <RouterView />
    </main>
    <Icons />
  </div>
</template>
