import { createRouter, createWebHistory } from 'vue-router'
import LoginForm from './components/LoginForm.vue'
import UserList from './pages/UserList.vue'

const routes = [
  { path: '/', redirect: '/login' },
  { path: '/login', component: LoginForm },
  { path: '/users', component: UserList },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
