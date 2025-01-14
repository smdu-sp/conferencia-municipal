<script setup>
import { ref } from 'vue'
import wpautop from 'wpautop'
import SimpleAccordion from '@/components/SimpleAccordion.vue'
import { store } from '@/store/store.js'

const apiURL = '/wp-json/wp/v2/pages?slug=home'
const conteudo = ref(null)

function formatarConteudo(conteudo) {
  if (conteudo) {
    conteudo = adicionarTitulos(conteudo)
    conteudo = wpautop(conteudo)
    return conteudo
  }
}

function adicionarTitulos(conteudo) {
  const regex = /\[titulo data="([^"]+)" regiao="([^"]+)" cor="([^"]+)"\]/g;

  return conteudo.replace(regex, (match, data, regiao, cor) => `<h2 class="titulo-regionais" style="background-color: ${cor}"><strong>${data}</strong><span style="font-family: 'SofiaSans'"> – ${regiao}</span></h2>`);
}

fetch(apiURL)
  .then((response) => response.json())
  .then((data) => {
    conteudo.value = data[0]['acf']
  })
  .then(() => store.carregado = true)

</script>

<template>
  <main v-if="store.carregado">
    <section class="conteudo">
      <template v-for="(content, index) in conteudo.accordion" :key="`accordion-${index}`">
        <SimpleAccordion :titulo="content.titulo" :conteudo="formatarConteudo(content.conteudo)"></SimpleAccordion>
      </template>
    </section>
    <section class="informativo" v-html="conteudo.informativo"></section>
  </main>
</template>

<style scoped>
:deep(*) {
  line-height: 1.5;
}

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
    font-size: 1.8rem;
}

:deep(.destaque) {
    margin: 0;
    font-weight: 800;
    font-size: 2.4rem;
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

:deep(strong) {
  font-weight: bold;
}

:deep(.titulo-regionais) {
  font-family: "SofiaSans" !important;
  font-size: 1.35rem;
  font-weight: 300;
  color: #fff;
  height: 30px;
  padding: 5px 8px;
  margin-bottom: 4px;
  letter-spacing: 0.5px;
}

:deep(.titulo-regionais > strong) {
  font-weight: 600 !important;
}
</style>
