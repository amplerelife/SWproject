<script setup>
import { useRoute, RouterLink } from 'vue-router'

const route = useRoute()

const props = defineProps({
  text: String,
  to: String,
  routeName: String,
  icon_src: String
})
</script>

<template>
  <RouterLink :to="props.to" style="width: 10%">
    <div class="PageCard">
      <img :src="props.icon_src" alt="icon not found" />
      <h1 :class="{ curr: props.routeName == route.name }">
        {{ props.text }}
      </h1>
    </div>
  </RouterLink>
</template>

<style scope>
.PageCard {
  /* background-color: var(--color-accent-dark); */
  width: 19vw;
  height: 23vw;
  text-align: center;
  padding: 1vw;
  border-radius: 25%;
  border: 0px solid black;
  transition: 0.5s;

  & img {
    display: inline-block;
    width: 15vw;
    height: 15vw;
  }
  & h1 {
    transition: 0.2s;
    text-decoration: none;
    font-size: 1.2rem;
    color: var(--color-accent-dark);
  }

  & h1.curr {
    transition: 0.2s;
    color: var(--color-accent);
  }
}
.PageCard:hover {
  opacity: 0.7;

  /* background-color: var(--vt-c-divider-light-2); */
  & h1 {
    transition: 0.2s;
    color: var(--color-accent-dark);
    font-weight: bold;
  }
  & img {
    transition: 0.5s;
    width: 16vw;
    height: 16vw;
  }
}
</style>
