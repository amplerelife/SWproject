<script setup>
import MenuBarCard from './MenuBarCard.vue'
import { useRoute,RouterLink } from 'vue-router';

const route = useRoute();

</script>

<template>
  <div class="menu-bar">

    <RouterLink :to= '"/home"' style="width: 10%">
      <div class="home">
        Home
      </div>
    </RouterLink>


    <div class="cards">
      <MenuBarCard text="rent" to="/rent" routeName="rent"></MenuBarCard>
      <MenuBarCard text="visit" to="/visit" routeName="visit"></MenuBarCard>
      <MenuBarCard text="forum" to="/forum" routeName="forum"></MenuBarCard>
    </div>
    <div class="logout">logout</div>
  </div>
</template>

<style scoped>
.menu-bar {
  width: 100vw;
  height: 8vh;
  background-color: var(--color-accent-dark);

  display: grid;
  grid-template-columns: 30% 55% 15%;
  grid-template-areas: 'home cards logout';
  align-items: center;

  & .home {
    padding-left: 60%;
    grid-area: home;
    font-size: 2.5rem;
    font-weight: bold;
  }

  & .cards {
    grid-area: cards;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 100%;
  }
}
</style>
