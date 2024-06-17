<script setup>
import { ref } from 'vue'

// Reactive state for each radio button group
const WoodOrIron = ref('');
const alarm = ref('');
const escapeRoute = ref('');
const doorLock = ref('');
const FlashFlashlightOKOK = ref('');
const circuitSafe = ref('');
const knowPhone = ref('');
const multiSocket = ref('');
const extinguisher = ref('');
const heater = ref('');
const multiRoomBed = ref('');
const monitor = ref('');
const contract = ref('');

function getData() {
  return {
    WoodOrIron: WoodOrIron.value,
    alarm: alarm.value,
    escapeRoute: escapeRoute.value,
    doorLock: doorLock.value,
    FlashFlashlightOKOK: FlashFlashlightOKOK.value,
    circuitSafe: circuitSafe.value,
    knowPhone: knowPhone.value,
    multiSocket: multiSocket.value,
    extinguisher: extinguisher.value,
    heater: heater.value,
    multiRoomBed: multiRoomBed.value,
    monitor: monitor.value,
    contract: contract.value,
  };
}

function clearData() {
  WoodOrIron.value = '';
  alarm.value = '';
  escapeRoute.value = '';
  doorLock.value = '';
  FlashFlashlightOKOK.value = '';
  circuitSafe.value = '';
  knowPhone.value = '';
  multiSocket.value = '';
  extinguisher.value = '';
  heater.value = '';
  multiRoomBed.value = '';
  monitor.value = '';
  contract.value = '';
}

// Expose methods to parent component
defineExpose({ getData, clearData })
</script>

<template>
  <div class="RentalSafetyContainer">
    <h1 style="font-weight: bolder; padding-bottom: 5%; font-size: 5vw" id="222">
      居賃安全自主管理檢視資料
    </h1>
    <table>
      <tr>
        <td>木造隔間或鐵皮加蓋</td>
        <td>
          <input type="radio" id="WoodOrIronYes" name="WoodOrIron" value="1" v-model="WoodOrIron" />
          <label for="WoodOrIronYes">是</label>
        </td>
        <td>
          <input type="radio" id="WoodOrIronNo" name="WoodOrIron" value="0" v-model="WoodOrIron" />
          <label for="WoodOrIronNo">否</label>
        </td>
      </tr>
      <tr>
        <td>有火警警報器或偵烟器</td>
        <td>
          <input type="radio" id="alarmYes" name="alarm" value="1" v-model="alarm" />
          <label for="alarmYes">是</label>
        </td>
        <td>
          <input type="radio" id="alarmNo" name="alarm" value="0" v-model="alarm" />
          <label for="alarmNo">否</label>
        </td>
      </tr>
      <tr>
        <td>逃生通道暢通且標示清楚</td>
        <td>
          <input type="radio" id="escapeRoute" name="escapeRoute" value="1" v-model="escapeRoute"/>
          <label for="1">是</label>
        </td>
        <td>
          <input type="radio" id="escapeRoute" name="escapeRoute" value="0" v-model="escapeRoute"/>
          <label for="0">否</label>
        </td>
      </tr>

      <tr>
        <td>x門禁及鎖具良好管理</td>
        <td>
          <input type="radio" id="doorLock" name="doorLock" value="1" v-model="doorLock"/>
          <label for="1">是</label>
        </td>
        <td>
          <input type="radio" id="doorLock" name="doorLock" value="0" v-model="doorLock"/>
          <label for="0">否</label>
        </td>
      </tr>

      <tr>
        <td>有安裝照明設備（停車場及周邊）</td>
        <td>
          <input type="radio" id="FlashFlashlightOKOK" name="FlashFlashlightOKOK" value="1" v-model="FlashFlashlightOKOK"/>
          <label for="1">是</label>
        </td>
        <td>
          <input type="radio" id="FlashFlashlightOKOK" name="FlashFlashlightOKOK" value="0" v-model="FlashFlashlightOKOK"/>
          <label for="0">否</label>
        </td>
      </tr>

      <tr>
        <td>瞭解電路安全及逃生要領</td>
        <td>
          <input type="radio" id="circuitSafe" name="circuitSafe" value="1" v-model="circuitSafe"/>
          <label for="1">是</label>
        </td>
        <td>
          <input type="radio" id="circuitSafe" name="circuitSafe" value="0" v-model="circuitSafe"/>
          <label for="0">否</label>
        </td>
      </tr>
      <tr>
        <td>熟慮派出所，醫療，消防隊，學校校安專綫電話</td>
        <td>
          <input type="radio" id="knowPhone" name="knowPhone" value="1" v-model="knowPhone"/>
          <label for="1">是</label>
        </td>
        <td>
          <input type="radio" id="knowPhone" name="knowPhone" value="0" v-model="knowPhone"/>
          <label for="0">否</label>
        </td>
      </tr>
      <tr>
        <td>使用多種電器（高耗能）時，是否同時插在同一條延長綫</td>
        <td>
          <input
            type="radio"
            id="multiSocket"
            name="multiSocket"
            value="1"
            v-model="multiSocket"
          />
          <label for="1">是</label>
        </td>
        <td>
          <input
            type="radio"
            id="multiSocket"
            name="multiSocket"
            value="0"
            v-model="multiSocket"
          />
          <label for="0">否</label>
        </td>
      </tr>
      <tr>
        <td>有滅火器且功能正常</td>
        <td>
          <input type="radio" id="extinguisher" name="extinguisher" value="1" v-model="extinguisher"/>
          <label for="1">是</label>
        </td>
        <td>
          <input type="radio" id="extinguisher" name="extinguisher" value="0" v-model="extinguisher"/>
          <label for="0">否</label>
        </td>
      </tr>
      <tr>
        <td>熱水器（電熱式或瓦斯式）安全良好，無一氧化碳中毒疑慮</td>
        <td>
          <input type="radio" id="heater" name="heater" value="1" v-model="heater"/>
          <label for="1">是</label>
        </td>
        <td>
          <input type="radio" id="heater" name="heater" value="0" v-model="heater"/>
          <label for="0">否</label>
        </td>
      </tr>
      <tr>
        <td>分開6個以上房間或10個以上床位</td>
        <td>
          <input type="radio" id="multiRoomBed" name="multiRoomBed" value="1" v-model="multiRoomBed"/>
          <label for="1">是</label>
        </td>
        <td>
          <input type="radio" id="multiRoomBed" name="multiRoomBed" value="0" v-model="multiRoomBed"/>
          <label for="0">否</label>
        </td>
      </tr>
      <tr>
        <td>有安裝監視器設備</td>
        <td>
          <input type="radio" id="monitor" name="monitor" value="1" v-model="monitor"/>
          <label for="1">是</label>
        </td>
        <td>
          <input type="radio" id="monitor" name="monitor" value="0" v-model="monitor"/>
          <label for="0">否</label>
        </td>
      </tr>
      <tr>
        <td>使用《内政部定型化租賃契約》</td>
        <td>
          <input type="radio" id="contract" name="contract" value="1" v-model="contract"/>
          <label for="1">是</label>
        </td>
        <td>
          <input type="radio" id="contract" name="contract" value="0" v-model="contract"/>
          <label for="0">否</label>
        </td>
      </tr>
    </table>
  </div>
</template>

<style scoped>
.RentalSafetyContainer {
  display: inline-block;
  width: 100%;
  padding: 5%;
  text-align: center;
  color: black;
  font-size: 22px;
}

.RentalSafetyContainer table {
  margin: 0 auto;
  border: 1px solid black;
}

.RentalSafetyContainer table tr td {
  padding: 1vw;
}

.RentalSafetyContainer table tr td:hover {
  font-weight: bold;
}
</style>
