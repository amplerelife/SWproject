<script setup></script>

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
  </div>
  <!-- </RouterLink> -->
</template>

<style scoped>
.VisitFormTeacherContainer {
  display: inline-block;
  /* background-color: var(--color-accent-mute); */
  width: 100%;
  color: black;
  padding: 5%;
  border-radius: 15%;
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
    margin: 0 auto;
  }

  & p {
    padding: 1vw;
  }
}

.VisitAnalysis {
  color: black;
}
</style>
