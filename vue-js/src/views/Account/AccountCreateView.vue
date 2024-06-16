<script setup>
import DynamicTable from '@/components/shared/DynamicTable.vue';
import { ref } from 'vue';

const managerHeaders = ref(['Usrname', 'Password', 'Manager_ID', 'Chinese Name']);
const studentHeaders = ref(['Usrname', 'Password', 'Student_ID', 'Chinese Name']);
const teacherHeaders = ref(['Usrname', 'Password', 'Teacher_ID', 'Chinese Name']);
const landlordHeaders = ref(['Usrname', 'Password', 'Landlord_ID', 'Chinese Name']);

const managerRef = ref(null);
const studentRef = ref(null);
const teacherRef = ref(null);
const landlordRef = ref(null);

function submit() {
  const managerData = managerRef.value?.getData();
  const studentData = studentRef.value?.getData();
  const teacherData = teacherRef.value?.getData();
  const landlordData = landlordRef.value?.getData();

  console.log('Manager Data:', managerData);
  console.log('Student Data:', studentData);
  console.log('Teacher Data:', teacherData);
  console.log('Landlord Data:', landlordData);

  // You can now send this data to your server or handle it as needed
}

function clear() {
  managerRef.value?.clearData();
  studentRef.value?.clearData();
  teacherRef.value?.clearData();
  landlordRef.value?.clearData();
}
</script>

<template>
  <div class="AccountCreate">
    <h1>Account Creater</h1>
    <DynamicTable ref="managerRef" table_title="Manager" :headers="managerHeaders"></DynamicTable>
    <DynamicTable ref="studentRef" table_title="Student" :headers="studentHeaders"></DynamicTable>
    <DynamicTable ref="teacherRef" table_title="Teacher" :headers="teacherHeaders"></DynamicTable>
    <DynamicTable ref="landlordRef" table_title="Landlord" :headers="landlordHeaders"></DynamicTable>
    <div class="form-actions">
      <button @click="submit" class="btn btn-primary">Submit</button>
      <button @click="clear" class="btn btn-secondary">Clear</button>
    </div>
  </div>
</template>

<style scoped>
* {
  box-sizing: border-box;
}

.AccountCreate {
  color: black;
}

.AccountCreate h1 {
  font-weight: bolder;
  font-size: 5vw;
  color: white;
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