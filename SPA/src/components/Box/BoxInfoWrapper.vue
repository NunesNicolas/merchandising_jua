<template>
    <div class="bg-white ml-3 mr-3 mt-3 box-info-wrapper p-4">
        <slot></slot>
    </div>
</template>

<style scoped>
.box-info-wrapper {
  width: 91vw;
  margin-top: -1vh;
  padding: 1vh;
  background-color: white;
  border-radius: 1vh;
  box-shadow: 0vh 0vh 0.1vh 0.1vh #c0c0c0;
  display: flex;
  flex-direction: column;
  gap: 1em;
}

</style>