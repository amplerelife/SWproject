<script setup>
import { ref, reactive, defineExpose, watch } from 'vue';

const props = defineProps({
  table_title: String,
  headers: {
    type: Array,
    required: true
  }
});

const numRows = ref(0);
const tableData = reactive([]);

// Watch for changes in numRows to adjust tableData
watch(numRows, (newNumRows) => {
  while (tableData.length < newNumRows) {
    tableData.push(props.headers.reduce((acc, header) => {
      acc[header] = '';
      return acc;
    }, {}));
  }
  while (tableData.length > newNumRows) {
    tableData.pop();
  }
});

function getData() {
  return tableData;
}

function clearData() {
  tableData.splice(0, tableData.length);
  numRows.value = 0;
}

defineExpose({ getData, clearData });
</script>

<template>
  <div class="dynamic-table-container">
    <h1 style="font-weight: bolder; font-size: 3vw">{{ props.table_title }}</h1>
    <div class="input-container">
      <label for="numRows">Number of Rows:</label>
      <input type="number" v-model.number="numRows" id="numRows" min="0" />
    </div>
    <table v-if="numRows > 0">
      <thead>
        <tr>
          <th v-for="(header, index) in props.headers" :key="index">{{ header }}</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(row, rowIndex) in tableData" :key="rowIndex">
          <td v-for="(header, colIndex) in props.headers" :key="colIndex">
            <input type="text" v-model="row[header]" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>
.dynamic-table-container {
  color: black;
  width: 70vw;
  margin: 0 auto;
  margin-bottom: 1vh;
  padding: 2rem;
  text-align: left;
  background-color: var(--color-accent-mute);
  border-radius: 8px;
}

.input-container {
  margin-bottom: 1rem;
}

input {
  padding: 0.5rem;
  margin-left: 0.5rem;
  width: 10rem;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 1rem;
  text-align: center;
}

th, td {
  padding: 0.75rem;
  border: 1px solid black;
  text-align: left;
}

thead {
  background-color: var(--color-accent-mute);
}

th {
  font-weight: bold;
}


</style>