import { createApp } from 'vue'
import { createWebHistory, createRouter } from 'vue-router';
import { BootstrapVue3 } from 'bootstrap-vue-3';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css';
import './assets/style.css'
import App from './App.vue'

import sistemaLayout from './views/layouts/sistema.vue';
import authLayout from './views/layouts/auth.vue';
import pesquisaLayout from './views/layouts/pesquisa.vue'

import InicialAuth from './views/auth/login.vue';
import InicialSistema from './views/Pesquisa/Home.vue';
import InicialInfo from './views/Dashboard.vue';
import Checkin from './views/Checkin.vue';
import CheckoutSucess from './views/CheckoutSucess.vue';

import CreateAtendimentos from './views/Pesquisa/Create.vue';
import RegistroCreate from './views/RegistroTb/Create.vue';

import RegistroHome from './views/RegistroTb/Home.vue';
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
      { path: ':pesquisaid', name: 'pesquisa', component: InicialSistema, meta: { requiresAuth: true } },
      { path: '/checkin/:pesquisaid', name: 'checkin', component: Checkin, meta: { requiresAuth: true } },
      { path: 'registro/create/:pesquisaid', name: 'newReg', component: RegistroCreate, meta: { requiresAuth: true } },
      { path: 'registro/:pesquisaid', name: 'registro', component: RegistroHome, meta: { requiresAuth: true } },
    ]
  },
  {
    path: '/',
    component: sistemaLayout,
    children: [
      { path: '', name: 'dashboard', component: InicialInfo, meta: { requiresAuth: true } },
      { path: 'create', name: 'CreateAtendimentos', component: CreateAtendimentos, meta: { requiresAuth: true } },
      { path: 'sucess', name: 'CheckoutSucess', component: CheckoutSucess, meta: { requiresAuth: true } },
    ]
  },
  {
    path: '/visitas/check',
    component: pesquisaLayout,
    children: [
      { path: '', name: 'check', component: VisitasCheck , meta: { requiresAuth: true }},
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


// Adicione o guard de navegação global
router.beforeEach((to, from, next) => {
  
  const token = localStorage.getItem('token');

  // Verifica se a rota requer autenticação
  const requiresAuth = to.matched.some(record => record.meta.requiresAuth);

  if (requiresAuth && !token) {
    // Se a rota requer autenticação e o token não está presente, redirecione para o login
    next('/login');
  } else {
    // Caso contrário, continue para a rota desejada
    next();
  }
});

createApp(App)
  .use(router)
  .use(BootstrapVue3)
  .mount('#app');

export default router;