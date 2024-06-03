<script setup>
import { useRoute, RouterLink } from 'vue-router'

const route = useRoute()

const props = defineProps({
  text: String,
  to: String,
  routeName: String,
  icon_src: String,

})
</script>

<template>
    <RouterLink :to="props.to" style="width: 10%">
      <div class="PageCard">
        <img :src= "props.icon_src" alt="icon not found"></img>
        <h1 :class="{ curr: props.routeName == route.name }">
        
          {{ props.text }}
        </h1>
      </div>
    </RouterLink>
  </template>

<style scope>

.PageCard{
    background-color: var(--color-accent-dark);
    width:20vw;
    height:23vw;
    text-align:center;
    padding:1vw;
    border-radius:25%;
    border: 2px solid black;
    transition:1s;

    & img{
        width:15vw;
        height:15vw;
    }
    & h1 {
        transition: 0.2s;
        text-decoration: none;
        font-size: 1.5rem;
        color: var(--color-text);
        }

    & h1.curr {
        transition: 0.2s;
        color: var(--color-accent);
        }
    }
  .PageCard:hover{
      opacity:0.8;
      background-color: var(--vt-c-divider-light-2);
      & h1{
        color:var(--color-accent-dark);
        font-weight: bold;
      }
    }
</style>