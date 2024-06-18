import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CourseMaterials from '../views/CourseMaterials.vue'
import Assessments from '../views/Assessments.vue'
import AboutView from '../views/AboutView.vue'

const routes = [
  { path: '/', name: 'home', component: HomeView },
  { path: '/about', name: 'about', component: AboutView },
  { path: '/materials', name: 'materials', component: CourseMaterials },
  { path: '/assessments', name: 'assessments', component: Assessments }
  // Add more routes as needed
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

export default router
