<script setup>
import { ref } from 'vue'

// Reactive state for each form input
const landlord_name = ref('');
const landlord_phone = ref('');
const address = ref('');
const build_type = ref('');
const room_type = ref('');
const rent = ref('');
const deposit = ref('');
const recommend = ref('');

function getData() {
  return {
    landlord_name: landlord_name.value,
    landlord_phone: landlord_phone.value,
    address: address.value,
    build_type: build_type.value,
    room_type: room_type.value,
    rent: rent.value,
    deposit: deposit.value,
    recommend: recommend.value
  }
}

function clearData() {
  landlord_name.value = '';
  landlord_phone.value = '';
  address.value = '';
  build_type.value = '';
  room_type.value = '';
  rent.value = '';
  deposit.value = '';
  recommend.value = '';
}

// Expose methods to parent component
defineExpose({ getData, clearData })
</script>

<template>
  <div class="RentalInformationContainer">
    <h1 style="font-weight: bolder; padding-bottom: 5%; font-size: 5vw" id="111">校外賃居資料</h1>
    <p>房東姓名：<input type="text" v-model="landlord_name" name="landlord_name"/></p>
    <p>房東電話：<input type="text" v-model="landlord_phone" name="landlord_phone"/></p>
    <p>租賃地址：<textarea type="text" v-model="address" cols="24" rows="2" name="address"></textarea></p>
    <br />
    <p>
      租屋型態：
      <input type="radio" id="build_type1" name="build_type" value="0" v-model="build_type" style="width: 3vh" /><label
        for="build_type1">獨棟透天</label>
      <input type="radio" id="build_type2" name="build_type" value="1" v-model="build_type" style="width: 3vh" /><label
        for="build_type2">公寓</label>
      <input type="radio" id="build_type3" name="build_type" value="2" v-model="build_type" style="width: 3vh" /><label
        for="build_type3">大樓</label>
      <input type="radio" id="build_type4" name="build_type" value="3" v-model="build_type" style="width: 3vh" /><label
        for="build_type4">大型學宿</label>
    </p>
    <p>
      房間類型：
      <input type="radio" id="room_type1" name="room_type" value="0" v-model="room_type" style="width: 3vh" />
      <label for="room_type1">套房</label>
      <input type="radio" id="room_type2" name="room_type" value="1" v-model="room_type" style="width: 3vh" />
      <label for="room_type2">雅房</label>
    </p>
    <br />
    <p>每月租金：<input type="text" v-model="rent" name="rent" /></p>
    <p>押金：<input type="text" v-model="deposit" name="deposit" /></p>
    <p>
      是否值得推薦其他同學租賃：
      <input type="radio" id="recommendYes" name="recommend" value="1" v-model="recommend" style="width: 3vh" /><label
        for="recommendYes">是</label>
      <input type="radio" id="recommendNo" name="recommend" value="0" v-model="recommend" style="width: 3vh" /><label
        for="recommendNo">否</label>
    </p>
  </div>
</template>

<style scoped>
.RentalInformationContainer {
  display: inline-block;
  width: 100%;
  padding: 5%;
  text-align: center;
  color: black;
  font-size: 22px;

  & p {
    margin-top: 1%;
    margin-bottom: 1%;
    transition: 0.15s;
  }
  & p input,
  & p textarea {
    color: black;
    margin: 1vh;
  }
  & p label {
    padding: 1vw;
  }
  & p:hover {
    font-weight: bold;

    & label {
      font-weight: bold;
    }
  }
}
</style>
