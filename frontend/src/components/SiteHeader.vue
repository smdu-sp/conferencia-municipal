<script setup>
import { onMounted } from 'vue'
import headerBg from '@/assets/header-bg.png'

onMounted(() => {
    document.getElementById('site-banner').style.backgroundImage = `url('${headerBg}')`
})
</script>

<template>
    <header>
        <div id="site-banner"></div>
        <section class="introducao">
            <p>Para uma São Paulo mais inclusiva e sustentável, a capital paulista realiza a 8ª Conferência da Cidade</p>
            <p><strong>Dias xx e xx de junho Local: xxx</strong></p>
        </section>
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

.introducao {
    background-color: #08b1aa;
    width: 100%;
    min-height: 160px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: start;
    padding: 20px 48px;
}

.introducao p {
    max-width: 600px;
    margin: 0;
    text-align: left;
    font-weight: bold;
    font-size: 18px;
}

.introducao p strong {
    font-weight: 800;
}
</style>