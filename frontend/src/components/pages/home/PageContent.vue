<script setup>
import { ref } from 'vue'
import SimpleAccordion from '@/components/SimpleAccordion.vue'
import { store } from '@/store/store.js'

const apiURL = '/wp-json/wp/v2/pages?slug=home'
const conteudo = ref(null)

fetch(apiURL)
  .then((response) => response.json())
  .then((data) => (conteudo.value = data[0]['acf']))
  .then(() => store.carregado = true)

</script>

<template>
  <main v-if="store.carregado">
    <section class="introducao" v-html="conteudo.introducao"></section>
    <section class="conteudo">
      <template v-for="(content, index) in conteudo.accordion" :key="`accordion-${index}`">
        <SimpleAccordion :titulo="content.titulo" :conteudo="content.conteudo"></SimpleAccordion>
      </template>
    </section>
    <section class="informativo" v-html="conteudo.informativo"></section>
  </main>
</template>

<style scoped>
.introducao {
    color: #2e2d2c;
    background-color: #adcb45;
    width: 100%;
    min-height: 160px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: start;
    padding: 20px 48px;
    font-weight: 700;
}

.introducao p {
    max-width: 600px;
    text-align: left;
    font-weight: bold;
    font-size: 18px;
}

:deep(.destaque) {
    margin: 0;
    font-weight: 800;
    font-size: 24px;
}

.introducao p strong {
    font-weight: 800;
}

.informativo {
  color: #000;
  text-align: left;
  font-weight: 800;
  padding-bottom: 200px;
}

.informativo p a {
  color: #1053ff;
}
</style>
