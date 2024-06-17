<script setup>
import { ref } from 'vue'


// Reactive state for each form input
const deposit = ref('');
const waterAndElectricityCharges = ref('');
const environment = ref('');
const enviroment_reason = ref('');
const live_enviroment = ref('');
const live_enviroment_reason = ref('');
const now = ref('');
const now_reason = ref('');
const relationship = ref('');

function getData() {
  return {
    deposit: deposit.value,
    waterAndElectricityCharges: waterAndElectricityCharges.value,
    environment: environment.value,
    enviroment_reason: enviroment_reason.value,
    live_enviroment: live_enviroment.value,
    live_enviroment_reason: live_enviroment_reason.value,
    now: now.value,
    now_reason: now_reason.value,
    relationship: relationship.value,
  };
}

function clearData() {
  deposit.value = '';
  waterAndElectricityCharges.value = '';
  environment.value = '';
  enviroment_reason.value = '';
  live_enviroment.value = '';
  live_enviroment_reason.value = '';
  now.value = '';
  now_reason.value = '';
  relationship.value = '';
}

// Expose methods to parent component
defineExpose({ getData, clearData })
</script>

<template>
  <div class="VisitFormTeacherContainer">
    <div class="VisitAnalysis">
      <h1 style="font-weight: bolder; padding-bottom: 5%; font-size: 5vw" id="333">
        環境與作息評估
      </h1>
      <table>
        <tr>
          <td>押金要求</td>
          <td>
            <input
              type="radio"
              id="DepositMakeSense"
              name="Deposit"
              value="MakeSense"
              v-model="deposit"
            />
            <label for="DepositMakeSense">合理</label>
          </td>
          <td>
            <input
              type="radio"
              id="DepositNotMakeSense"
              name="Deposit"
              value="NotMakeSense"
              v-model="deposit"
            />
            <label for="DepositNotMakeSense">不合理</label>
          </td>
        </tr>

        <tr>
          <td>水電費要求</td>
          <td>
            <input type="radio" id="WaterAndElectricityChargesMakeSense" name="WaterAndElectricityCharges" value="1" v-model="waterAndElectricityCharges" />
            <label for="WaterAndElectricityChargesMakeSense">合理</label>
          </td>
          <td>
            <input type="radio" id="WaterAndElectricityChargesNotMakeSense" name="WaterAndElectricityCharges" value="0" v-model="waterAndElectricityCharges" />
            <label for="WaterAndElectricityChargesNotMakeSense">不合理</label>
          </td>
        </tr>

        <tr>
          <td>居住環境</td>
          <td>
            <input type="radio" id="EnvironmentBest" name="Environment" value="2" v-model="environment" />
            <label for="EnvironmentBest">佳</label>
          </td>
          <td>
            <input type="radio" id="EnvironmentGood" name="Environment" value="1" v-model="environment" />
            <label for="EnvironmentGood">適中</label>
          </td>
          <td>
            <input type="radio" id="EnvironmentBad" name="Environment" value="0" v-model="environment" />
            <label for="EnvironmentBad">欠佳，説明：</label>
            <input type="text" v-model="enviroment_reason" />
          </td>
        </tr>

        <tr>
          <td>生活設施</td>
          <td>
            <input type="radio" id="live_enviromentBest" name="live_enviroment" value="2" v-model="live_enviroment" />
            <label for="live_enviromentBest">佳</label>
          </td>
          <td>
            <input type="radio" id="live_enviromentGood" name="live_enviroment" value="1" v-model="live_enviroment" />
            <label for="live_enviromentGood">適中</label>
          </td>
          <td>
            <input type="radio" id="live_enviromentBad" name="live_enviroment" value="0" v-model="live_enviroment" />
            <label for="live_enviromentBad">欠佳，説明：</label>
            <input type="text" v-model="live_enviroment_reason" />
          </td>
        </tr>

        <tr>
          <td>訪視現況</td>
          <td>
            <input type="radio" id="nowStable" name="now" value="2" v-model="now" />
            <label for="nowStable">生活規律</label>
          </td>
          <td>
            <input type="radio" id="nowNormal" name="now" value="1" v-model="now" />
            <label for="nowNormal">適中</label>
          </td>
          <td>
            <input type="radio" id="nowMustImprove" name="now" value="0" v-model="now" />
            <label for="nowMustImprove">待加强，説明：</label>
            <input type="text" v-model="now_reason" />
          </td>
        </tr>

        <tr>
          <td>主客相處</td>
          <td>
            <input type="radio" id="relationshipHarmony" name="relationship" value="1" v-model="relationship" />
            <label for="relationshipHarmony">和睦</label>
          </td>
          <td>
            <input type="radio" id="relationshipNoGood" name="relationship" value="0" v-model="relationship" />
            <label for="relationshipNoGood">欠佳</label>
          </td>
        </tr>
      </table>
    </div>
  </div>
</template>

<style scoped>
.VisitFormTeacherContainer {
  display: inline-block;
  width: 100%;
  color: black;
  padding: 5%;
  font-size: 22px;
  margin: 1vw;
}

input {
  margin: 1vh;
  color: black;
}

table,
th,
td {
  border: 1px solid black;
  padding: 1vw;
  margin: 0 auto;
  transition: 0.15s;
}

p {
  padding: 1vw;
}

table tr td:hover {
  font-weight: bold;
}

table tr td:hover label {
  font-weight: bold;
}

.VisitAnalysis {
  color: black;
}
</style>
