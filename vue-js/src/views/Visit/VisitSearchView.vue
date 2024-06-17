<script setup>
import SearchList from '@/components/SearchList.vue'
import { useRoute, RouterLink } from 'vue-router';
import { ref, computed , onMounted } from 'vue';
import axios from 'axios';
import { getCurrUser } from '@/lib/utils';

const userLogin = ref("");

async function checkCurrentUser() {
  const user = await getCurrUser();
  console.log(user);
  if (user) {
    userLogin.value = user.id;
    console.log(userLogin.value);
  } else {
    console.log('No user is logged in');
  }
}

onMounted(() => {
    checkCurrentUser();
})



const teacherinfo = ref[{
    // "teacher_id":"B1

}]
</script>

<template>
    <div class="VisitSearch">
        <SearchList
            request_url="/api/account/teacher/students"
            :request_object= "userLogin"
            :key = "userLogin"
            edit_to="/VisitForm"
            new_to=""
            delete_to=""
            button_new
            button_delete
            
        ></SearchList>
    </div>
</template>

<style>
.VisitSearch {
  display: inline-block;
  width: 80vw;
}
</style>
