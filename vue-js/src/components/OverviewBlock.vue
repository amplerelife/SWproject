<script setup>
import { computed } from 'vue'

import OverviewCard from './ArticleCard.vue'
import { articles } from '@/test'

const leftArticles = computed(() => articles.filter((value, index) => index % 2 == 0))
const rightArticles = computed(() => articles.filter((value, index) => index % 2 == 1))
</script>

<template>
  <div class="display-region">
    <h1>Posts here:</h1>
    <div class="card-region">
      <div class="card-block" id="left">
        <OverviewCard v-for="(_article, index) in leftArticles" :article="_article" :key="index" />
      </div>
      <div class="card-block" id="right">
        <OverviewCard v-for="(_article, index) in rightArticles" :article="_article" :key="index" />
      </div>
    </div>
  </div>
</template>

<style scoped>
.display-region {
  width: 90%;
  min-height: 80vh;

  & h1 {
    color: var(--color-text-dark);
  }
}

.card-region {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
}

.card-block {
  display: flex;
  flex-wrap: wrap;
  --card-gap-base: 1cqw;
  width: 50%;

  align-content: flex-start;
}
</style>
