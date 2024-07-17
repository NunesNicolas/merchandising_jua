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
import InicialSistema from './views/PesquisaHome.vue';
import InicialInfo from './views/Dashboard.vue';
import Checkin from './views/Checkin.vue';

import CreateAtendimentos from './views/RegistroTb/Create.vue';
import RegistroCreate from './views/RegistroTb/Home.vue';

import RegistroHome from './views/PesquisaJua/Home.vue';
import VisitasCheck from './views/PesquisaJua/CheckCamp.vue';



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
            { path: '/checkin/:pesquisaid', name: 'checkin', component: Checkin},
            { path: 'registro/create/:pesquisaid', name: 'newReg', component: RegistroCreate },
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