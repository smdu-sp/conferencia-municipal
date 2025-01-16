<script setup>
import { onMounted } from 'vue'
import { store } from '@/store/store.js'
</script>

<template>
  <footer v-show="store.carregado">
    <div id="footer-logo">
      <img src="@/assets/8-conferencia-logo.png" :alt="store.conteudo.footer.alt_text_1" />
      <img src="@/assets/smul-logo.png" :alt="store.conteudo.footer.alt_text_2" />
    </div>
  </footer>
</template>

<style scoped>
footer {
  margin-top: 200px;
  background-color: #2e2d2c;
  width: 1024px;
  height: 140px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

#footer-logo {
  display: flex;
  justify-content: space-between;
  margin-right: 100px;
  width: 400px;
  height: 90px;
  background-repeat: no-repeat;
  background-size: contain;
}

@media (max-width: 960px) {
  footer {
    width: 100vw;
    padding: 20px;
  }

  #footer-logo {
    width: 100vw;
    height: 120px;
  }
}
</style>
