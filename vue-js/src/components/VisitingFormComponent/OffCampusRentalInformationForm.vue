<script setup>
import { ref } from 'vue';

// Reactive state for each form input
const landlordName = ref('');
const landlordPhone = ref('');
const address = ref('');
const houseType = ref('');
const roomType = ref('');
const rent = ref('');
const deposit = ref('');
const recommend = ref('');

function getData() {
  return {
    landlordName: landlordName.value,
    landlordPhone: landlordPhone.value,
    address: address.value,
    houseType: houseType.value,
    roomType: roomType.value,
    rent: rent.value,
    deposit: deposit.value,
    recommend: recommend.value,
  };
}

function clearData() {
  landlordName.value = '';
  landlordPhone.value = '';
  address.value = '';
  houseType.value = '';
  roomType.value = '';
  rent.value = '';
  deposit.value = '';
  recommend.value = '';
}

// Expose methods to parent component
defineExpose({ getData, clearData });
</script>

<template>
  <div class="RentalInformationContainer">
    <h1 style="font-weight: bolder; padding-bottom: 5%; font-size: 5vw" id="111">校外賃居資料</h1>
    <p>房東姓名：<input type="text" v-model="landlordName" name="landlord_name"/></p>
    <p>房東電話：<input type="text" v-model="landlordPhone" name="landlord_phone"/></p>
    <p>租賃地址：<textarea type="text" v-model="address" cols="24" rows="2" name="address"></textarea></p>
    <br />
    <p>
      租屋型態：
      <input type="radio" id="HouseType1" name="HouseType" value="透天" v-model="houseType" style="width: 3vh" /><label
        for="HouseType1">獨棟透天</label>
      <input type="radio" id="HouseType2" name="HouseType" value="公寓" v-model="houseType" style="width: 3vh" /><label
        for="HouseType2">公寓</label>
      <input type="radio" id="HouseType3" name="HouseType" value="大樓" v-model="houseType" style="width: 3vh" /><label
        for="HouseType3">大樓</label>
      <input type="radio" id="HouseType4" name="HouseType" value="大型學宿" v-model="houseType" style="width: 3vh" /><label
        for="HouseType4">大型學宿</label>
    </p>
    <p>
      房間類型：
      <input type="radio" id="RoomType1" name="RoomType" value="Studio" v-model="roomType" style="width: 3vh" />
      <label for="RoomType1">套房</label>
      <input type="radio" id="RoomType2" name="RoomType" value="RoomToShare" v-model="roomType" style="width: 3vh" />
      <label for="RoomType2">雅房</label>
    </p>
    <br />
    <p>每月租金：<input type="text" v-model="rent" name="rent"/></p>
    <p>押金：<input type="text" v-model="deposit" name="deposit"/></p>
    <p>
      是否值得推薦其他同學租賃：
      <input type="radio" id="recommendYes" name="recommend" value="yes" v-model="recommend" style="width: 3vh" /><label
        for="recommendYes">是</label>
      <input type="radio" id="recommendNo" name="recommend" value="no" v-model="recommend" style="width: 3vh" /><label
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
