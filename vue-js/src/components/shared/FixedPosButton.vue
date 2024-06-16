<script setup>
import { computed, ref } from 'vue'

const props = defineProps({
  buttons: Object
})

const emit = defineEmits(['new', 'audit'])

var filterAudit = ref(false)

const filter = computed(() => {
  if (filterAudit.value) {
    return {
      '--background-color': 'var(--color-accent-dark)',
      '--icon-color': 'var(--color-accent)',
      '--icon-shadow-color': 'var(--color-accent-darker)'
    }
  } else {
    return {
      '--background-color': 'var(--color-accent)',
      '--icon-color': 'var(--color-accent-dark)',
      '--icon-shadow-color': 'var(--color-accent-soft-trans)'
    }
  }
})

function auditEmit() {
  filterAudit.value = !filterAudit.value
  emit('audit', filterAudit.value)
}

function newEmit() {
  emit('new')
}
</script>

<script>
class Buttons extends Object {
  constructor(_new, _audit) {
    super()
    this.new = _new || false
    this.audit = _audit || false
  }
}

export default {
  Buttons
}
</script>

<template>
  <div class="fixed-button-block">
    <div
      v-if="props.buttons.audit"
      class="button-container"
      id="audit"
      @click="auditEmit"
      :style="filter"
    >
      <div class="wrapper">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <title>monitor-eye</title>
          <path
            d="M3 4V16H21V4H3M3 2H21C22.1 2 23 2.89 23 4V16C23 16.53 22.79 17.04 22.41 17.41C22.04 17.79 21.53 18 21 18H14V20H16V22H8V20H10V18H3C2.47 18 1.96 17.79 1.59 17.41C1.21 17.04 1 16.53 1 16V4C1 2.89 1.89 2 3 2M10.84 8.93C11.15 8.63 11.57 8.45 12 8.45C12.43 8.46 12.85 8.63 13.16 8.94C13.46 9.24 13.64 9.66 13.64 10.09C13.64 10.53 13.46 10.94 13.16 11.25C12.85 11.56 12.43 11.73 12 11.73C11.57 11.73 11.15 11.55 10.84 11.25C10.54 10.94 10.36 10.53 10.36 10.09C10.36 9.66 10.54 9.24 10.84 8.93M10.07 12C10.58 12.53 11.28 12.82 12 12.82C12.72 12.82 13.42 12.53 13.93 12C14.44 11.5 14.73 10.81 14.73 10.09C14.73 9.37 14.44 8.67 13.93 8.16C13.42 7.65 12.72 7.36 12 7.36C11.28 7.36 10.58 7.65 10.07 8.16C9.56 8.67 9.27 9.37 9.27 10.09C9.27 10.81 9.56 11.5 10.07 12M6 10.09C6.94 7.7 9.27 6 12 6C14.73 6 17.06 7.7 18 10.09C17.06 12.5 14.73 14.18 12 14.18C9.27 14.18 6.94 12.5 6 10.09Z"
          />
        </svg>
      </div>
    </div>
    <div v-if="props.buttons.new" class="button-container" id="new" @click="newEmit">
      <div class="wrapper">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <title>plus</title>
          <path d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
        </svg>
      </div>
    </div>
  </div>
</template>

<style scoped>
.fixed-button-block {
  position: fixed;
  bottom: 7vh;
  right: 5vw;

  display: flex;
  flex-direction: column;
  row-gap: 2vh;

  --button-length: 4vw;
  height: fit-content;
  width: var(--button-length);
}

.button-container {
  height: var(--button-length);
  width: var(--button-length);

  --background-color: var(--color-accent);
  --icon-color: var(--color-accent-dark);
  --icon-shadow-color: var(--color-accent-soft-trans);
  border-radius: 50%;
  background-color: var(--background-color);
  --shadow-radius: 0.5rem;
  box-shadow:
    inset 0 0 var(--shadow-radius) var(--color-accent-dark),
    0 0 var(--shadow-radius) var(--color-accent-dark);

  display: flex;
  justify-content: center;

  transition: var(--transition-duration);

  & svg {
    transition: var(--transition-duration);
    fill: var(--icon-color);

    height: 100%;
    width: 100%;
  }
}

.button-container:hover {
  transform: scale(105%);
  --shadow-radius: 0.8rem;
  cursor: pointer;
}

.wrapper {
  transition: var(--transition-duration);
}

#audit {
  & .wrapper {
    width: 70%;
  }
}

#audit:hover {
  svg {
    --shadow-offset: calc(var(--button-length) * 0.06);
    filter: drop-shadow(var(--shadow-offset) var(--shadow-offset) 1.5px var(--icon-shadow-color));
  }
}

#new:hover {
  & .wrapper {
    transform: rotate(90deg);
  }
}
</style>
