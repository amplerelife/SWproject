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
     <div class = "RentalSafetyContainer">
            <h2 style="font-weight: bolder; padding-bottom:2%">居賃安全自主管理檢視資料</h2>
            <table>
                <tr>
                    <td>木造隔間或鐵皮加蓋</td>
                    <td>
                        <input type="radio" id="CompartmentAddon" name="CompartmentAddon" value="Yes">
                        <label for="Yes">是</label>
                    </td>
                    <td>
                        <input type="radio" id="CompartmentAddon" name="CompartmentAddon" value="No">
                        <label for="No">否</label>
                    </td>
                </tr>

                <tr>
                    <td>有火警警報器或偵烟器</td>
                    <td>
                        <input type="radio" id="FireAlarmAddon" name="FireAlarmAddon" value="Yes">
                        <label for="Yes">是</label>
                    </td>
                    <td>
                        <input type="radio" id="FireAlarmAddon" name="FireAlarmAddon" value="No">
                        <label for="No">否</label>
                    </td>
                </tr>

                <tr>
                    <td>逃生通道暢通且標示清楚</td>
                    <td>
                        <input type="radio" id="EmergencyExitOk" name="EmergencyExitOk" value="Yes">
                        <label for="Yes">是</label>
                    </td>
                    <td>
                        <input type="radio" id="EmergencyExitOk" name="EmergencyExitOk" value="No">
                        <label for="No">否</label>
                    </td>
                </tr>

                <tr>
                    <td>x門禁及鎖具良好管理</td>
                    <td>
                        <input type="radio" id="DoorLockOK" name="DoorLockOK" value="Yes">
                        <label for="Yes">是</label>
                    </td>
                    <td>
                        <input type="radio" id="DoorLockOK" name="DoorLockOK" value="No">
                        <label for="No">否</label>
                    </td>
                </tr>

                <tr>
                    <td>有安裝照明設備（停車場及周邊）</td>
                    <td>
                        <input type="radio" id="FlashlightOK" name="FlashlightOK" value="Yes">
                        <label for="Yes">是</label>
                    </td>
                    <td>
                        <input type="radio" id="FlashlightOK" name="FlashlightOK" value="No">
                        <label for="No">否</label>
                    </td>
                </tr>

                <tr>
                    <td>瞭解電路安全及逃生要領</td>
                    <td>
                        <input type="radio" id="SafetyAwarenessOk" name="SafetyAwarenessOk" value="Yes">
                        <label for="Yes">是</label>
                    </td>
                    <td>
                        <input type="radio" id="SafetyAwarenessOk" name="SafetyAwarenessOk" value="No">
                        <label for="No">否</label>
                    </td>
                </tr>
                <tr>
                    <td>熟慮派出所，醫療，消防隊，學校校安專綫電話</td>
                    <td>
                        <input type="radio" id="EmergencyTelOk" name="EmergencyTelOk" value="Yes">
                        <label for="Yes">是</label>
                    </td>
                    <td>
                        <input type="radio" id="EmergencyTelOk" name="EmergencyTelOk" value="No">
                        <label for="No">否</label>
                    </td>
                </tr>
                <tr>
                    <td>使用多種電器（高耗能）時，是否同時插在同一條延長綫</td>
                    <td>
                        <input type="radio" id="ExtensionWireOveruseOk" name="ExtensionWireOveruseOk" value="Yes">
                        <label for="Yes">是</label>
                    </td>
                    <td>
                        <input type="radio" id="ExtensionWireOveruseOk" name="ExtensionWireOveruseOk" value="No">
                        <label for="No">否</label>
                    </td>
                </tr>
                <tr>
                    <td>有滅火器且功能正常</td>
                    <td>
                        <input type="radio" id="FireExtinguisherOk" name="FireExtinguisherOk" value="Yes">
                        <label for="Yes">是</label>
                    </td>
                    <td>
                        <input type="radio" id="FireExtinguisherOk" name="FireExtinguisherOk" value="No">
                        <label for="No">否</label>
                    </td>
                </tr>
                <tr>
                    <td>熱水器（電熱式或瓦斯式）安全良好，無一氧化碳中毒疑慮</td>
                    <td>
                        <input type="radio" id="NoCO_Ok" name="NoCO_Ok" value="Yes">
                        <label for="Yes">是</label>
                    </td>
                    <td>
                        <input type="radio" id="NoCO_Ok" name="NoCO_Ok" value="No">
                        <label for="No">否</label>
                    </td>
                </tr>
                <tr>
                    <td>分開6個以上房間或10個以上床位</td>
                    <td>
                        <input type="radio" id="ManyBedroomOk" name="ManyBedroomOk" value="Yes">
                        <label for="Yes">是</label>
                    </td>
                    <td>
                        <input type="radio" id="ManyBedroomOk" name="ManyBedroomOk" value="No">
                        <label for="No">否</label>
                    </td>
                </tr>
                <tr>
                    <td>有安裝監視器設備</td>
                    <td>
                        <input type="radio" id="CCTV_Ok" name="CCTV_Ok" value="Yes">
                        <label for="Yes">是</label>
                    </td>
                    <td>
                        <input type="radio" id="CCTV_Ok" name="CCTV_Ok" value="No">
                        <label for="No">否</label>
                    </td>
                </tr>
                <tr>
                    <td>使用《内政部定型化租賃契約》</td>
                    <td>
                        <input type="radio" id="FormalContractOk" name="FormalContractOk" value="Yes">
                        <label for="Yes">是</label>
                    </td>
                    <td>
                        <input type="radio" id="FormalContractOk" name="FormalContractOk" value="No">
                        <label for="No">否</label>
                    </td>
                </tr>
            </table>
        </div>

</template>


<style scoped>

.RentalSafetyContainer{
    display:inline-block;
    padding:5%;
    border-radius:15%;
    background-color: var(--color-accent);
    color:aliceblue;
    font-size:20px;
    margin:1vw;

    & table{
        border:1px solid black;
    }

    & table tr td{
        padding:1vw;
    }

}
</style>