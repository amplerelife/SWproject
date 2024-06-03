<script setup>
// import { useRoute , RouterLink } from 'vue-router'

// const route = useRoute()

// const props = defineProps({
//     text:String,
//     to: String,
//     routeName: String
// }
// )
</script>

<template>
    <div id = RentalInformationContainer>
    <h2 style="font-weight: bolder; font-style: italic; padding-bottom:5%">校外賃居資料</h2>
    <p>房東姓名：<input type="text"></p>
    <p>房東電話：<input type="text"> </p>
    <p>租賃地址：<input type="text"></p>
    <br>
    <p>
        祖屋型態：
        <input type="radio" id="HouseType" name="HouseType" value="透天"><label for="透天">獨棟透天</label>
        <input type="radio" id="HouseType" name="HouseType" value="公寓"><label for="公寓">公寓</label>
        <input type="radio" id="HouseType" name="HouseType" value="大樓"><label for="大樓">大樓</label> 
        <input type="radio" id="HouseType" name="HouseType" value="大型學宿"><label for="大型學宿">大型學宿</label>
    </p>
    <p>
        房間類型：
        <input type="radio" id="RoomType" name="RoomType" value="Studio">
        <label for="Studio">套房</label>
        <input type="radio" id="RoomType" name="RoomType" value="RoomToShare">
        <label for="RoomToShare">雅房</label>
    </p>
    <br>
    <p>
        每月租金：<input type="text">
    </p>
    <p>
        押金：<input type="text">
    </p>
    <p>
        是否值得推薦其他同學租賃：
        <input type="radio" id="recommend" name="recommend" value="yes"><label for="yes">是</label>
        <input type="radio" id="recommend" name="recommend" value="no"><label for="no">否</label>
    </p>
    </div>


</template>



<style scoped>
    #RentalInformationContainer{
        display:inline-block;
        padding:5%;
        color:aliceblue;
        background-color: var(--color-accent);
        border-radius:15%;
        font-size:20px;

        & p label{
            padding:1vw;
        }



    }
</style>

