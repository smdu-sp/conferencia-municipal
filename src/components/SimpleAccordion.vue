<script setup>
import { ref, toRefs, defineProps } from 'vue';

const props = defineProps({
    titulo: String,
    conteudo: String
})

const { conteudo } = toRefs(props)
const accordionAberto = ref(false)
const svgPath = new URL('/src/assets/seta.svg', import.meta.url).href

function toggleAccordion() {
    if (conteudo.value) {
        accordionAberto.value = !accordionAberto.value
    }
}
</script>

<template>
    <section class="accordion">
        <button class="titulo" @click="toggleAccordion()">
            <h2>{{ titulo }}</h2>
            <InlineSvg
                v-if="conteudo"
                :src="svgPath"
                :class="{ 'inverter': accordionAberto }"
            ></InlineSvg>
        </button>
        <Transition>
            <div class="conteudo" v-html="conteudo" v-show="accordionAberto"></div>
        </Transition>
    </section>
</template>

<style scoped>
    * {
        color: #000;
        text-align: left;
        letter-spacing: 0;
    }

    .accordion {
        margin-top: 30px;
    }
    
    .titulo {
        padding: 0;
        border: none;
        border-radius: 0;
        width: 100%;
        min-height: 60px;
        background-color: #e8e8e8;
        display: flex;
        align-items: center;
        justify-content: space-between;
        -webkit-box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);
        -moz-box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);
        box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);
    }

    .titulo svg {
        margin-right: 60px;
    }

    .titulo:focus {
        outline: 0;
    }

    h2 {
        margin: 12px;
        font-size: 16px;
        font-weight: 800;
    }

    .conteudo {
        font-size: 13px;
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
</style>