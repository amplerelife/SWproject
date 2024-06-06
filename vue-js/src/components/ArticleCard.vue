<script setup>
  import { computed } from 'vue';
import AuthorAndTimestamp from './shared/AuthorAndTimestamp.vue'

  const now = Date.now()
  const props = defineProps(['article'])

</script>

<script>
  import { ref, onRenderTriggered } from 'vue'

  
  const test = () => {
    console.log('123');
  }
  onRenderTriggered(test)

  var i = ref(10)
  const textSize = computed(() => {
    return i.value + 'px'
  })
</script>

<template>
  <div class="card">
    <div class="card-header">
      <div class="avatar">
        <img src="https://mc-heads.net/avatar/user" alt="" />
      </div>
      <div class="title">
        <div id="title">{{ props.article.title }}</div>
        <AuthorAndTimestamp :author="props.article.author" :ts="now"></AuthorAndTimestamp>
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
    <div class="card-context" >
      <h1 class="test">
        {{ props.article.context }}
      </h1>
    </div>
    <div class="card-footer">
      {{ props.article.likes }}
    </div>
  </div>
</template>

<style scoped>
.card {
  --card-gap: var(--card-gap-base);
  width: calc(50% - 2 * var(--card-gap));
  --card-gap-virtical-ratio: 0.7;
  margin: calc(var(--card-gap) * var(--card-gap-virtical-ratio)) var(--card-gap)
    calc(var(--card-gap) * var(--card-gap-virtical-ratio)) var(--card-gap);
  padding: 0.8rem;
  border-radius: 0.8rem;
  transition: var(--transition-duration);

  --card-base-height: calc(0px + 40vh - 2 * var(--card-gap-virtical-ratio) * var(--card-gap));
  min-height: var(--card-base-height);
  max-height: calc(var(--card-base-height) + 20vh);
  overflow: hidden;

  color: var(--color-text-dark);
  background-color: var(--color-accent-soft);

  --shadow-offset: 0.4rem;
  --shadow-blur: 2rem;
  --self-shadow-blur: 0;
  box-shadow:
    calc(var(--shadow-offset) * -1) calc(var(--shadow-offset) * -1) var(--shadow-blur)
      rgba(255, 255, 255, 40%),
    var(--shadow-offset) var(--shadow-offset) var(--shadow-blur) rgba(0, 0, 0, 10%),
    0 0 var(--self-shadow-blur) var(--color-accent-soft);
}

.card:hover {
  size-adjust: 110%;
  background-color: var(--color-accent-hover);
  --shadow-offset: 1rem;
  --self-shadow-blur: 0.3rem;
  --card-gap: calc(var(--card-gap-base) * 0.9);
}

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

.card-context {
  width: 100%;
  overflow: hidden;
  
  transition: var(--transition-duration);
  color: var(--color-text-dark);
  
  container-type: inline-size;
  container-name: context;
}

.test {
  font-size: 5cqw;
}


</style>
