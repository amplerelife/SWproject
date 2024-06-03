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
    <div class="PersonalInformationContainer">
        <table>
            <tr>
                <td>學號：<input type="text"></td>
                <td>身份別：<input type="text"></td>
            </tr>
            <tr>
                <td>性別：<input type="text"></td>
                <td>出生年月日：<input type="text"></td>
            </tr>
            <tr>
                <td>中文姓名：<input type="text"></td>
                <td>英文姓名：<input type="text"></td>
            </tr>
            <tr>
                <td>部別：<input type="text"></td>
                <td>院別：<input type="text"></td>
            </tr>
            <tr>
                <td>系所：<input type="text"></td>
                <td>入學學年：<input type="text"></td>
            </tr>
            <tr>
                <td>在學狀態：<input type="text"></td>
            </tr>
            <tr>
                <td>身份證字號：<input type="text"></td>
                <td>護照號碼：<input type="text"></td>
            </tr>
            <tr>
                <td>出身地：<input type="text"></td>
                <td>祖籍：<input type="text"></td>
            </tr>
            <tr>
                <td>電子郵件信箱：<input type="text"></td>
                <td>聯絡電話：<input type="text"></td>
            </tr>
        </table>
    </div>

</template>

<style scoped>
    .PersonalInformationContainer{
        width:80%;
        display:inline-block;
        background-color: var(--vt-c-divider-dark-2);
        color:azure;
        border-radius:5%;
        font-size:20px;
        padding:5%;
        & table{
            
            width:80%;
            margin: 0 auto;
            
        }
        & table tr td{
            border:2px solid black;
            font-weight:bold;
            padding:2%;

        }
    }


</style>