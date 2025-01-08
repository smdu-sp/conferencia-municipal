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
</style>
