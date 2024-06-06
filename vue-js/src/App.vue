<script setup>
import { RouterView } from 'vue-router'

import MenuBar from './components/MenuBar.vue'
</script>

<template>
  <div class="wrapper">
    <MenuBar></MenuBar>

    <main class="main">
      <RouterView></RouterView>
    </main>
  </div>
</template>

<style scoped>
.wrapper {
  display: flex;
  flex-direction: column;

}

.main {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;

  --vertical-padding: 6vh;
  padding-top: var(--vertical-padding);
  padding-bottom: var(--vertical-padding);

  background-color: var(--color-background-soft);
}
</style>
