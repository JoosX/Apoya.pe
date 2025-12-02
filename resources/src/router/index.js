import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/Home.vue'
import About from '../pages/About.vue'
import Reportes from '../pages/Reportes.vue'
import Registro from '../pages/Registro.vue'
import perfil from '../pages/perfil.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/reportes', component: Reportes },
  { path: '/about', component: About },
  { path: '/registro', component: Registro },
  { path: '/perfil', component: perfil },
]

export default createRouter({
  history: createWebHistory(),
  routes,
})
