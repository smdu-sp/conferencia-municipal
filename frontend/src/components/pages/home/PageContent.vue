<script setup>
import { ref } from 'vue'
import wpautop from 'wpautop'
import SimpleAccordion from '@/components/SimpleAccordion.vue'
import { store } from '@/store/store.js'

const apiURL = 'http://localhost/wp-json/wp/v2/pages?slug=home'
const mediaURL = 'http://localhost/wp-json/wp/v2/media'
const conteudo = ref(null)
const media = ref(null)

function formatarConteudo(conteudo) {
  if (conteudo) {
    conteudo = adicionarTitulos(conteudo)
    conteudo = adicionarGaleria(conteudo)
    conteudo = wpautop(conteudo)
    return conteudo
  }
}

function adicionarTitulos(conteudo) {
  const regex = /\[titulo data="([^"]+)" regiao="([^"]+)" cor="([^"]+)"\]/g

  return conteudo.replace(
    regex,
    (match, data, regiao, cor) =>
      `<h3 class="titulo-regionais" style="background-color: ${cor}"><strong>${data}</strong><span style="font-family: 'SofiaSans'"> – ${regiao}</span></h3>`
  )
}

function adicionarGaleria(conteudo) {
  const regex = /\[gallery[^\]]*ids="([^"]+)"[^\]]*\]/g

  return conteudo.replace(regex, (match, idsValue) => {
    const idsArray = idsValue.split(',').map((id) => parseInt(id, 10))

    let htmlGaleria = ''

    for (const id of idsArray) {
      const mediaObj = media.value.find((obj) => obj.id === id)

      htmlGaleria += `
        <dl class="gallery-item">
			    <dt class="gallery-icon landscape">
				    <a href="${mediaObj.source_url}"> <img width="300" height="225" src="${mediaObj.media_details.sizes.medium.source_url}" class="attachment-medium size-medium" alt="${mediaObj.alt_text}"></a>
			    </dt>
        </dl>`
    }

    return `<div class="gallery galleryid-48 gallery-columns-3 gallery-size-medium">${htmlGaleria}</div>`
  })
}

fetch(apiURL)
  .then((response) => response.json())
  .then((data) => {
    conteudo.value = data[0]['acf']
    return fetch(mediaURL)
  })
  .then((response) => response.json())
  .then((data) => {
    media.value = data
    console.log(media.value)
  })
  .then(() => (store.carregado = true))
</script>

<template>
  <main v-if="store.carregado">
    <section class="titulo-principal" v-html="formatarConteudo(conteudo.introducao)"></section>
    <section class="conteudo">
      <template v-for="(content, index) in conteudo.accordion" :key="`accordion-${index}`">
        <SimpleAccordion :titulo="content.titulo" :conteudo="formatarConteudo(content.conteudo)"></SimpleAccordion>
      </template>
    </section>
    <section v-if="conteudo.informativo" class="informativo" v-html="formatarConteudo(conteudo.informativo)"></section>
  </main>
</template>

<style scoped>
:deep(*) {
  line-height: 1.5;
}

.titulo-principal {
  position: absolute;
  left: -9999px;
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
  font-family: 'SofiaSans' !important;
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

:deep(.gallery-size-medium *) {
  max-width: 300px;
}

:deep(.gallery-size-medium) {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
}

:deep(.gallery-item) {
  margin: 0;
}

@media (max-width: 960px) {
  main {
    padding: 0 20px;
  }
}

@media (max-width: 720px) {
}
</style>
