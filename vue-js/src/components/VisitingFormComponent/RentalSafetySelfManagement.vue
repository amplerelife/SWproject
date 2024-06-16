<script setup>
import { ref } from 'vue';

// Reactive state for each radio button group
const CompartmentAddon = ref('');
const FireAlarmAddon = ref('');
const EmergencyExitOk = ref('');
const DoorLockOK = ref('');
const FlashlightOK = ref('');
const SafetyAwarenessOk = ref('');
const EmergencyTelOk = ref('');
const ExtensionWireOveruseOk = ref('');
const FireExtinguisherOk = ref('');
const NoCO_Ok = ref('');
const ManyBedroomOk = ref('');
const CCTV_Ok = ref('');
const FormalContractOk = ref('');

function getData() {
  return {
    CompartmentAddon: CompartmentAddon.value,
    FireAlarmAddon: FireAlarmAddon.value,
    EmergencyExitOk: EmergencyExitOk.value,
    DoorLockOK: DoorLockOK.value,
    FlashlightOK: FlashlightOK.value,
    SafetyAwarenessOk: SafetyAwarenessOk.value,
    EmergencyTelOk: EmergencyTelOk.value,
    ExtensionWireOveruseOk: ExtensionWireOveruseOk.value,
    FireExtinguisherOk: FireExtinguisherOk.value,
    NoCO_Ok: NoCO_Ok.value,
    ManyBedroomOk: ManyBedroomOk.value,
    CCTV_Ok: CCTV_Ok.value,
    FormalContractOk: FormalContractOk.value,
  };
}

function clearData() {
  CompartmentAddon.value = '';
  FireAlarmAddon.value = '';
  EmergencyExitOk.value = '';
  DoorLockOK.value = '';
  FlashlightOK.value = '';
  SafetyAwarenessOk.value = '';
  EmergencyTelOk.value = '';
  ExtensionWireOveruseOk.value = '';
  FireExtinguisherOk.value = '';
  NoCO_Ok.value = '';
  ManyBedroomOk.value = '';
  CCTV_Ok.value = '';
  FormalContractOk.value = '';
}

// Expose methods to parent component
defineExpose({ getData, clearData });
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
          <input type="radio" id="CompartmentAddonYes" name="CompartmentAddon" value="Yes" v-model="CompartmentAddon" />
          <label for="CompartmentAddonYes">是</label>
        </td>
        <td>
          <input type="radio" id="CompartmentAddonNo" name="CompartmentAddon" value="No" v-model="CompartmentAddon" />
          <label for="CompartmentAddonNo">否</label>
        </td>
      </tr>
      <tr>
        <td>有火警警報器或偵烟器</td>
        <td>
          <input type="radio" id="FireAlarmAddonYes" name="FireAlarmAddon" value="Yes" v-model="FireAlarmAddon" />
          <label for="FireAlarmAddonYes">是</label>
        </td>
        <td>
          <input type="radio" id="FireAlarmAddonNo" name="FireAlarmAddon" value="No" v-model="FireAlarmAddon" />
          <label for="FireAlarmAddonNo">否</label>
        </td>
      </tr>
      <tr>
        <td>逃生通道暢通且標示清楚</td>
        <td>
          <input type="radio" id="EmergencyExitOk" name="EmergencyExitOk" value="Yes" v-model="EmergencyExitOk"/>
          <label for="Yes">是</label>
        </td>
        <td>
          <input type="radio" id="EmergencyExitOk" name="EmergencyExitOk" value="No" v-model="EmergencyExitOk"/>
          <label for="No">否</label>
        </td>
      </tr>

      <tr>
        <td>x門禁及鎖具良好管理</td>
        <td>
          <input type="radio" id="DoorLockOK" name="DoorLockOK" value="Yes" v-model="DoorLockOK"/>
          <label for="Yes">是</label>
        </td>
        <td>
          <input type="radio" id="DoorLockOK" name="DoorLockOK" value="No" v-model="DoorLockOK"/>
          <label for="No">否</label>
        </td>
      </tr>

      <tr>
        <td>有安裝照明設備（停車場及周邊）</td>
        <td>
          <input type="radio" id="FlashlightOK" name="FlashlightOK" value="Yes" v-model="FlashlightOK"/>
          <label for="Yes">是</label>
        </td>
        <td>
          <input type="radio" id="FlashlightOK" name="FlashlightOK" value="No" v-model="FlashlightOK"/>
          <label for="No">否</label>
        </td>
      </tr>

      <tr>
        <td>瞭解電路安全及逃生要領</td>
        <td>
          <input type="radio" id="SafetyAwarenessOk" name="SafetyAwarenessOk" value="Yes" v-model="SafetyAwarenessOk"/>
          <label for="Yes">是</label>
        </td>
        <td>
          <input type="radio" id="SafetyAwarenessOk" name="SafetyAwarenessOk" value="No" v-model="SafetyAwarenessOk"/>
          <label for="No">否</label>
        </td>
      </tr>
      <tr>
        <td>熟慮派出所，醫療，消防隊，學校校安專綫電話</td>
        <td>
          <input type="radio" id="EmergencyTelOk" name="EmergencyTelOk" value="Yes" v-model="EmergencyTelOk"/>
          <label for="Yes">是</label>
        </td>
        <td>
          <input type="radio" id="EmergencyTelOk" name="EmergencyTelOk" value="No" v-model="EmergencyTelOk"/>
          <label for="No">否</label>
        </td>
      </tr>
      <tr>
        <td>使用多種電器（高耗能）時，是否同時插在同一條延長綫</td>
        <td>
          <input
            type="radio"
            id="ExtensionWireOveruseOk"
            name="ExtensionWireOveruseOk"
            value="Yes"
            v-model="ExtensionWireOveruseOk"
          />
          <label for="Yes">是</label>
        </td>
        <td>
          <input
            type="radio"
            id="ExtensionWireOveruseOk"
            name="ExtensionWireOveruseOk"
            value="No"
            v-model="ExtensionWireOveruseOk"
          />
          <label for="No">否</label>
        </td>
      </tr>
      <tr>
        <td>有滅火器且功能正常</td>
        <td>
          <input type="radio" id="FireExtinguisherOk" name="FireExtinguisherOk" value="Yes" v-model="FireExtinguisherOk"/>
          <label for="Yes">是</label>
        </td>
        <td>
          <input type="radio" id="FireExtinguisherOk" name="FireExtinguisherOk" value="No" v-model="FireExtinguisherOk"/>
          <label for="No">否</label>
        </td>
      </tr>
      <tr>
        <td>熱水器（電熱式或瓦斯式）安全良好，無一氧化碳中毒疑慮</td>
        <td>
          <input type="radio" id="NoCO_Ok" name="NoCO_Ok" value="Yes" v-model="NoCO_Ok"/>
          <label for="Yes">是</label>
        </td>
        <td>
          <input type="radio" id="NoCO_Ok" name="NoCO_Ok" value="No" v-model="NoCO_Ok"/>
          <label for="No">否</label>
        </td>
      </tr>
      <tr>
        <td>分開6個以上房間或10個以上床位</td>
        <td>
          <input type="radio" id="ManyBedroomOk" name="ManyBedroomOk" value="Yes" v-model="ManyBedroomOk"/>
          <label for="Yes">是</label>
        </td>
        <td>
          <input type="radio" id="ManyBedroomOk" name="ManyBedroomOk" value="No" v-model="ManyBedroomOk"/>
          <label for="No">否</label>
        </td>
      </tr>
      <tr>
        <td>有安裝監視器設備</td>
        <td>
          <input type="radio" id="CCTV_Ok" name="CCTV_Ok" value="Yes" v-model="CCTV_Ok"/>
          <label for="Yes">是</label>
        </td>
        <td>
          <input type="radio" id="CCTV_Ok" name="CCTV_Ok" value="No" v-model="CCTV_Ok"/>
          <label for="No">否</label>
        </td>
      </tr>
      <tr>
        <td>使用《内政部定型化租賃契約》</td>
        <td>
          <input type="radio" id="FormalContractOk" name="FormalContractOk" value="Yes" v-model="FormalContractOk"/>
          <label for="Yes">是</label>
        </td>
        <td>
          <input type="radio" id="FormalContractOk" name="FormalContractOk" value="No" v-model="FormalContractOk"/>
          <label for="No">否</label>
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
