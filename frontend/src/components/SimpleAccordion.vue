<script setup>
import { ref, toRefs, defineProps } from 'vue'

const props = defineProps({
  id: Number,
  titulo: String,
  conteudo: String,
})

const { conteudo } = toRefs(props)
const accordionAberto = ref(false)
const svgPath = new URL('@/assets/seta.svg', import.meta.url).href

function toggleAccordion() {
  if (conteudo.value) {
    accordionAberto.value = !accordionAberto.value
  }
}
</script>

<template>
  <div class="accordion">
    <h2>
      <button
        :id="`accordion-header-${id}`"
        class="titulo"
        :aria-expanded="accordionAberto"
        :aria-controls="`accordion-panel-${id}`"
        @click="toggleAccordion()"
      >
        {{ titulo }}
        <InlineSvg v-if="conteudo" :src="svgPath" :class="{ inverter: accordionAberto }" aria-hidden="true" />
      </button>
    </h2>
    <Transition>
      <section
        :id="`accordion-panel-${id}`"
        :aria-labelledby="`accordion-header-${id}`"
        class="conteudo"
        v-html="conteudo"
        v-show="accordionAberto"
      ></section>
    </Transition>
  </div>
</template>

<style scoped>
* {
  color: #000;
  text-align: left;
  letter-spacing: 0;
}

h2 {
  margin: 0;
  font-size: 1.6rem;
}

.accordion {
  margin-top: 30px;
}

.titulo {
  padding: 0 0 0 12px;
  border: none;
  border-radius: 0;
  width: 100%;
  min-height: 60px;
  background-color: #e8e8e8;
  display: flex;
  font-weight: 800;
  align-items: center;
  justify-content: space-between;
  -webkit-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  -moz-box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}

.titulo svg {
  margin-right: 60px;
}

.titulo:focus {
  outline: 0;
}

.conteudo {
  font-size: 1.3rem;
  padding: 6px;
  max-width: 852px;
}

.inverter {
  transform: rotate(180deg);
}

.v-enter-active,
.v-leave-active {
  transition: opacity 0.3s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}

@media (max-width: 960px) {
  .titulo svg {
    margin-right: 20px;
    max-width: 21px;
    max-height: 21px;
  }
}
</style>
