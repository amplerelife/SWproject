<script setup>
import { useRoute, RouterLink } from 'vue-router'

const route = useRoute()

const props = defineProps({
  text: String,
  to: String,
  routeName: String
})
</script>

<template>
  <RouterLink :to="props.to" style="width: 10%">
    <div class="menu-bar-card">
      <h1 :class="{ curr: props.routeName == route.name }">
        {{ props.text }}
      </h1>
    </div>
  </RouterLink>
</template>

<style scoped>
.menu-bar-card {
  display: flex;
  align-content: center;
  align-items: center;

  & h1 {
    transition: 0.2s;
    text-decoration: none;
    font-size: 1.5rem;
    color: var(--color-text);
  }

  & h1.curr {
    transition: 0.2s;
    color: var(--color-accent);
  }
}
</style>
