<script setup lang="ts">
import SearchList from '@/components/SearchList.vue'
</script>

<template>
  <div class="AccountList">
    <SearchList
      request_url="api/report/get"
      edit_to="/ReportObject"
      new_to="/ReportObject"
      delete_to=""
      button_delete
    ></SearchList>
  </div>
</template>

<style>
.AccountList {
  display: inline-block;
  width: 80vw;
}
</style>
