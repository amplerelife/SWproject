<script setup>
import { RouterView } from 'vue-router'

import MenuBar from './components/menubar/MenuBar.vue'
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
  background-color: rgba(60, 60, 60, 0.12);

  --vertical-padding: 6vh;
  padding-top: var(--vertical-padding);
  padding-bottom: var(--vertical-padding);

  background-color: var(--color-background-soft);
}
</style>
