<script setup>
import { computed, nextTick, ref, watchEffect } from 'vue'

/**
 * This is a editable text componet, the passed in prop 'text' means the text being
 * displayed and the passed in 'editing' prop is a boolean whitch indicates if the
 *  text is being editing, after the editing is done (user pressed enter, or esc
 *  to discard changes) this component will emit a 'finish' event with
 * finish(bool edited, string content), bool edited is true when the user save it's
 *  changes, false when the user discard the changes, and the text is the content
 * that's been modified.
 */

const props = defineProps(['text', 'editing', 'adaptiveWidth', 'placeholder'])
const emit = defineEmits([
  'finish' // finish(bool edited, string content)
])

const textInput = ref(null)
const myText = ref(props.text)

watchEffect(async () => {
  if (props.editing) {
    await nextTick()
    textInput.value.focus()
  }
})

watchEffect(() => {
  myText.value = props.text
})

const inputWidth = computed(() => {
  if (props.adaptiveWidth) {
    return `calc(0.6em * ${myText.value?.length} + 1em)`
  } else {
    return '8em'
  }
})
</script>

<template>
  <div class="editable-text-wrapper">
    <div v-if="!editing" class="editable-text-text">
      {{ myText }}
    </div>

    <input
      type="text"
      v-if="editing"
      class="editable-text-input"
      ref="textInput"
      v-model="myText"
      @keyup.enter="textInput.blur()"
      @blur="$emit('finish', true, myText)"
      @keyup.esc="$emit('finish', false, '')"
    />
  </div>
</template>

<style scoped>
.editable-text-wrapper {
  font-size: inherit;
  font-weight: inherit;
  color: inherit;
  border-radius: inherit;
}

.editable-text-text {
  background: inherit;
  width: fit-content;
  color: inherit;
  font-size: inherit;
  font-weight: inherit;
}

.editable-text-input {
  background: var(--color-accent);
  border: none;
  border-radius: inherit;
  color: inherit;
  font-size: inherit;
  font-weight: inherit;
  padding: 0.2rem;
  text-wrap: wrap;
  height: 100%;
  width: 100%;
  transition: var(--transition-duration);

  z-index: 2;

  &:focus {
    border-radius: 5px;
    outline: var(--color-accent-mute) solid 2px;
    outline-offset: 3px;
  }
}
</style>
