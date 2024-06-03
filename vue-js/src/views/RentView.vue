<script setup>
  import PageCard from '@/components/PageCard.vue';
</script>

<template>
  <div class="RentOveview">
    <main>
      <div class="PageCardContainer">
        <div class="PageCardItem"><PageCard text="查看租賃廣告" to="/ViewPost" routeName="ViewPost" icon_src="https://www.freeiconspng.com/uploads/communication-community-connection-global-internet-network-icon--14.png"></PageCard></div>
        <div class="PageCardItem"><PageCard text="添加租賃廣告" to="/CreatePost" routeName="CreatePost" icon_src="https://www.freeiconspng.com/uploads/upload-icon-29.png"></PageCard></div>
        <div class="PageCardItem"><PageCard text="編輯租賃廣告" to="/Editpost" routeName="Editpost" icon_src="https://www.freeiconspng.com/uploads/writer-icon-png-18.png"></PageCard></div>
        <div class="PageCardItem"><PageCard text="審核租賃廣告" to="/AuditPost" routeName="AuditPost" icon_src="https://www.freeiconspng.com/uploads/check-checklist-document-form-list-report-test-icon--icon--23.png"></PageCard></div>
      </div>
    </main>
  </div>
</template>

<style scoped>

  .PageCardContainer{
    display:inline-block;
    margin-left:5vw;
    margin-top:2vw;
    
    
  }
  .PageCardItem{
    display:inline-block;
    margin:3vw;
  }

</style>