<script setup>
import PageCard from '@/components/PageCard.vue'
</script>

<template>
  <div class="PageCardContainer">
    <div class="PageCardItem">
      <PageCard
        text="賬號管理"
        to="/AccountManage"
        routeName="AccountManage"
        icon_src="https://www.freeiconspng.com/uploads/head-icon-0.png"
      ></PageCard>
    </div>
    <div class="PageCardItem">
      <PageCard
        text="佈告欄管理"
        to="/AnnouncementManage"
        routeName="AnnouncementManage"
        icon_src="https://www.freeiconspng.com/uploads/note-paper-letter-blank-page-scroll-icon-25.png"
      ></PageCard>
    </div>
    <div class="PageCardItem">
      <PageCard
        text="廣告審核"
        to="/AdvAudit"
        routeName="AdvAudit"
        icon_src="https://www.freeiconspng.com/uploads/-advertising-marketing-mobile-ads-promotion-smartphone-icon--icon-1.png"
      ></PageCard>
    </div>
    <div class="PageCardItem">
      <PageCard
        text="舉報管理"
        to="/ReportManage"
        routeName="ReportManage"
        icon_src="https://www.freeiconspng.com/uploads/forum-icon-20.png"
      ></PageCard>
    </div>
  </div>
</template>

<style scoped>
.PageCardContainer {
  display: inline-block;
  margin-left: 5vw;
  margin-top: 2vw;
}
.PageCardItem {
  display: inline-block;
  margin: 3vw;
}
</style>
