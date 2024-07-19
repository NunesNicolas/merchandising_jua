import { createApp } from 'vue'
import { createWebHistory, createRouter } from 'vue-router';
import { BootstrapVue3 } from 'bootstrap-vue-3';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css';
import './style.css'
import App from './App.vue'

import sistemaLayout from './views/layouts/sistema.vue';
import authLayout from './views/layouts/auth.vue';
import pesquisaLayout from './views/layouts/pesquisa.vue'

import InicialAuth from './views/auth/login.vue';
import InicialSistema from './views/dashboard/Home.vue';
import InicialInfo from './views/dashboard/Dashboard.vue';
import CreateAtendimentos from './views/Atendimentos/Create.vue';

import RegistroHome from './views/Visitas/Home.vue';
import VisitasCheck from './views/Visitas/CheckCamp.vue';
import Registro from './views/Visitas/Registros.vue';

const routes = [
    {
      path: '/login',
      component: authLayout,
      children: [
        { path: '', name: 'login', component: InicialAuth },
      ]
    },
    {
        path: '/pesquisas',
        component: sistemaLayout,
        children: [
            { path: ':pesquisaid', name: 'pesquisa', component: InicialSistema},
            { path: 'create/:pesquisaid', name: 'newReg', component: Registro },
            { path: 'registro/:pesquisaid', name: 'registro', component: RegistroHome },
        ]
    },
    {
      path: '/',
      component: sistemaLayout,
      children: [
          { path: '', name: 'dashboard', component: InicialInfo },
          { path: 'create', name: 'CreateAtendimentos', component: CreateAtendimentos },
      ]
  },
    {
      path: '/visitas/check',
      component: pesquisaLayout,
      children: [
          { path: '', name: 'check', component: VisitasCheck },
      ]
    },
    {
      path: '/visitas/registro',
      component: pesquisaLayout,
      children: [
         
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