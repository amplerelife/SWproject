<script setup>
import { ref } from 'vue';

import OverviewPost from '@/components/overview/OverviewPost.vue'
import PostComment from '@/components/forum/PostComment.vue'
import NewComment from '@/components/forum/NewComment.vue'
import { articles } from '@/test'

const article = articles[0]
const comments = ['123', 'haha', ':D', 'no']
const newComment = ref('')

function submitCommentHandler(context) {
  console.log(context)
  newComment.value = ''
}
</script>

<template>
  <div class="display-region">
    <OverviewPost :article="article"></OverviewPost>
    <PostComment
      v-for="(_comment, index) in comments"
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
