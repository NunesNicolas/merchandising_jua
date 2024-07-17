import { createApp } from 'vue'
import { createWebHistory, createRouter } from 'vue-router';
import { BootstrapVue3 } from 'bootstrap-vue-3';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css';
import './style.css'
import App from './App.vue'

import sistemaLayout from './views/Layouts/sistema.vue';
import authLayout from './views/Layouts/auth.vue';
import pesquisaLayout from './views/Layouts/pesquisa.vue'

import InicialAuth from './views/Auth/login.vue';
import InicialSistema from './views/PesquisaHome.vue';
import InicialInfo from './views/Dashboard.vue';

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