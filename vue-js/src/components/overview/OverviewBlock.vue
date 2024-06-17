<script setup>
import { computed, ref, watchEffect } from 'vue'

import OverviewPost from '@/components/overview/OverviewPost.vue'

const props = defineProps({
  title: String,
  articles: Object,
  newPost: Boolean
})
const emit = defineEmits(['submitPost', 'delete'])
const articles = ref(props.articles)

const leftArticles = computed(() => articles.value.filter((value, index) => index % 2 == 0))
const rightArticles = computed(() => articles.value.filter((value, index) => index % 2 == 1))

watchEffect(() => {
  articles.value = props.articles
})
</script>

<template>
  <div class="display-region">
    <h1>{{ props.title }}</h1>
    <div class="card-region">
      <div class="card-block" id="left">
        <OverviewPost v-for="_article in leftArticles" :id="_article.id" :key="_article.id" @delete="(id) => {$emit('delete', id)}" @submit="(id, title, context) => {$emit('submitPost', id, title, context)}"/>
      </div>
      <div class="card-block" id="right">
        <OverviewPost v-for="_article in rightArticles" :id="_article.id" :key="_article.id" @delete="(id) => {$emit('delete', id)}"  @submit="(id, title, context) => {$emit('submitPost', id, title, context)}"/>
      </div>
      <OverviewPost
        v-if="props.newPost"
        class="new-post"
        :article="{}"
        :editing="true"
        @submit="(author, title, context) => $emit('submitPost', author, title, context)"
      ></OverviewPost>
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

.new-post {
  margin: 2%;
}
</style>
