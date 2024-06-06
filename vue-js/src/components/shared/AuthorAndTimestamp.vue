<script setup>
const props = defineProps(['author', 'ts'])
</script>

<template>
  <div class="info-container">
    <div id="author">{{ props.author }}</div>
    <div id="delim">@</div>
    <div id="ts">{{ new Date(props.ts).toLocaleString() }}</div>
  </div>
</template>

<style scoped>
.info-container {
  display: flex;
  color: var(--color-text-gray);
  gap: 0.3rem;
  height: 50%;
  max-width: 100%;
  overflow: hidden;
  cursor: default;

  & #author {
    min-width: fit-content;
  }
}
</style>
