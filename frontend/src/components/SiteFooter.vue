<script setup>
import { onMounted } from 'vue'
import footerLogo from '@/assets/footer-logo.png'
import { store } from '@/store/store.js'

onMounted(() => {
    document.getElementById('footer-logo').style.backgroundImage = `url('${footerLogo}')`
})
</script>

<template>
    <footer v-show="store.carregado">
        <div id="footer-logo"></div>
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
    width: 500px;
    height: 90px;
    background-repeat: no-repeat;
    background-size: contain;
}

@media(max-width: 960px) {
    footer {
        width: 100vw;
        padding: 20px;
    }

    #footer-logo {
        width: 100vw;
        height: 120px
    }
}
</style>
