<template>
  <div class="login-container">
    <div class="logo-container">
      <img src="https://sabaojua.com.br/Assets/img/nova-logo.png" alt="Logo" />
    </div>

    <div class="form-container">
      <form @submit.prevent="login">
        <h2 class="text-center">Bem-vindo ao sistema</h2>

        <div class="input-container">
          <input type="email" v-model="email" required placeholder="Email" />
        </div>

        <div class="input-container">
          <input type="password" v-model="senha" required placeholder="Senha" />
          <i class="bi bi-eye-fill" @click="mostrarSenha"></i>
        </div>

        <div class="form-link">
          <router-link to="#">Esqueceu sua senha?</router-link>
        </div>

        <button type="submit" class="btn-login">
          Entrar
        </button>
      </form>
    </div>
  </div>
</template>


<script>
import axios from 'axios';
import { useRouter } from 'vue-router';

export default {
  data() {
    return {
      email: '',
      senha: '',
    };
  },
  methods: {
    mostrarSenha() {
      // Lógica para mostrar a senha
    },
    async login() {
      try {
        const response = await axios.get('http://localhost:8000/sanctum/csrf-cookie');
        const csrfToken = this.getTokenFromCookie();

        const formData = new FormData();
        formData.append('email', this.email);
        formData.append('password', this.senha);

        const loginResponse = await axios.post('http://localhost:8000/login', formData, {
          headers: {
            Accept: 'application/json',
            'X-CSRF-TOKEN': csrfToken,
          },
        });

        localStorage.setItem('token', csrfToken);

        console.log('Login successful:', loginResponse.data);

        this.$router.push('/'); // Redirecionar após o login

      } catch (error) {
        console.error('Erro ao fazer login:', error);
        if (error.response && error.response.data && error.response.data.message) {
          console.log('Error message:', error.response.data.message);
        } else {
          console.log('Ocorreu um erro ao fazer o login.');
        }
      }
    },
    getTokenFromCookie() {
      let csrfToken = '';
      const cookies = document.cookie.split('; ');
      cookies.forEach((cookie) => {
        if (cookie.startsWith('XSRF-TOKEN=')) {
          csrfToken = decodeURIComponent(cookie.split('=')[1]);
        }
      });
      return csrfToken;
    },
  },
};
</script>

<style scoped>
/* Estilos CSS permanecem os mesmos */
</style>


<style scoped>
.login-container {
  display: flex;
  width: 100%;
}

.logo-container {
  background-color: #2483dd;
  min-width: 50vw;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.logo-container img {
  width: 35vw;
}

.form-container {
  background-color: white;
  min-width: 50vw;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.form-container form {
  width: 80%;
  max-width: 400px;
}

.text-center {
  text-align: center;
}

.input-container {
  margin-top: 2rem;
  position: relative;
}

.input-container input {
  width: 100%;
  padding: 0.75rem;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.input-container i {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  right: 10px;
  cursor: pointer;
}

.form-link {
  margin-top: 1rem;
  text-align: right;
}

.btn-login {
  margin-top: 2rem;
  width: 100%;
  max-width: 200px;
  padding: 0.75rem;
  background-color: #0b7de7;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
</style>
