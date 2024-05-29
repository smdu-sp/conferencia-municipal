<script setup>
import SiteHeader from '@/components/SiteHeader.vue'
import SiteFooter from '@/components/SiteFooter.vue'
import PageContent from '@/components/pages/home/PageContent.vue'
</script>

<template>
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
</style>
