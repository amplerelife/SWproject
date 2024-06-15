<script setup lang="ts">
import OverviewBlock from '@/components/overview/OverviewBlock.vue'
import FixedPosButton from '@/components/shared/FixedPosButton.vue'
import ForumPost from '@/components/forum/ForumPost.vue'
</script>

<template>
  <div class="container">
    <OverviewBlock v-if="!$route.params.id"></OverviewBlock>
    <ForumPost v-if="$route.params.id"></ForumPost>
    <FixedPosButton v-if="!$route.params.id" :buttons="{new: true, audit: true}" />
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
