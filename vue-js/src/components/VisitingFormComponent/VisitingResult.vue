<script setup></script>
<template>
  <div class="VisitResult">
    <h1 style="font-weight: bolder; padding-bottom: 5%; font-size: 5vw" id="444">訪視結果</h1>
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
</template>

<style scoped>
.VisitResult {
  width: 100%;
  display: inline-block;
  color: black;
  padding: 5%;
  font-size: 18px;
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
.VisitResult {
  color: black;
}

.SubjectSharing {
  color: black;
}
</style>
