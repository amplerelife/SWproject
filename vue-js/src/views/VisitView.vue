<script setup>
  import { useRoute, RouterLink } from 'vue-router';
  import { ref, computed , onMounted } from 'vue';
  import axios from 'axios';
  import { getCurrUser } from '@/lib/utils';
  import PageCard from '@/components/PageCard.vue'


  const route = useRoute();


  const userLogin = ref("");

  async function checkCurrentUser() {
    const user = await getCurrUser();
    console.log(user);
    if (user) {
      userLogin.value = user.usertype;
      console.log(userLogin.value);
    } else {
      console.log('No user is logged in');
    }
  }


  onMounted(() => {
      checkCurrentUser();
  })
</script>



<template>
  <div class="VisitOveview">
    <main>
      <div class="PageCardContainer" >
         <!-- <div class="PageCardItem">
          <PageCard
            text="編輯訪視表單格式"
            to="/VisitForm"
            routeName="VisitForm"
            icon_src="https://www.freeiconspng.com/uploads/writing-icon-4.png"
          ></PageCard>
        </div> --> 
        <div v-if ="userLogin == 'teacher' || userLogin == 'student' " class="PageCardItem" >
          <PageCard
            text="填寫與更新訪視表單"
            to="/VisitForm"
            routeName="VisitForm"
            icon_src="https://png.pngtree.com/png-vector/20230222/ourmid/pngtree-form-line-icon-png-image_6613120.png"
          ></PageCard>
        </div>
        <div v-if ="userLogin == 'teacher'" class="PageCardItem" >
          <PageCard
            text="搜索訪視表單"
            to="/VisitSearchPage"
            routeName="VisitSearchPage"
            icon_src="https://www.freeiconspng.com/uploads/search-icon-png-21.png"
          ></PageCard>
        </div>
      </div>
    </main>
  </div>
</template>

<style scoped>
.PageCardContainer {
  display: inline-block;
  vertical-align: center;
}
.PageCardItem {
  display: inline-block;
  margin: 5vw;
}
</style>
