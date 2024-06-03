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
    <div class="AnnoucementContainer">
        <h1>公告欄</h1>
        <table>
            <!-- <tr>
                <th>序號</th>
                <th>事項</th>
                <th>日期</th>
            </tr> -->
            <tr>
                <td id="index" style="width:5%; text-align:center"><p>
                    0
                </p></td>
                <td style="width:80%"><p>
                    這是測試用的！
                </p></td>
                <td style="width:15%;text-align: center;"><p>
                    <input type="date">
                </p></td>
            </tr>
            <tr>
                <td id="index" style="width:5%; text-align:center"><p>
                    1
                </p></td>
                <td style="width:80%"><p>
                    這也是測試用的！
                </p></td>
                <td style="width:15%;text-align: center;"><p>
                    <input type="date">
                </p></td>
            </tr>

        </table>

    </div>
</template>

<style scoped>

.AnnoucementContainer{
    width:85vw;
    background-color: var(--color-accent-mute);
    color:black;
    padding:1vw;
    margin: 0 auto;
    border:1px dashed black;
    /* background-image: url(); */
    & h1{
        font-weight: bolder;
        text-align:center;
        text-decoration: underline;

    }
    & table{
        margin-left: auto;
        margin-right: auto;
        /* border : 1px dotted black; */
        width:80vw;
    }
    /* & table tr th{
        font-weight: bolder;
        font-size:24px;
    } */
    &table tr td{
        font-size:18px;
        padding:1vw;
    }
}
#index{
    border-right:2px solid black;
}
</style>