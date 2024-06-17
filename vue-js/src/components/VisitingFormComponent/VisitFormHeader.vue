<script setup>
import { ref } from 'vue'

const grade = ref('')
const student_id = ref('')
const student_name_ch = ref('')
const student_tel = ref('')
const teacher = ref('')
const visit_time = ref('')

function getData() {
  return {
    grade: grade.value,
    student_id: student_id.value,
    student_name_ch: student_name_ch.value,
    student_tel: student_tel.value,
    teacher: teacher.value,
    visit_time: visit_time.value
  }
}

function clearData() {
  grade.value = ''
  student_id.value = ''
  student_name_ch.value = ''
  student_tel.value = ''
  teacher.value = ''
  visit_time.value = ''
}

// Expose methods to parent component
defineExpose({ getData, clearData })
</script>

<template>
  <div class="visitHeaderContainer" id="000">
    <h1 style="font-size: 4vw; font-weight: bolder">學生基本資料</h1>
    <p>系級：<input type="text" v-model="grade" name="grade" /></p>
    <p>學號：<input type="text" v-model="student_id" name="student_id" /></p>
    <p>姓名：<input type="text" v-model="student_name_ch" name="student_name_ch" /></p>
    <p>聯絡電話：<input type="text" v-model="student_tel" name="student_tel" /></p>
    <p>導師：<input type="text" v-model="teacher" name="teacher" /></p>
    <p>訪視時間：<input type="date" v-model="visit_time" id="VisitTime" name="VisitTime" /></p>
  </div>
</template>

<style scoped>
.visitHeaderContainer {
  width: 100%;
  color: black;
  padding-top: 1%;
  padding-bottom: 1%;
  font-size: 2vw;
  text-align: center;
}
.visitHeaderContainer p {
  margin: 5%;
  transition: 0.15s;
}
.visitHeaderContainer p:hover {
  font-weight: bold;
}
</style>
