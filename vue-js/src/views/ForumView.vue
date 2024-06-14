<script setup lang="ts">
import OverviewCards from '@/components/OverviewBlock.vue'
</script>

<template>
  <div class="container">
    <OverviewCards></OverviewCards>
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
</style>
