<script setup>
import { ref } from 'vue'

// Reactive state for each form input
const deposit = ref('')
const waterAndElectricityCharges = ref('')
const environment = ref('')
const environmentExplanation = ref('')
const residentialFacilities = ref('')
const residentialFacilitiesExplanation = ref('')
const visitStatus = ref('')
const visitStatusExplanation = ref('')
const hostRelation = ref('')

function getData() {
  return {
    deposit: deposit.value,
    waterAndElectricityCharges: waterAndElectricityCharges.value,
    environment: environment.value,
    environmentExplanation: environmentExplanation.value,
    residentialFacilities: residentialFacilities.value,
    residentialFacilitiesExplanation: residentialFacilitiesExplanation.value,
    visitStatus: visitStatus.value,
    visitStatusExplanation: visitStatusExplanation.value,
    hostRelation: hostRelation.value
  }
}

function clearData() {
  deposit.value = ''
  waterAndElectricityCharges.value = ''
  environment.value = ''
  environmentExplanation.value = ''
  residentialFacilities.value = ''
  residentialFacilitiesExplanation.value = ''
  visitStatus.value = ''
  visitStatusExplanation.value = ''
  hostRelation.value = ''
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
            <input
              type="radio"
              id="WaterAndElectricityChargesMakeSense"
              name="WaterAndElectricityCharges"
              value="MakeSense"
              v-model="waterAndElectricityCharges"
            />
            <label for="WaterAndElectricityChargesMakeSense">合理</label>
          </td>
          <td>
            <input
              type="radio"
              id="WaterAndElectricityChargesNotMakeSense"
              name="WaterAndElectricityCharges"
              value="NotMakeSense"
              v-model="waterAndElectricityCharges"
            />
            <label for="WaterAndElectricityChargesNotMakeSense">不合理</label>
          </td>
        </tr>

        <tr>
          <td>居住環境</td>
          <td>
            <input
              type="radio"
              id="EnvironmentBest"
              name="Environment"
              value="Best"
              v-model="environment"
            />
            <label for="EnvironmentBest">佳</label>
          </td>
          <td>
            <input
              type="radio"
              id="EnvironmentGood"
              name="Environment"
              value="Good"
              v-model="environment"
            />
            <label for="EnvironmentGood">適中</label>
          </td>
          <td>
            <input
              type="radio"
              id="EnvironmentBad"
              name="Environment"
              value="Bad"
              v-model="environment"
            />
            <label for="EnvironmentBad">欠佳，説明：</label>
            <input type="text" v-model="environmentExplanation" />
          </td>
        </tr>

        <tr>
          <td>生活設施</td>
          <td>
            <input
              type="radio"
              id="ResidentialFacilitiesBest"
              name="ResidentialFacilities"
              value="Best"
              v-model="residentialFacilities"
            />
            <label for="ResidentialFacilitiesBest">佳</label>
          </td>
          <td>
            <input
              type="radio"
              id="ResidentialFacilitiesGood"
              name="ResidentialFacilities"
              value="Good"
              v-model="residentialFacilities"
            />
            <label for="ResidentialFacilitiesGood">適中</label>
          </td>
          <td>
            <input
              type="radio"
              id="ResidentialFacilitiesBad"
              name="ResidentialFacilities"
              value="Bad"
              v-model="residentialFacilities"
            />
            <label for="ResidentialFacilitiesBad">欠佳，説明：</label>
            <input type="text" v-model="residentialFacilitiesExplanation" />
          </td>
        </tr>

        <tr>
          <td>訪視現況</td>
          <td>
            <input
              type="radio"
              id="VisitStatusStable"
              name="VisitStatus"
              value="stable"
              v-model="visitStatus"
            />
            <label for="VisitStatusStable">生活規律</label>
          </td>
          <td>
            <input
              type="radio"
              id="VisitStatusNormal"
              name="VisitStatus"
              value="normal"
              v-model="visitStatus"
            />
            <label for="VisitStatusNormal">適中</label>
          </td>
          <td>
            <input
              type="radio"
              id="VisitStatusMustImprove"
              name="VisitStatus"
              value="MustImprove"
              v-model="visitStatus"
            />
            <label for="VisitStatusMustImprove">待加强，説明：</label>
            <input type="text" v-model="visitStatusExplanation" />
          </td>
        </tr>

        <tr>
          <td>主客相處</td>
          <td>
            <input
              type="radio"
              id="HostRelationHarmony"
              name="hostRelation"
              value="Harmony"
              v-model="hostRelation"
            />
            <label for="HostRelationHarmony">和睦</label>
          </td>
          <td>
            <input
              type="radio"
              id="HostRelationNoGood"
              name="hostRelation"
              value="NoGood"
              v-model="hostRelation"
            />
            <label for="HostRelationNoGood">欠佳</label>
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
