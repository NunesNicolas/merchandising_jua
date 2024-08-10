<template>
    <div class=" bg-white " style="
    flex-wrap: wrap;
    width: 100%;
    height: 50vh;
    border-radius: 2vh;
    padding: 1vh;
    box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;
">
      <p>{{title}}</p>
      <div class="d-flex" style="
      width: 23vw;
  ">
        <p>{{content}}</p>
      </div>

    </div>
</template>
<script>
export default {
    name: 'BoxTable',
    props: {
        title: {
            type: String,
            required: true,
        },
        content: {
            type: String,
            required: true,
        },
    }
}
</script>
<style></style>