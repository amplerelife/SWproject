<script setup>
const props = defineProps({
  comment: Object,
  index: Number
})
</script>

<template>
  <div class="wrapper">
    <img src="https://mc-heads.net/avatar/user" alt="">
    <div class="comment-container" :style="index % 2 ? {'background-color': 'var(--color-accent-light)'} : {}">
      <h1> {{ 'author_here' }} </h1>
      {{ props.comment }}
    </div>
  </div>
</template>

<style scoped>
.wrapper {
  display: flex;

  --shadow-offset: 0.4rem;
  --shadow-blur: 2rem;
  --self-shadow-blur: 0;

  transition: var(--transition-duration);

  & img {
    margin: 0.8vh;
    height: var(--comment-base-height);
    border-radius: 40%;
  }
}

.wrapper:hover {
  --shadow-offset: 0.8rem;
}

.comment-container { 
  color: var(--color-text-dark);

  min-height: var(--comment-base-height);
  flex-grow: 1;

  border-radius: 1rem;
  
  padding: 1rem;

  transition: var(--transition-duration-fast);
  box-shadow:
    calc(var(--shadow-offset) * -1) calc(var(--shadow-offset) * -1) var(--shadow-blur)
      rgba(255, 255, 255, 30%),
    var(--shadow-offset) var(--shadow-offset) var(--shadow-blur) rgba(0, 0, 0, 12%),
    0 0 var(--self-shadow-blur) var(--color-accent-soft);

  & h1 {
    width: fit-content;
    font-weight: bold;
  }
}
</style>