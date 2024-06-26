<template>
  <div class="login-container">
    <div class="logo-container">
      <img src="https://sabaojua.com.br/Assets/img/nova-logo.png" alt="Logo" />
    </div>

    <div class="form-container">
      <form @submit.prevent="login">
        <h2 class="text-center">Bem-vindo ao sistema</h2>
        
        <div class="input-container">
          <input type="email" v-model="form.email" required placeholder="Email" />
        </div>
        
        <div class="input-container">
          <input
            type="password"
            v-model="form.senha"
            required
            placeholder="Senha"
          />
          <i class="bi bi-eye-fill" @click="mostrarSenha"></i>
        </div>
        
        <div class="form-link">
          <router-link to="/esqueceu-senha">Esqueceu sua senha?</router-link>
        </div>
        
        <button type="submit" class="btn-login">
          Entrar
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const form = ref({
  email: '',
  senha: '',
});

const router = useRouter();

const mostrarSenha = () => {
  // Lógica para mostrar a senha
};

const login = async () => {
  try {
    const response = await axios.get('http://localhost:8000/sanctum/csrf-cookie');
    const csrfToken = getTokenFromCookie();

    const formData = new FormData();
    formData.append('email', form.email);
    formData.append('password', form.senha);

    const loginResponse = await axios.post('http://localhost:8000/login', formData, {
      headers: {
        Accept: 'application/json',
        Referer: 'localhost:8000/',
        'X-CSRF-TOKEN': csrfToken,
      },
    });

    // Armazenar o token em localStorage
    localStorage.setItem('token', csrfToken);

    console.log('Login successful:', loginResponse.data);

    // Redirecionar para a página após o login
    router.push('/');
  } catch (error) {
    console.error('Erro ao fazer login:', error);
    if (error.response && error.response.data && error.response.data.message) {
      console.log('Error message:', error.response.data.message);
    } else {
      console.log('Ocorreu um erro ao fazer o login.');
    }
  }
};

const getTokenFromCookie = () => {
  let csrfToken = '';
  const cookies = document.cookie.split('; ');
  cookies.forEach((cookie) => {
    if (cookie.startsWith('XSRF-TOKEN=')) {
      csrfToken = decodeURIComponent(cookie.split('=')[1]);
    }
  });
  return csrfToken;
};
</script>

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

