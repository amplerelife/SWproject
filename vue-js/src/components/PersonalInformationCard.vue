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
        <!-- <table>
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
        </table> -->
        <div class="PInfoLeft">
            <p>學號：<input type="text"></p>
            <p>性別：<input type="text"></p>
            <p>中文姓名：<input type="text"></p>
            <p>部別：<input type="text"></p>
            <p>系所：<input type="text"></p>
            <p>在學狀態：<input type="text"></p>
            <p>身份證字號：<input type="text"></p>
            <p>出身地：<input type="text"></p>
            <p>電子郵件信箱：<input type="text"></p>
        </div>
        <div class="PInfoRight">
            <p>身份別：<input type="text"></p>
            <p>出生年月日：<input type="text"></p>
            <p>英文姓名：<input type="text"></p>
            <p>院別：<input type="text"></p>
            <p>入學學年：<input type="text"></p>
            <p>護照號碼：<input type="text"></p>
            <p>祖籍：<input type="text"></p>
            <p>聯絡電話：<input type="text"></p>

        </div>



        

    </div>

</template>

<style scoped>
    /* .PersonalInformationContainer{
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
    } */
.PersonalInformationContainer{
    display:grid;
    width:80vw;
    grid-template-columns: 50% 50%;
    grid-template-areas: 'PInfoLeft PInfoRight';
    align-items: center;
    font-size:2vw;
    color:white;
    padding: 5%;
    background-color: var(--vt-c-divider-dark-2);
    margin: 0 auto;
    margin-top:2%;
    border-radius: 5%;

    p{
        border: 1px solid black;
        font-size:3vh;
    }

    input {
        margin:1vh;
        color:black;

    }

}
.PInfoLeft{
    grid-area:'PInfoLeft';
    text-align:left;
    display:inline-block;


}
.PInfoRight{
    grid-area:'PInfoRight';
    text-align:right;
    display:inline-block;
}



</style>