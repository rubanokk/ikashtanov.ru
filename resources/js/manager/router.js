import { createRouter, createWebHashHistory } from 'vue-router'
import posts from './pages/posts.vue'
import post from './pages/post.vue'

const routes = [
  { path: '/', component: posts, name: 'posts' },
  { path: '/posts/:slug', component: post, name: 'post' },
  { path: '/posts/new', component: post, name: 'post-new' },
]

const router = createRouter({
  routes: routes,
  history: createWebHashHistory()
})

export default router
