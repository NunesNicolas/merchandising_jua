import { createApp } from 'vue'
import { createWebHistory, createRouter } from 'vue-router';
import { BootstrapVue3 } from 'bootstrap-vue-3';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css';
import './style.css'
import App from './App.vue'

import sistemaLayout from './views/layouts/sistema.vue';
import authLayout from './views/layouts/auth.vue';

import InicialAuth from './views/auth/login.vue';
import InicialSistema from './views/dashboard/Home.vue';
import InicialInfo from './views/dashboard/Show.vue';
import CreateAtendimentos from './views/Atendimentos/Create.vue';

import VisitasHome from './views/Visitas/Home.vue';

const routes = [
    {
      path: '/login',
      component: authLayout,
      children: [
        { path: '', name: 'login', component: InicialAuth },
      ]
    },
    {
        path: '/home',
        component: sistemaLayout,
        children: [
            { path: '', name: 'dashboard', component: InicialSistema },
        ]
    },
    {
      path: '/',
      component: sistemaLayout,
      children: [
          { path: '', name: 'info', component: InicialInfo },
          { path: 'create', name: 'CreateAtendimentos', component: CreateAtendimentos },
      ]
  },
    {
      path: '/visitas',
      children: [
          { path: '', name: 'home', component: VisitasHome },
      ]
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes
  });
  
  createApp(App)
    .use(router)
    .use(BootstrapVue3)
    .mount('#app');
  
  export default router;