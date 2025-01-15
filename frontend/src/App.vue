<script setup>
import AcessibilityBar from './components/AcessibilityBar.vue';
import SiteHeader from '@/components/SiteHeader.vue'
import SiteFooter from '@/components/SiteFooter.vue'
import PageContent from '@/components/pages/home/PageContent.vue'
</script>

<template>
  <AcessibilityBar></AcessibilityBar>
  <div class="grid-container">
    <SiteHeader></SiteHeader>
    <PageContent></PageContent>
  </div>
  <SiteFooter></SiteFooter>
</template>

<style scoped>
.grid-container {
  max-width: 1000px;
  margin: 0 auto;
  padding: 0 20px;
}

@media (max-width: 960px) {
  .grid-container {
    width: 100vw;
    max-width: 100vw;
    padding: 0;
    margin: 0;
  }
}

</style>
