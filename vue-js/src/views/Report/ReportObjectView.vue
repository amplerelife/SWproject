<script setup>
import { ref } from 'vue'

const director = ref('A1105537')
const ReportText = ref('You are son of your mother')
const RespondText = ref('gaga')
const report_id = ref()

const getCurrentDate = () => {
  const date = new Date()
  return date.toLocaleDateString()
}

const currentDate = ref(getCurrentDate())

async function submit() {
  const data = {
    report_id: report_id.value,
    report_response: '已處理',
    response_content: RespondText
  }

  try {
    const response = await axios.post('api/report/review', data)
    console.log('Response:', response.data)
    alert(`Success: ${response.data.message}`)
  } catch (error) {
    console.error('There was an error!', error)
    alert('An error occurred while submitting the data.')
  }
}

const clear = () => {
  RespondText.value = ''
}
</script>

<template>
  <div class="text-area-component">
    <div class="form-group">
      <label for="director">Reporter:</label>
      <input id="director" v-model="director" rows="3" class="form-control" disabled />
      <br />
      <label for="Report Id">Report ID</label>
      <input id="ReportId" v-model="report_id" disabled />
    </div>
    <div class="form-group">
      <label for="text">Report Content:</label>
      <br />
      <textarea
        id="ReportText"
        v-model="ReportText"
        cols="30"
        rows="5"
        class="form-control"
        disabled
      ></textarea>
    </div>
    <div class="form-group">
      <label for="text">Respond:</label>
      <br />
      <textarea
        id="RespondText"
        v-model="RespondText"
        cols="30"
        rows="5"
        class="form-control"
      ></textarea>
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
