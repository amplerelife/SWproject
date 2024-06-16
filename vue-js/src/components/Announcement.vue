<script setup>
import { ref, computed , onMounted } from 'vue';
import axios from 'axios';

const dataFetched = ref(false);
const announcements = ref([]);

async function fetchAnnouncements() {
  try {
    const response = await axios.get('api/bull/bull_get'); // Adjust the endpoint to your actual endpoint
    console.log('API Response:', response.data); // Log the API response
    if (Array.isArray(response.data)) {
      announcements.value = response.data;
      dataFetched.value = true; // Set flag to true after data is fetched
    } else {
      console.error('API response is not an array');
    }
  }catch (error) {
      console.error('There was an error fetching the data!', error);
    }
  };



onMounted(() => {
  fetchAnnouncements();
});
</script>

<template>
  <div class="AnnoucementContainer">
    <h1>公告欄</h1>
    <table>
      <thead>
        <th></th>
        <th>管理員</th>
        <th>内容</th>
        <th>日期</th>
      </thead>
      <tr v-for="(announcement, index) in announcements" :key="announcement.admin_id">
        <td style="width: 5%; text-align: center">
          <p>{{ index }}</p>
        </td>
        <td style="width: 15%">
          <p>{{announcement.admin_id}}</p>
        </td>
        <td style="width: 70%; text-align: center">
          <p>
            {{announcement.detail}}
          </p>
        </td>
        <td id="datetime" style="width: 10%; text-align: center">
          <p>
            {{ announcement.date }}
          </p>
        </td>
      </tr>
    </table>
  </div>
</template>

<style scoped>
.AnnoucementContainer {
  width: 85vw;
  background-color: var(--color-accent-mute);
  color: black;
  padding: 1vw;
  margin: 0 auto;
  border: 1px dashed black;
  & h1 {
    font-weight: bolder;
    text-align: center;
    text-decoration: underline;
    font-size: 2vw;
    font-weight: bold;
  }
  & table {
    margin-left: auto;
    margin-right: auto;
    width: 80vw;
  }
  & table thead th{
    font-size: 24px;
    font-weight: bolder;
  }
  & table tr td {
    font-size: 18px;
    padding: 1vw;
  }
  #datetime p{
    font-size:14px;
    font-weight: bold;

  }
}
#index {
  border-right: 2px solid black;
}
</style>
