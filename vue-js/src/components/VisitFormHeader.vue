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
  <div id="visitHeaderContainer">
    <table border="1px solid black" style="width: 100%">
      <tr>
        <td style="text-align: left">系級：<input type="text" /></td>
        <td style="text-align: center">學號：<input type="text" /></td>
        <td style="text-align: center">姓名：<input type="text" /></td>
        <td style="text-align: end">聯絡電話：<input type="text" /></td>
      </tr>
      <tr>
        <td style="text-align: left">導師：<input type="text" /></td>
        <td style="width: 25%"></td>
        <td style="width: 25%"></td>
        <td style="text-align: end">
          訪視時間：<input type="date" id="VisitTime" name="VisitTime" />
        </td>
      </tr>
    </table>
  </div>
</template>

<style scope>
#visitHeaderContainer {
  width: 100vw;
  background-color: blanchedalmond;
  color: black;
  border: 1px solid black;
  /* border-radius:10%; */
  padding-top: 1%;
  padding-bottom: 1%;
  text-align: center;
  & table tr td input {
    color: black;
    margin: 1vh;
  }
}
</style>
