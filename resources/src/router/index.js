import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/Home.vue'
import About from '../pages/About.vue'
import Reportes from '../pages/Reportes.vue'
import Registro from '../pages/Registro.vue'
import perfil from '../pages/perfil.vue'
import ProyectoTemplate from '../components/ProyectoPage.vue'
import { organizacionesData } from '../pages/ProyectInterPage.js'


const routes = [
  { path: '/', component: Home },
  { path: '/reportes', component: Reportes },
  { path: '/about', component: About },
  { path: '/registro', component: Registro },
  { path: '/perfil', component: perfil },
  { path: '/proyectos/:id',name: 'Proyecto', component: ProyectoTemplate,
    props: route => ({
      organizacion: organizacionesData.find(o => o.id === route.params.id)
    })
  },
]

export default createRouter({
  history: createWebHistory(),
  routes,
})