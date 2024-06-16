<script setup>
import { RouterView } from 'vue-router'
import axios from 'axios';
import { ref, onMounted } from 'vue';

import MenuBar from './components/menubar/MenuBar.vue'

const Login = ref[false]

async function getLoginState() {
  try {
    const response = await axios.get('api/account/login_get'); // Adjust the endpoint to your actual endpoint
    console.log('API Response:', response.data); // Log the API response
    if (Array.isArray(response.data)) {
      Login.value = response.data;
      if (response.data.id.toString() === ""){
        Login.value = false;
      }
      else{
        Login.value = true;
      }
    } 
    else {
      console.error('API response is not an array');
    }
  }catch (error) {
      console.error('There was an error fetching the data!', error);
    }
  };


// onMounted(() => {
//   getLoginState();
// });


</script>

<template>
  <div class="wrapper">
    <MenuBar></MenuBar>

    <main class="main" :disabled="!Login">
      <RouterView></RouterView>
    </main>
    <!-- <h1 id="LoginBlocker" v-if="!Login">Please Login Before Access!</h1> -->
  </div>
</template>

<style scoped>
.wrapper {
  display: flex;
  flex-direction: column;
}
.main {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
  background-color: rgba(60, 60, 60, 0.12);

  --vertical-padding: 6vh;
  padding-top: var(--vertical-padding);
  padding-bottom: var(--vertical-padding);

  background-color: var(--color-background-soft);
}

#LoginBlocker{
  Position:fixed;
  top: 1vh;
  right: 21vw;
  font-size: 30px;

  
  vertical-align:center;
  margin: 0 auto;
  color:rgb(232, 26, 26);
}
</style>
