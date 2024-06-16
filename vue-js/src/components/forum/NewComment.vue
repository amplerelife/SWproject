<script setup>
import { ref, watchEffect } from 'vue'

const props = defineProps({
  context: String
})
const emit = defineEmits(['submitComment'])

const context = ref(props.context)

watchEffect(() => {
  context.value = props.context
})
</script>

<template>
  <div class="wrapper">
    <input type="text" placeholder="comment here" class="input-box" v-model="context" />
    <div class="submit" @click="$emit('submitComment', context)">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <title>send</title>
        <path d="M2,21L23,12L2,3V10L17,12L2,14V21Z" />
      </svg>
    </div>
  </div>
</template>

<style scoped>
.wrapper {
  display: flex;
  justify-content: center;

  align-items: center;
  column-gap: 1rem;
}

.input-box {
  background-color: var(--color-accent-light);

  align-self: center;
  border-radius: 1rem;
  min-height: var(--comment-base-height);
  width: 45%;
  padding: 1rem;

  color: var(--color-text-dark);

  transition: var(--transition-duration);
  --shadow-offset: 0.2rem;
  --shadow-blur: 0.3rem;
  box-shadow:
    inset var(--shadow-offset) var(--shadow-offset) var(--shadow-blur) var(--color-accent-light),
    var(--shadow-offset) var(--shadow-offset) var(--shadow-blur) var(--color-accent-soft);
}

.input-box:hover {
  --shadow-offset: 0.3rem;
  --shadow-blur: 0.7rem;
}

.input-box:focus {
  border: 0px;
  width: 50%;
}

.submit {
  /* background-color: black; */
  height: var(--comment-base-height);

  & svg {
    width: 90%;
    height: 90%;

    transition: var(--transition-duration-fast);
    fill: var(--color-accent);
  }

  & svg:hover {
    transform: scale(110%) rotate(-5deg);
    filter: drop-shadow(0.2rem 0.2rem 1px var(--color-accent-soft));
    cursor: pointer;
  }
}
</style>
