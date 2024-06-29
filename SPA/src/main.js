import { createApp } from 'vue';
import { createWebHistory, createRouter } from 'vue-router';
import { BootstrapVue3 } from 'bootstrap-vue-3';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css';
import './style.css';
import App from './App.vue';

import sistemaLayout from './views/layout/sistema.vue';
import authLayout from './views/layout/auth.vue';

import inicialAuth from './views/Auth/inicial.vue';

import homeProdutos from './views/produtos/homeProdutos.vue';
import infoProdutos from './views/produtos/InfoProdutos.vue';
import createProdutos from './views/produtos/createProdutos.vue';
import createCompetitors from './views/produtos/createCompetitors.vue';

import homePromotores from './views/promotores/Home.vue';
import infoPromotores from './views/promotores/Show.vue';
import createPromotores from './views/promotores/createPromotores.vue';

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
      { path: 'produtos', name: 'homeProdutos', component: homeProdutos },
      { path: 'produtos/:id', name: 'infoProdutos', component: infoProdutos },
      { path: 'produtos/create', name: 'createProdutos', component: createProdutos },
      { path: 'produtos/:id/competitors/create', name: 'createCompetitors', component: createCompetitors, props: true },

      { path: 'promotores', name: 'homePromotores', component: homePromotores },
      { path: 'promotores/:id', name: 'infoPromotores', component: infoPromotores },
      { path: 'promotores/create', name: 'createPromotores', component: createPromotores },

      { path: 'empresas', name: 'homeEmpresas', component: homeEmpresas },
      { path: 'empresas/:id', name: 'infoEmpresas', component: infoEmpresas },
      { path: 'empresas/create', name: 'createEmpresas', component: createEmpresas },

      { path: 'clientes', name: 'clientes', component: HomeClientes },
      { path: 'clientes/create', name: 'CreateClientes', component: CreateClientes },
      { path: 'clientes/:id', name: 'ShowClientes', component: ShowClientes },
      { path: 'clientes/:id/update', name: 'UpdateClientes', component: UpdateClientes },
    ]
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

createApp(App)
  .use(router)
  .use(BootstrapVue3)
  .mount('#app');

export default router;
