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
  <div class="VisitFormTeacherContainer">
    <div class="VisitAnalysis">
      <h2 style="font-weight: bolder; padding-bottom: 2%">環境與作息評估</h2>
      <table>
        <tr>
          <td>押金要求</td>
          <td>
            <input type="radio" id="Deposit" name="Deposit" value="MakeSense" />
            <label for="MakeSense">合理</label>
          </td>
          <td>
            <input type="radio" id="Deposit" name="Deposit" value="NotMakeSense" />
            <label for="NotMakeSense">不合理</label>
          </td>
        </tr>

        <tr>
          <td>水電費要求</td>
          <td>
            <input
              type="radio"
              id="WaterAndElectricityCharges"
              name="WaterAndElectricityCharges"
              value="MakeSense"
            />
            <label for="MakeSense">合理</label>
          </td>
          <td>
            <input
              type="radio"
              id="WaterAndElectricityCharges"
              name="WaterAndElectricityCharges"
              value="NotMakeSense"
            />
            <label for="NotMakeSense">不合理</label>
          </td>
        </tr>

        <tr>
          <td>居住環境</td>
          <td>
            <input type="radio" id="Environment" name="Environment" value="Best" />
            <label for="Best">佳</label>
          </td>
          <td>
            <input type="radio" id="Environment" name="Environment" value="Good" />
            <label for="Good">適中</label>
          </td>
          <td>
            <input type="radio" id="Environment" name="Environment" value="Bad" />
            <label for="Bad">欠佳，説明：</label>
            <input type="text" />
          </td>
        </tr>

        <tr>
          <td>生活設施</td>
          <td>
            <input
              type="radio"
              id="ResidentialFacilities"
              name="ResidentialFacilities"
              value="Best"
            />
            <label for="Best">佳</label>
          </td>
          <td>
            <input
              type="radio"
              id="ResidentialFacilities"
              name="ResidentialFacilities"
              value="Good"
            />
            <label for="Good">適中</label>
          </td>
          <td>
            <input
              type="radio"
              id="ResidentialFacilities"
              name="ResidentialFacilities"
              value="Bad"
            />
            <label for="Bad">欠佳，説明：</label>
            <input type="text" />
          </td>
        </tr>

        <tr>
          <td>訪視現況</td>
          <td>
            <input type="radio" id="VisitStatus" name="VisitStatus" value="stable" />
            <label for="stable">生活規律</label>
          </td>
          <td>
            <input type="radio" id="VisitStatus" name="VisitStatus" value="normal" />
            <label for="normal">適中</label>
          </td>
          <td>
            <input type="radio" id="VisitStatus" name="VisitStatus" value="MustImprove" />
            <label for="MustImprove">待加强，説明：</label>
            <input type="text" />
          </td>
        </tr>

        <tr>
          <td>主客相處</td>
          <td>
            <input type="radio" id="hostRelation" name="hostRelation" value="Harmony" />
            <label for="Harmony">和睦</label>
          </td>
          <td>
            <input type="radio" id="hostRelation" name="hostRelation" value="NoGood" />
            <label for="NoGood">欠佳</label>
          </td>
        </tr>
      </table>
    </div>

    <br /><br />
    <div class="VisitResult">
      <h2 style="font-weight: bolder; padding-bottom: 2%">訪視結果</h2>
      <p>
        <input type="radio" id="VisitResult" name="VisitResult" value="NoProblem" />
        <label for="NoProblem">整體賃居狀況良好</label>
      </p>
      <p>
        <input type="radio" id="VisitResult" name="VisitResult" value="ContactToParent" />
        <label for="ContactToParent">聯係家長關注</label>
      </p>
      <p>
        <input type="radio" id="VisitResult" name="VisitResult" value="SafetyNeedAssist" />
        <label for="SafetyNeedAssist">安全堪慮請協助</label>
      </p>
      <p>
        <input type="radio" id="VisitResult" name="VisitResult" value="Others" />
        <label for="Others">其他： </label>
        <input type="text" />
      </p>
      <br />
      <p>
        其他記載或建議事項:
        <input type="text" />
      </p>
    </div>

    <br /><br />
    <div class="SubjectSharing">
      <h2 style="font-weight: bolder; padding-bottom: 2%">關懷宣導項目</h2>
      <input type="checkbox" id="trafficSafety" name="trafficSafety" value="trafficSafety" />
      <label for="trafficSafety">交通安全</label>
      <input type="checkbox" id="SmokeRefuse" name="SmokeRefuse" value="SmokeRefuse" />
      <label for="SmokeRefuse">拒絕烟害</label>
      <input type="checkbox" id="DrugRefuse" name="DrugRefuse" value="DrugRefuse" />
      <label for="DrugRefuse">拒絕毒品</label>
      <input type="checkbox" id="DengiDefence" name="DengiDefence" value="DengiDefence" />
      <label for="DengiDefence">登革熱防治</label>
      <input type="checkbox" id="OtherSubject" name="OtherSubject" value="OtherSubject" />
      <label for="OtherSubject">其他，説明</label>
      <input type="text" />
    </div>
  </div>
  <!-- </RouterLink> -->
</template>

<style scoped>
.VisitFormTeacherContainer {
  display: inline-block;
  background-color: var(--color-accent-mute);
  padding: 5%;
  border-radius: 15%;
  font-size: 20px;
  margin: 1vw;

  input {
    margin: 1vh;
    color: black;
    /* font-size:15px; */
  }

  & table,
  th,
  td {
    border: 1px solid black;
    padding: 1vw;
  }

  & p {
    padding: 1vw;
  }
}

.VisitAnalysis {
  color: black;
}
.VisitResult {
  color: black;
}

.SubjectSharing {
  color: black;
}
</style>
