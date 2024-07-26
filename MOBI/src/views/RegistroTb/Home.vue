  <template>
  <div style="height: 25vh; width: 100%">
    <headerEmpresa :visita="pesquisa" />
  </div>
  <ArrowBack/>
  <h5 class="name">Registro de Trabalho</h5>
 
  
  <div>
    <!-- {{ pesquisa }} -->
    <button @click="routebutton(this.$route.pesquisaid)" class="btn">
      Adicionar Registro
      <i class="bi bi-image"></i>
    </button>

    <RegistroCard :workregs="workreg">

      <template v-slot:actions="{ work }">
        <button @click="confirmDelete(work)" class="buttondel">
          <i class="bi-trash"></i>
      </button>
      
      </template>
    
    </RegistroCard>
  </div>
</template>

<script>
import headerEmpresa from "../../components/headerEmpresa.vue";
import RegistroCard from "../../components/RegistroCard.vue";
import ArrowBack from "../../components/ArrowBack.vue";
import axios from 'axios';


export default {
  data() {
    return {
      id: this.$route.params.pesquisaid,
      pesquisa: {},
      workreg: {}
    }
  },
  components: {
    headerEmpresa,
    RegistroCard,
    ArrowBack
  },
  methods: {
    async fetchPesquisa() {
      let response = axios.get('/pesquisas/' + this.id)
      this.pesquisa = (await response).data;
      console.log('Dados da pesquisa:', this.pesquisa);
    },

    routebutton(id) {
      this.$router.push({ name: 'newReg', params: { id: id } });
    },

    async fetchWorkReg() {
      let response = axios.get('/workreg/pesquisa/' + this.id)
      this.workreg = (await response).data;
      console.log('Dados da workreg:', this.workreg);
    },
    confirmDelete(work) {
            if (confirm(`Você tem certeza que deseja excluir o Registro de trabalho ${work.title}?`)) {
                this.deleteWorkRegister(work.id);
            }
        },
        deleteWorkRegister(workregId) {
            axios.delete(`/workreg/${workregId}`)
                .then(response => {
                    alert('workreg excluído com sucesso!');
                    this.fetchWorkReg(); // Atualiza a lista de workregs após exclusão
                })
                .catch(error => {
                    console.error('Erro ao excluir workregister: ', error);
                    alert('Ocorreu um erro ao tentar excluir o workregister.');
                });
        }
  },
  mounted() {
    this.fetchPesquisa();
    this.fetchWorkReg();
  }
}
</script>

<style>

.buttondel{
  width: 54px;
  height: 54px;
  background-color: rgba(255, 0, 0, 0);
  display: flex ;
  border: none;
  align-items: center;
  justify-content: center;
  margin-left: 10%;
}

.bi-trash{
  text-align: center;
  font-size: 2rem;
  color: red
}

.btn {
  background-color: #ffffff;
  border: 1px solid #ebebeb;
  color: #2C9AFF;
  box-shadow: 0vh 0.2vh 0.2vh 0vh #d2d1d1;
  font-weight: bold;
  font-size: medium;
  margin-top: 1vh;
  color: #2c9aff;
  height: 5vh;
  width: 30vh;
}

.name {
  text-align: left;
  color: #a0a0a0;
  font-size: 2vh;
  margin-left: 2vh;
  margin-top: 2.5vh;
}
</style>
