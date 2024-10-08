import { createApp } from 'vue';
import { createWebHistory, createRouter } from 'vue-router';
import { BootstrapVue3 } from 'bootstrap-vue-3';
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css';
import 'bootstrap/dist/css/bootstrap.css';
import './style.css';
import App from './App.vue';

import sistemaLayout from './views/layout/sistema.vue';
import authLayout from './views/layout/auth.vue';

import inicialAuth from './views/Auth/inicial.vue';

import homeProdutos from './views/produtos/Home.vue';
import infoProdutos from './views/produtos/Show.vue';
import CreateProdutos from './views/produtos/Create.vue';
import UpdateProdutos from './views/produtos/Update.vue';
import CreateCompetitors from './views/produtos/competitors/Create.vue';
import UpdateCompetitors from './views/produtos/competitors/Update.vue';

import homePromotores from './views/promotores/Home.vue';
import infoPromotores from './views/promotores/Show.vue';
import createPromotores from './views/promotores/Create.vue';
import updatePromotores from './views/promotores/Update.vue';

import homeEmpresas from './views/empresas/homeEmpresas.vue';
import infoEmpresas from './views/empresas/InfoEmpresas.vue';
import createEmpresas from './views/empresas/createEmpresas.vue';

import HomeClientes from './views/clientes/Home.vue';
import CreateClientes from './views/clientes/Create.vue';
import UpdateClientes from './views/clientes/Update.vue';
import ShowClientes from './views/clientes/Show.vue';

const routes = [
  {
    path: '/login',
    component: authLayout,
    children: [
      { path: '', name: 'login', component: inicialAuth },
    ]
  },
  {
    path: '/',
    component: sistemaLayout,
    children: [
      { path: 'produtos', name: 'homeProdutos', component: homeProdutos, meta: { requiresAuth: true } },
      { path: 'produtos/:id', name: 'infoProdutos', component: infoProdutos, meta: { requiresAuth: true } },
      { path: 'produtos/create', name: 'CreateProdutos  ', component: CreateProdutos, meta: { requiresAuth: true } },
      { path: 'produtos/:id/update', name: 'UpdateProdutos', component: UpdateProdutos, meta: { requiresAuth: true } },
      { path: 'produtos/:id/competitors/create', name: 'CreateCompetitors', component: CreateCompetitors, meta: { requiresAuth: true } },
      { path: 'produtos/:id/competitors/update/:compid', name: 'UpdateCompetitors', component: UpdateCompetitors, meta: { requiresAuth: true } },

      { path: 'promotores', name: 'homePromotores', component: homePromotores , meta: { requiresAuth: true } },
      { path: 'promotores/:id', name: 'infoPromotores', component: infoPromotores , meta: { requiresAuth: true } },
      { path: 'promotores/create', name: 'createPromotores', component: createPromotores , meta: { requiresAuth: true } },
      { path: 'promotores/:id/update', name: 'UpdatePromotores', component: updatePromotores , meta: { requiresAuth: true } },

      { path: 'empresas', name: 'homeEmpresas', component: homeEmpresas , meta: { requiresAuth: true } },
      { path: 'empresas/:id', name: 'infoEmpresas', component: infoEmpresas , meta: { requiresAuth: true } },
      { path: 'empresas/create', name: 'createEmpresas', component: createEmpresas , meta: { requiresAuth: true } },

      { path: 'clientes', name: 'clientes', component: HomeClientes , meta: { requiresAuth: true } },
      { path: 'clientes/create', name: 'CreateClientes', component: CreateClientes , meta: { requiresAuth: true } },
      { path: 'clientes/:id', name: 'ShowClientes', component: ShowClientes , meta: { requiresAuth: true } },
      { path: 'clientes/:id/update', name: 'UpdateClientes', component: UpdateClientes , meta: { requiresAuth: true } },
    ]
  }
];

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
