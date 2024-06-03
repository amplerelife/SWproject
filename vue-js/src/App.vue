<script setup>
import { RouterView } from 'vue-router'

import MenuBar from './components/MenuBar.vue'
</script>

<template>
  <div class="wrapper">
    <MenuBar></MenuBar>

    <main>
      <RouterView></RouterView>
    </main>
  </div>
</template>

<style scoped>
.wrapper {
  display: flex;
  flex-direction: column;

}
</style>
