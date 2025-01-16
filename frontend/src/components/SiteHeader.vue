<script setup>
import { onMounted } from 'vue'
import { store } from '@/store/store.js'
import { VueSpinner } from 'vue3-spinners'
</script>

<template>
  <VueSpinner v-if="!store.carregado" size="60" color="black" />
  <header v-if="store.carregado">
    <div id="site-banner">
      <img src="@/assets/header-bg.png" :alt="store.conteudo.header.alt_text" />
    </div>
  </header>
</template>

<style scoped>
header {
  margin: 0 auto;
  width: 960px;
}

#site-banner {
  width: 960px;
  height: 400px;
}

@media (max-width: 960px) {
  header {
    margin: 0;
    width: 100vw;
  }

  #site-banner, #site-banner img {
    width: 100vw;
    height: calc(100vw * 0.417);
    background-size: cover;
  }
}
</style>
