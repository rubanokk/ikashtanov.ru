<script setup>
import { ref, onMounted } from "vue";
import axios from 'axios'
import Button from 'primevue/button';

const posts = ref([]);

onMounted(() => {
  getPosts()
})

const getPosts = async () => {
  try {
    const { data } = await axios.get('/manager/posts');
    posts.value = data.posts
  } catch (error) {
    console.log(error)
  }
}
</script>
<template>
  <div class="w-full max-w-3xl mx-auto my-20">
    <div class="flex justify-between items-center">
      <h1 class="text-2xl font-semibold">Записи</h1>
      <Button asChild v-slot="slotProps" size="small">
        <RouterLink :to="{ name: 'post-new' }" :class="slotProps.class">Новая запись</RouterLink>
      </Button>
    </div>
    <div class="p-4 mt-4 bg-gray-100 border border-gray-200 rounded-lg">
      <div v-for="post in posts" class="flex gap-4">
        <RouterLink :to="{ name: 'post', params: { slug: post.slug } }" >
          {{ post.title.ru }}
        </RouterLink>
      </div>
    </div>
  </div>
</template>
