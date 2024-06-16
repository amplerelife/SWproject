<script setup>
import SearchList from '@/components/SearchList.vue'
</script>


<template>
    <div class="VisitSearch">
        <SearchList
            request_url="api/account/teacher/students POST"
            request_object=""
            edit_to="/VisitForm"
            new_to=""
            delete_to=""
            button_new
            button_delete
            
        ></SearchList>
    </div>
</template>

<style>
.VisitSearch{
    display:inline-block;
    width:80vw;

}
</style>
