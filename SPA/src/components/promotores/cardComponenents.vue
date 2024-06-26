
<template>
        <div v-for="promotor in promotores" :key="promotor.id" class="card-container" style="display: flex; text-align: center; flex-wrap: wrap;">
            <div class="card" style="justify-content: center; border-radius: 10px; width: 235px; display: flex; text-align: left; margin: 10px;">
                <div class="card-body" style="height: 35vh;">
                    <svg viewBox="0 0 200 200">
                        <clipPath id="clipCircle">
                            <circle cx="100" cy="80" r="75" />
                        </clipPath>
                        <circle cx="100" cy="81" r="75" fill="none" stroke="grey" stroke-width="3" />
                        <image xlink:href="https://www.pngall.com/wp-content/uploads/5/Profile-PNG-Pic.png" width="200" height="200" clip-path="url(#clipCircle)" y="-20" />
                    </svg>
                </div>
                <ul class="list-group list-group-flush" style="width: 100%;">
                    <li class="list-group-item" style="background-color:#e7e7e7; border: none; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <h6 style="color:#858585">Nome do Promotor:</h6>
                        <p style="color:#8d8d8d; margin-bottom: -10px;"> {{ promotor.nome }} </p>
                    </li>
                    <li class="list-group-item" style="background-color:#e7e7e7; border: none;">
                        <h6 style="color:#858585">Email do Promotor:</h6>
                        <p style="color:#8d8d8d; margin-bottom: -10px;"> {{ promotor.email }} </p>
                    </li>
                    <li class="list-group-item" style="background-color:#e7e7e7; border: none;">
                        <h6 style="color:#858585">Status do Promotor:</h6>
                        <p style="color:red; margin-bottom: -10px;"> EM ANDAMENTO </p>
                    </li>
                    <router-link :to="{name: 'InfoPromotores', params: {id: promotor.id}}">
                        <li class="list-group-item btn btn-primary" style="width: 100%; padding: 3%; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; background: #2c9aff; text-align: center;">
                            <font color="#ffffff">Detalhes</font>
                        </li>
                    </router-link>
                </ul>
            </div>
        </div>
</template>


<script>
export default {
   props: {
    promotores: Array,

   }
}
</script>

<style scoped></style>