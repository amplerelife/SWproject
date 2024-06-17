<script setup lang="ts">
  import SearchListEx from "@/components/SearchListEx.vue"
</script>

<template>
  <div class="AccountList">
    <SearchListEx
      request_url="api/account/usrname"
      edit_to="/PersonalInformation"
      new_to="/AccountCreate"
      delete_to=""
      button_new
      button_delete
    ></SearchListEx>
  </div>
</template>

<style>
.AccountList {
  display: inline-block;
  width: 80vw;
}
</style>
