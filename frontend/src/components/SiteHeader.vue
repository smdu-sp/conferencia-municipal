<script setup>
import { onMounted } from 'vue'
import headerBg from '@/assets/header-bg.png'
import { store } from '@/store/store.js'
import { VueSpinner } from 'vue3-spinners'

onMounted(() => {
    document.getElementById('site-banner').style.backgroundImage = `url('${headerBg}')`
})
</script>

<template>
    <VueSpinner v-if="!store.carregado" size="60" color="black" />
    <header v-show="store.carregado">
        <div id="site-banner"></div>
    </header>
</template>

<style scoped>
header{
    margin: 0 auto;
    width: 960px;
}

#site-banner {
    width: 960px;
    height: 400px;
}

@media(max-width: 960px) {
    header {
        margin: 0;
        width: 100vw;
    }

    #site-banner {
        width: 100vw;
        height: calc(100vw * 0.417);
        background-size: cover;
    }
}
</style>
