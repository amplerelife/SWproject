<script setup lang="ts">
import SearchList from '@/components/SearchList.vue'
</script>

<template>
    <div class="AccountList">
        <SearchList
            request_url="api/account/usrname"
            edit_to="/PersonalInformation"
            new_to="/AccountCreate"
            delete_to=""
            button_new
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
