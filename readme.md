# Projeto Merchantrack


## Configuração do API (Laravel)

### Requisitos
- Node/NPM
- Php/Composer

### Passo a Passo

1. **Clonar o Repositório**
   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git


2. Instalação e Execução com Docker Compose
- Navegue até o diretório `API`
  ```
  cd API
  ```

- Copie o arquivo `.env.example` para `.env`
  ```
  cp .env.example .env
  ```

3. Instalação das Dependências e Execução das Seeds


- Instale as dependências do PHP
  ```
  composer install
  ```

- Gere a chave de aplicativo Laravel
  ```
  php artisan key:generate
  ```

- Execute as migrações e as seeds para popular o banco de dados
  ```
  php artisan migrate --seed
  ```

  ```
  exit
  ```

4. Acesso à API
- A API estará acessível em `http://localhost:8000`

## Configuração do SPA (Vue.js)

### Requisitos
- Node.js (com npm)

### Passo a Passo

1. Instalação das Dependências
- Navegue até o diretório `spa`
  ```
  cd spa
  ```

- Instale as dependências do Node.js
  ```
  npm install
  ```

2. Execução do Servidor de Desenvolvimento
- Inicie o servidor de desenvolvimento
  ```
  npm run dev
  ```

3. Acesso ao SPA
- O SPA estará acessível em `http://localhost:5173`

## Notas Adicionais

- Portas Padrão:
- API (Laravel): `8000`
- SPA (Vue.js): `5173`


- Ambientes de Produção:
- Certifique-se de configurar corretamente as variáveis de ambiente (`APP_URL`, `DB_*`, etc.) para ambientes de produção antes de implantar.


## Todos

[ ] - Função de logout
[ ] - Finalizar telas do clientes/produtos/promotes
[ ] - Iniciar fluxo de visitas/carteiras de clientes
[ ] - Criar aplicação para que o promotor possa realizar suas análises