<script setup>
import { onMounted, ref, watchEffect } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from 'axios'

import EditableText from '@/components/shared/EditableText.vue'
import LikesAndComments from '@/components/LikesAndComments.vue'
import PostHeader from '@/components/overview/PostHeader.vue'
import { getCurrUser } from '@/lib/utils'

const route = useRoute()
const router = useRouter()
const props = defineProps({
  id: String,
  editing: Boolean
})
const emit = defineEmits(['submit', 'delete'])

const editing = ref(props.editing)
const author = ref('')
const title = ref('')
const context = ref('')
const response = ref('')

function gotoPost() {
  if (route.params.id || editing.value) return
  router.push(`/forum/${props.id}`)
}

async function editTitleHandler(_context) {
  editing.value = true
  title.value = _context
}

async function editedHandler() {
  editing.value = false
  emit('submit', props.id, title.value, context.value)
  fetchArticle()
}

async function auditPassedHandler() {
  try {
    const result = await axios.post('/api/AD/review', {
      id: props.id,
      response: '已處理'
    })
    console.log(result);
  } catch (err) {
    console.error(err)
  }
  fetchArticle()
}

async function fetchArticle() {
  try {
    const result = await axios.post('/api/ad/adDetail', {
      ADV_ID: props.id
    })
    const _ = result.data
    title.value = _.ADV_title
    context.value = _.ADV_content
    author.value = _.usrname
    response.value = _.response
  } catch (err) {
    console.error(err)
  }
}

onMounted(() => {
  fetchArticle()
})

watchEffect(() => {
  editing.value = props.editing
})
</script>

<script></script>

<template>
  <div class="card">
    <PostHeader
      :author="author"
      :title="title ? title : 'no title :('"
      :editing="editing"
      @editTitle="editTitleHandler"
      @delete="$emit('delete', props.id)"
    ></PostHeader>
    <!-- <div v-if="!editing" class="card-context" :class="{ inpost: !$route.params.id }" @click="gotoPost"> {{ context }} </div> -->
    <textarea
      class="card-context"
      :class="{ 'card-context-input': editing }"
      :style="!editing && !$route.params.id ? { cursor: 'pointer' } : {}"
      @click="gotoPost"
      :readonly="!editing"
      :key="editing"
      v-model="context"
      placeholder="context..."
    />
    <div class="card-footer" v-if="editing">
      <div
        class="submit-button"
        @click="editedHandler"
      >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <title>check</title>
          <path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
        </svg>
      </div>
    </div>
    <div class="card-footer" v-if="!editing">
      <LikesAndComments v-if="$route.params.id || response != '未處理'"></LikesAndComments>
      <div
        v-else
        class="submit-button"
        @click="auditPassedHandler"
      >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <title>check</title>
          <path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
        </svg>
      </div>
    </div>
  </div>
</template>

<style scoped>
.card {
  --card-gap: var(--card-gap-base);
  width: 100%;
  --card-gap-virtical-ratio: 0.7;
  margin: calc(var(--card-gap) * var(--card-gap-virtical-ratio)) var(--card-gap)
    calc(var(--card-gap) * var(--card-gap-virtical-ratio)) var(--card-gap);
  padding: 0.8rem;
  border-radius: 0.8rem;
  transition: var(--transition-duration);

  --card-base-height: 40vh;
  min-height: var(--card-base-height);
  overflow: visible;

  color: var(--color-text-dark);
  background-color: var(--color-accent-soft);

  --shadow-offset: 0.4rem;
  --shadow-blur: 2rem;
  --self-shadow-blur: 0;
  box-shadow:
    calc(var(--shadow-offset) * -1) calc(var(--shadow-offset) * -1) var(--shadow-blur)
      rgba(255, 255, 255, 30%),
    var(--shadow-offset) var(--shadow-offset) var(--shadow-blur) rgba(0, 0, 0, 12%),
    0 0 var(--self-shadow-blur) var(--color-accent-soft);
}

.card:hover {
  background-color: var(--color-accent-hover);
  --shadow-offset: 1rem;
  --self-shadow-blur: 0.3rem;
  transform: scale(102%);
}

.card-context {
  --context-height-ratio: 0.65;
  min-height: calc(var(--card-base-height) * var(--context-height-ratio));
  max-height: calc(var(--card-base-height) * var(--context-height-ratio) + 20vh);
  width: 100%;
  overflow: auto;
  scrollbar-color: var(--color-accent-dark) transparent;
  resize: none;

  transition: var(--transition-duration);
  background-color: transparent;
  color: var(--color-text-dark);

  container-type: inline-size;
  container-name: context;

  padding: 2%;
  border-radius: 1rem;
  font-size: 1.6rem;
}

.submit-button {
  display: flex;
  justify-content: center;
  height: 80%;
  width: 20%;

  border-radius: 1rem;
  background-color: var(--color-accent-light);

  transition: var(--transition-duration);

  & svg {
    transition: var(--transition-duration);
    height: 100%;
    fill: var(--color-accent-dark);
    --shadow-offset: 0;
    --shadow-blur: 0.1rem;
    filter: drop-shadow(
      var(--shadow-offset) var(--shadow-offset) var(--shadow-blur) var(--color-accent)
    );
  }
}

.submit-button:hover {
  transform: scale(105%);
  border-radius: 0.7rem;
  cursor: pointer;
  & svg {
    --shadow-offset: 0.15rem;
    --shadow-blur: 0.3rem;
    fill: var(--color-accent-darker);
  }
}

.card-footer {
  height: calc(var(--card-base-height) * 0.15);
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;

  transition: var(--transition-duration);
}

.card-context-input {
  background: var(--color-accent);
  width: 100%;
  height: max-content;

  resize: none;
}

.card-context-input:focus {
  outline: var(--color-accent-mute) solid 2px;
  outline-offset: 3px;
}
</style>
