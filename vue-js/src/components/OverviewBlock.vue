<script setup>
import OverviewCard from './ArticleCard.vue'

import { articles } from '@/test'
</script>

<template>
  <div class="display-region">
    <h1>Posts here:</h1>
    <div class="card-block">
      <OverviewCard v-for="_article in articles" :article="_article" :key="_article.id" />
    </div>
  </div>
</template>

<style scoped>
.display-region {
  /* display: flex; */
  width: 90%;
  min-height: 80vh;

  & h1 {
    color: var(--color-text-dark);
  }
}

.card-block {
  display: flex;
  flex-wrap: wrap;
  --card-gap-base: 1cqw;
}
</style>
