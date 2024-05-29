<script setup>
import { onMounted } from 'vue'
import footerLogo from '@/assets/footer-logo.png'

onMounted(() => {
    document.getElementById('footer-logo').style.backgroundImage = `url('${footerLogo}')`
})
</script>

<template>
    <footer>
        <div id="footer-logo"></div>
    </footer>
</template>

<style scoped>
footer {
    background-color: #2e2d2c;
    width: 1024px;
    height: 140px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

#footer-logo {
    width: 420px;
    height: 100px;
    background-repeat: no-repeat;
    background-size: contain;
}
</style>