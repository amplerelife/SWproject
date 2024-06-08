<script setup>
import PageCard from '@/components/PageCard.vue'
</script>

<template>
  <div class="VisitOveview">
    <main>
      <div class="PageCardContainer">
        <div class="PageCardItem">
          <PageCard
            text="編輯訪視表單格式"
            to="/VisitForm"
            routeName="VisitForm"
            icon_src="https://www.freeiconspng.com/uploads/writing-icon-4.png"
          ></PageCard>
        </div>
        <div class="PageCardItem">
          <PageCard
            text="填寫與更新訪視表單"
            to="/VisitForm"
            routeName="VisitForm"
            icon_src="https://png.pngtree.com/png-vector/20230222/ourmid/pngtree-form-line-icon-png-image_6613120.png"
          ></PageCard>
        </div>
        <div class="PageCardItem">
          <PageCard
            text="搜索訪視表單"
            to="/SearchPage"
            routeName="SearchPage"
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
  margin-left: 5vw;
  margin-top: 2vw;
}
.PageCardItem {
  display: inline-block;
  margin: 5vw;
}
</style>
