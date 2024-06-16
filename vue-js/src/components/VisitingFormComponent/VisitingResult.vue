<script setup>
import { ref } from 'vue';

// Reactive state for each form input
const visitResult = ref('');
const otherVisitResult = ref('');
const otherNotes = ref('');
const trafficSafety = ref(false);
const smokeRefuse = ref(false);
const drugRefuse = ref(false);
const dengiDefence = ref(false);
const otherSubject = ref(false);
const careReason = ref('');

function getData() {
  return {
    visitResult: visitResult.value,
    otherVisitResult: otherVisitResult.value,
    otherNotes: otherNotes.value,
    careTopics: {
      trafficSafety: trafficSafety.value,
      smokeRefuse: smokeRefuse.value,
      drugRefuse: drugRefuse.value,
      dengiDefence: dengiDefence.value,
      otherSubject: otherSubject.value,
      careReason: careReason.value,
    },
  };
}

function clearData() {
  visitResult.value = '';
  otherVisitResult.value = '';
  otherNotes.value = '';
  trafficSafety.value = false;
  smokeRefuse.value = false;
  drugRefuse.value = false;
  dengiDefence.value = false;
  otherSubject.value = false;
  careReason.value = '';
}

// Expose methods to parent component
defineExpose({ getData, clearData });
</script>

<template>
  <div class="VisitResult">
    <h1 style="font-weight: bolder; padding-bottom: 5%; font-size: 5vw" id="444">訪視結果</h1>
    <p>
      <input type="radio" id="NoProblem" name="VisitResult" value="NoProblem" v-model="visitResult" />
      <label for="NoProblem">整體賃居狀況良好</label>
    </p>
    <p>
      <input type="radio" id="ContactToParent" name="VisitResult" value="ContactToParent" v-model="visitResult" />
      <label for="ContactToParent">聯係家長關注</label>
    </p>
    <p>
      <input type="radio" id="SafetyNeedAssist" name="VisitResult" value="SafetyNeedAssist" v-model="visitResult" />
      <label for="SafetyNeedAssist">安全堪慮請協助</label>
    </p>
    <p>
      <input type="radio" id="Others" name="VisitResult" value="Others" v-model="visitResult" />
      <label for="Others">其他： </label>
      <input type="text" v-model="otherVisitResult" />
    </p>
    <br />
    <p>
      其他記載或建議事項:
      <textarea type="text" rows="3" cols="24" placeholder="1." name="other" v-model="otherNotes"></textarea>
    </p>

    <br /><br />
    <div class="SubjectSharing">
      <h2 style="font-weight: bolder; padding-bottom: 2%">關懷宣導項目</h2>
      <input type="checkbox" id="trafficSafety" name="trafficSafety" value="trafficSafety" v-model="trafficSafety" />
      <label for="trafficSafety">交通安全</label>
      <input type="checkbox" id="SmokeRefuse" name="SmokeRefuse" value="SmokeRefuse" v-model="smokeRefuse" />
      <label for="SmokeRefuse">拒絕烟害</label>
      <input type="checkbox" id="DrugRefuse" name="DrugRefuse" value="DrugRefuse" v-model="drugRefuse" />
      <label for="DrugRefuse">拒絕毒品</label>
      <input type="checkbox" id="DengiDefence" name="DengiDefence" value="DengiDefence" v-model="dengiDefence" />
      <label for="DengiDefence">登革熱防治</label>
      <input type="checkbox" id="OtherSubject" name="OtherSubject" value="OtherSubject" v-model="otherSubject" />
      <label for="OtherSubject">其他，説明</label>
      <input type="text" name="care_reason" v-model="careReason" />
    </div>
  </div>
</template>

<style scoped>
.VisitResult {
  width: 100%;
  display: inline-block;
  color: black;
  padding: 5%;
  font-size: 22px;
  margin: 1vw;
}

input {
  margin: 1vh;
  color: black;
}

table, th, td {
  border: 1px solid black;
  padding: 1vw;
}

p {
  padding: 1vw;
  transition: 0.15s;
}

p:hover {
  font-weight: bold;
}

p:hover label {
  font-weight: bold;
}

.SubjectSharing {
  color: black;
}
</style>
