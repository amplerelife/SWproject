<script setup>
import { ref } from 'vue';
import axios from 'axios';

// Reactive variables
const director = ref('Admin1');
const text = ref('');
const currentDate = ref(getCurrentDate());

// Methods
function getCurrentDate() {
  const date = new Date();
  return date.toLocaleDateString();
}

async function submit() {
  const data = {
    admin_id: director.value,
    detail: text.value,
  };

  try {
    const response = await axios.post('api/bull/bull_add', data);
    console.log('Response:', response.data);
    alert(`Success: ${response.data.message}`);
  } catch (error) {
    console.error('There was an error!', error);
    alert('An error occurred while submitting the data.');
  }
}

function clear() {
  director.value = '';
  text.value = '';
}
</script>

<template>
  <div class="text-area-component">
    <div class="form-group">
      <label for="director">Director:</label>
      <input id="director" v-model="director" class="form-control" disabled />
      <br />
      <div class="current-date">Current Date: {{ currentDate }}</div>
    </div>
    <div class="form-group">
      <label for="text">Announement Content:</label>
      <br />
      <textarea id="text" v-model="text" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-actions">
      <button @click="submit" class="btn btn-primary">Submit</button>
      <button @click="clear" class="btn btn-secondary">Clear</button>
    </div>
  </div>
</template>

<style scoped>
.text-area-component {
  color: black;
  max-width: 600px;
  margin: auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 1.5rem;
  background-color: var(--color-accent-mute);
  font-size: 18px;
}

.current-date {
  font-size: 16px;
  margin-bottom: 10px;
  font-weight: bold;
}

.form-group {
  margin-bottom: 15px;
}

.form-actions {
  display: flex;
  justify-content: space-between;
}

.btn {
  padding: 10px 20px;
  font-size: 16px;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
  color: white;
}

.btn-secondary {
  background-color: #6c757d;
  border-color: #6c757d;
  color: white;
}
</style>
