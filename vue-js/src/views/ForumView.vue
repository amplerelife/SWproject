<script setup lang="ts">
import { ref } from 'vue'

import OverviewBlock from '@/components/overview/OverviewBlock.vue'
import FixedPosButton from '@/components/shared/FixedPosButton.vue'
import ForumPost from '@/components/forum/ForumPost.vue'

const newPost = ref(false)
function submitPostHandler(author, title, context) {
  console.log(author, title, context);
  newPost.value = false;
}
</script>

<template>
  <div class="container">
    <OverviewBlock v-if="!$route.params.id" title="Forum Posts" :new-post="newPost" @submit-post="submitPostHandler"></OverviewBlock>
    <ForumPost v-if="$route.params.id"></ForumPost>
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
