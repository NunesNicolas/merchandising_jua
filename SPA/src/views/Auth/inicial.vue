<script setup>
import axios from "axios";
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
  <div style="display: flex; width: 100%">
    <div id="logoContainer">
      <img
        src="https://sabaojua.com.br/Assets/img/nova-logo.png"
        alt=""
        style="width: 35vw; margin-top: 25%; align-self: center"
      />
    </div>

    <div id="loginContainer">
      <form
        method="POST"
        class="d-flex flex-column justify-content-center align-items-center pt-2 pb-4"
        @submit.prevent="login"
      >
        <div class="d-flex gap-3 align-items-center justify-content-center">
          <h2 class="text-center m-0">Bem-vindo ao sistema</h2>
        </div>
        <div class="containerPlaceholder">
          <input
            type="email"
            name="email"
            id="email"
            class="form-control p-3 @error('email') is-invalid @enderror"
            required
            placeholder="Email"
            autocomplete="off"
            autofocus
            v-model="form.email"
          />
        </div>
        <div class="containerPlaceholder" id="passwordPlaceholder">
          <input
            type="password"
            name="senha"
            id="pass"
            class="form-control p-3"
            required
            placeholder="Senha"
            autocomplete="off"
            autofocus
            v-model="form.senha"
          />
          <i
            id="iconVer"
            class="bi bi-eye-fill"
            title="Mostrar senha"
            @click="mostrarSenha"
          ></i>
        </div>
        <div class="form-link w-100 text-end mt-3">
          <a class="text-decoration-none" href="">Esqueceu sua senha?</a>
        </div>
        <div class="mt-4 w-100 text-center">
          <button
            type="submit"
            class="btn fw-semibold fs-5 py-2 text-white"
            style="background-color: #0b7de7; width: 40vw"
          >
            Entrar
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      form: {
        email: "",
        senha: "",
      },
      csrfToken: "", // Armazena o token CSRF aqui
    };
  },

  methods: {
    async getToken() {
      try {
        const response = await axios.get(
          "http://127.0.0.1:8000/sanctum/csrf-cookie"
        );
        // Após obter o token CSRF, armazene-o
        this.csrfToken = this.getTokenFromCookie();
      } catch (error) {
        console.error("Erro ao obter o token CSRF:", error);
        throw error; // Lança o erro para o caller (login())
      }
    },

    async login() {
      try {
        await this.getToken(); // Obter o token CSRF antes da requisição de login

        // Montar os dados do formulário
        let formData = new FormData();
        formData.append("email", this.form.email);
        formData.append("password", this.form.senha);

        // Realizar a requisição de login com o token CSRF no cabeçalho
        let response = await axios.post(
          "http://127.0.0.1:8000/login",
          formData,
          {
            headers: {
              Accept: "application/json",
              "X-CSRF-TOKEN": this.csrfToken, // Enviar o token CSRF no cabeçalho
            },
          }
        );

        alert(response.data.user.name);
        this.$router.push("/exemple/1");
      } catch (error) {
        console.error("Erro ao fazer login:", error);
        if (
          error.response &&
          error.response.data &&
          error.response.data.message
        ) {
          alert(error.response.data.message);
        } else {
          alert("Ocorreu um erro ao fazer o login.");
        }
      }
    },
    getTokenFromCookie() {
      let csrfToken = "";
      const cookies = document.cookie.split("; ");
      cookies.forEach((cookie) => {
        if (cookie.startsWith("XSRF-TOKEN=")) {
          csrfToken = decodeURIComponent(cookie.split("=")[1]);
        }
      });
      return csrfToken;
    },
  },
};
</script>

<style scoped>
body {
  background-color: white;
}
#logoContainer {
  background-color: #2483dd;
  margin-left: 0;
  min-height: 100vh;
  min-width: 50vw;
  height: 100%;
  width: 50%;
}
#loginContainer {
  align-items: center;
  background-color: white;
  right: 0;
  min-height: 100vh;
  max-height: 100vh;
  min-width: 50vw;
  height: 100%;
  width: 50%;

  padding-top: 25%;
}
form {
  align-items: center;
  position: relative;
  top: 50%;
  transform: translateY(-50%);
}

.containerPlaceholder {
  margin-top: 5vh;
  align-items: center;
  max-width: 40vw;
}

input {
  width: 40vw;
}

#passwordPlaceholder {
  position: relative;
}

div i {
  cursor: pointer;
  position: absolute;
  top: 5%;
  right: 5%;
}

i {
  font-size: 2.5vw;
  color: rgb(100, 100, 100);
}
</style>
