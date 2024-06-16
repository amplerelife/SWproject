<script setup>
import { computed, ref } from 'vue'

var like = ref(false)

const showLike = computed(() => {
  if (like.value) {
    return { '--show': '0%' }
  } else {
    return { '--show': '100%' }
  }
})
</script>

<script></script>

<template>
  <div class="container">
    <div class="button-area like" @click="like = !like" :style="showLike">
      <svg class="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <title>thumb-up-outline</title>
        <path
          d="M5,9V21H1V9H5M9,21A2,2 0 0,1 7,19V9C7,8.45 7.22,7.95 7.59,7.59L14.17,1L15.23,2.06C15.5,2.33 15.67,2.7 15.67,3.11L15.64,3.43L14.69,8H21C22.11,8 23,8.9 23,10V12C23,12.26 22.95,12.5 22.86,12.73L19.84,19.78C19.54,20.5 18.83,21 18,21H9M9,19H18.03L21,12V10H12.21L13.34,4.68L9,9.03V19Z"
        />
      </svg>
      <svg class="not-show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <title>thumb-up</title>
        <path
          d="M23,10C23,8.89 22.1,8 21,8H14.68L15.64,3.43C15.66,3.33 15.67,3.22 15.67,3.11C15.67,2.7 15.5,2.32 15.23,2.05L14.17,1L7.59,7.58C7.22,7.95 7,8.45 7,9V19A2,2 0 0,0 9,21H18C18.83,21 19.54,20.5 19.84,19.78L22.86,12.73C22.95,12.5 23,12.26 23,12V10M1,21H5V9H1V21Z"
        />
      </svg>
    </div>
    <div class="button-area comment">
      <svg class="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <title>comment-outline</title>
        <path
          d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9M10,16V19.08L13.08,16H20V4H4V16H10Z"
        />
      </svg>
      <svg class="not-show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <title>comment</title>
        <path
          d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9Z"
        />
      </svg>
    </div>
  </div>
</template>

<style scoped>
.container {
  height: 100%;
  width: 100%;
  padding: 0;

  display: flex;
  align-items: center;
  justify-content: space-evenly;
  justify-items: center;

  --show: 100%;

  & .button-area {
    width: 25%;
    height: 100%;
    container-name: button-area;
    container-type: inline-size;

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;
  }

  & .button-area.like:hover {
    & svg {
      transform: rotate(-8deg);
    }
  }

  & .button-area.comment:hover {
    & svg {
      --show: 0%;
    }
  }

  & svg {
    position: absolute;
    container: button-area;
    height: 50%;
    width: 50%;
    opacity: 100%;
    transition: var(--transition-duration-fast);
    fill: var(--color-accent-dark);
  }

  & svg.show {
    opacity: var(--show);
  }

  & svg.not-show {
    opacity: calc(100% - var(--show));
  }
}
</style>
