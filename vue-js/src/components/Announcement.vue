<script setup>
import { ref } from 'vue';

async function fetchAnnouncements() {
  try {
    const response = await axios.get('api/bull/announcements'); // Adjust the endpoint to your actual endpoint
    announcements.value = response.data;
  } catch (error) {
    console.error('There was an error fetching the announcements!', error);
    alert('An error occurred while fetching the announcements.');
  }
}


function addAnnouncement() {
  const newId = announcements.value.length;
  announcements.value.push({ id: newId, text: '', date: '' });
}
</script>

<template>
  <div class="AnnoucementContainer">
    <h1>公告欄</h1>
    <button @click="addAnnouncement">Add Announcement</button>
    <table>
      <tr v-for="(announcement, index) in announcements" :key="announcement.id">
        <td style="width: 5%; text-align: center">
          <p>{{ index }}</p>
        </td>
        <td style="width: 80%">
          <p>{{announcement.text}}</p>
        </td>
        <td style="width: 15%; text-align: center">
          <p>
            {{announcement.date}}
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
    font-size:2vw;
    font-weight: bold;
  }
  & table {
    margin-left: auto;
    margin-right: auto;
    width: 80vw;
  }
  & table tr td {
    font-size: 18px;
    padding: 1vw;
  }
}
#index {
  border-right: 2px solid black;
}
</style>
