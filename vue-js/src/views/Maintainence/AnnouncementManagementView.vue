<script setup>
import SearchList from '@/components/SearchList.vue'
</script>

<template>
    <div class="AnnoucementList">
        <SearchList
            request_url="api/bull/bull_get"
            edit_to="/AnnouncementDetailView"
            delete_to =""
            new_to = "/AnnouncementDetailView"
            button_new
            button_delete
        ></SearchList>
    </div>
</template>

<style>
.AnnoucementList {
  display: inline-block;
  width: 80vw;
}
</style>
