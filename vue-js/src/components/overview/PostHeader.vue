<script setup>
import { ref, watchEffect } from 'vue'

import AuthorAndTimestamp from '@/components/shared/AuthorAndTimestamp.vue'
import EditableText from '@/components/shared/EditableText.vue'

const now = Date.now()
const props = defineProps({
  author: String,
  title: String,
  editing: Boolean
})
const emit = defineEmits(['editTitle'])
const editingTitle = ref(props.editing)

watchEffect(() => {
  editingTitle.value = props.editing
})
</script>

<template>
  <div class="card-header">
    <div class="avatar">
      <img src="https://mc-heads.net/avatar/user" alt="" />
    </div>
    <div class="title">
      <EditableText
        id="title"
        :style="props.title ? {} : { color: 'var(--color-text-gray)' }"
        :text="props.title"
        :editing="editingTitle"
        @finish="(finished, context) => finished && $emit('editTitle', context)"
      ></EditableText>
      <AuthorAndTimestamp :author="props.author" :ts="now"></AuthorAndTimestamp>
    </div>
    <div class="icon" id="more">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <title>dots-horizontal</title>
        <path
          d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z"
        />
      </svg>
    </div>
    <div class="icon" id="delete">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <title>close-circle-outline</title>
        <path
          d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22C17.53,22 22,17.53 22,12C22,6.47 17.53,2 12,2M14.59,8L12,10.59L9.41,8L8,9.41L10.59,12L8,14.59L9.41,16L12,13.41L14.59,16L16,14.59L13.41,12L16,9.41L14.59,8Z"
        />
      </svg>
    </div>
  </div>
</template>

<style scoped>
.card-header {
  height: calc(var(--card-base-height) * 0.2);
  display: flex;
  justify-content: flex-end;
  transition: var(--transition-duration);

  & .avatar {
    padding-right: 2%;
    img {
      height: 100%;
      max-width: fit-content;
      padding: 10%;
      border-radius: 30%;
    }
  }

  & .title {
    width: 100%;
    vertical-align: middle;
    font-weight: bold;
    font-size: 120%;
    padding-top: 0.8%;
    border-radius: 0.5rem;

    & #title {
      color: var(--color-text-dark);
    }
  }

  & .icon {
    align-self: flex-end;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-right: 1%;

    svg {
      height: 60%;
      fill: var(--color-border);
    }

    svg:hover {
      fill: var(--color-border-hover);
    }
  }
}
</style>
