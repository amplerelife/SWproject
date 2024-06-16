<script setup>
import { onMounted, ref, watchEffect } from 'vue'
import { useRoute } from 'vue-router'
import axios from 'axios'

import OverviewBlock from '@/components/overview/OverviewBlock.vue'
import FixedPosButton from '@/components/shared/FixedPosButton.vue'
import ForumPost from '@/components/forum/ForumPost.vue'

const route = useRoute()
const newPost = ref(false)
const articles = ref([])
const article = ref({})

async function submitPostHandler(author, title, context) {
  try {
    const result = await axios.post('/api/AD/add', {
      title: title, content: context
    })
    console.log(result.data)
  } catch (err) {
    console.error(err)
  }
  fetchArticles()
  newPost.value = false
}

async function fetchArticles() {
  try {
    const result = await axios.get('/api/AD/show/admin')
    articles.value = result.data
  } catch (err) {
    console.error(err)
  }
}

onMounted(async () => {
  fetchArticles()
})
</script>

<template>
  <div class="container">
    <OverviewBlock
      v-if="!$route.params.id"
      title="Forum Posts"
      :articles="articles"
      :new-post="newPost"
      @submit-post="submitPostHandler"
    ></OverviewBlock>
    <ForumPost v-if="$route.params.id" :id="$route.params.id"></ForumPost>
    <FixedPosButton
      v-if="!$route.params.id"
      :buttons="{ new: true, audit: true }"
      @new="newPost = true"
    ></FixedPosButton>
  </div>
</template>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 80%;
  padding: 5%;

  border-radius: 1.5rem;

  transition: var(--transition-duration);
  background-color: var(--color-accent-mute);
}

.display-region {
  width: 90%;
  min-height: 80vh;

  & h1 {
    color: var(--color-text-dark);
  }
}
</style>
