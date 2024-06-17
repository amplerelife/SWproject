<script setup>
import { onMounted, ref, watchEffect } from 'vue'
import { useRoute } from 'vue-router'
import axios from 'axios'

import OverviewPost from '@/components/overview/OverviewPost.vue'
import PostComment from '@/components/forum/PostComment.vue'
import NewComment from '@/components/forum/NewComment.vue'
import { getCurrUser, wrapIntoArray } from '@/lib/utils'

const route = useRoute()
const props = defineProps({
  id: String
})

const id = ref(props.id)
const comments = ref([])
const newComment = ref('')

async function submitCommentHandler(context) {
  console.log(context)
  newComment.value = ''
  try {
    const result = await axios.post('/api/ad/addAdComment', {
      ADV_ID: id.value,
      usrname: await getCurrUser().id || 'A1105501',
      comment_detail: context,
      rate: 5,
      picture: 'example.jpg'
    })
    console.log(result)
  } catch (err) {
    console.error(err)
  }
  
  fetchComments()
}

async function fetchComments() {
  try {
    const result = await axios.post('/api/ad/showAdComment', {
      ADV_ID: id.value
    })
    comments.value = wrapIntoArray(result.data)
  } catch (err) {
    console.error(err)
  }
}

watchEffect(() => {
  id.value = props.id
  newComment.value = ''
})

onMounted(() => {
  fetchComments()
})
</script>

<template>
  <div class="display-region">
    <OverviewPost :id="id"></OverviewPost>
    <PostComment
      v-for="(_comment, index) in comments"
      :editing="false"
      :key="index"
      :index="index"
      :comment="_comment"
    ></PostComment>
    <NewComment :context="newComment" @submit-comment="submitCommentHandler"></NewComment>
  </div>
</template>

<style scoped>
.display-region {
  width: 50%;
  min-height: 80vh;

  display: flex;
  flex-direction: column;
  row-gap: 2vh;

  --comment-base-height: 5vh;

  & h1 {
    color: var(--color-text-dark);
  }
}
</style>
