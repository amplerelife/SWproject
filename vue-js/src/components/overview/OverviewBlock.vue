<script setup>
import { computed } from 'vue'

import OverviewPost from '@/components/overview/OverviewPost.vue'
import { articles } from '@/test'

const props = defineProps({
  title: String,
  newPost: Boolean
})
const emit = defineEmits(['submitPost'])

const leftArticles = computed(() => articles.filter((value, index) => index % 2 == 0))
const rightArticles = computed(() => articles.filter((value, index) => index % 2 == 1))

</script>

<template>
  <div class="display-region">
    <h1>{{ props.title }}</h1>
    <div class="card-region">
      <div class="card-block" id="left">
        <OverviewPost v-for="(_article, index) in leftArticles" :article="_article" :key="index" />
        <OverviewPost
          v-if="props.newPost"
          :article="{}"
          :editing="true"
          @submit="(author, title, context) => $emit('submitPost', author, title, context)"
        ></OverviewPost>
      </div>
      <div class="card-block" id="right">
        <OverviewPost v-for="(_article, index) in rightArticles" :article="_article" :key="index" />
      </div>
    </div>
  </div>
</template>

<style scoped>
.display-region {
  width: 90%;
  min-height: 80vh;

  & h1 {
    font-size: 4rem;
    font-weight: bold;
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
