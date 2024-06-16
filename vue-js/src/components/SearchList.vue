<script setup>
import { useRoute, RouterLink } from 'vue-router'
import { ref } from 'vue';
// import FixedPosButton from '@/components/shared/FixedPosButton.vue'

const route = useRoute()

const props = defineProps({
  edit_to: String,
  new_to:String,
  delete_to:String,

  button_delete:Boolean,
  button_audit:Boolean,
  button_new:Boolean
}, 
{
  button_delete: false,
  button_audit: false,
  button_new: false
});

const selectedUsrname = ref([]);
const handleCheckboxChange = (customer) => {
  if (selectedUsrname.value.includes(customer)) {
    selectedUsrname.value = selectedUsrname.value.filter(c => c !== customer);
  } else {
    selectedUsrname.value.push(customer);
    console.log(customer);
  }
};
const deleter = () =>{
      console.log('Choosen List:', selectedUsrname.value[0])
      alert(`Are you sure you want to delete: \n ${selectedUsrname.value.join(', ')}`)
}

</script>


<template>
  <div>

      <h2>My Customers</h2>
      <input type="text" v-model="searchQuery" placeholder="Search for names.." title="Type in a name">
      <table id="myTable">
        <tr class="header">
          <th>   </th>
          <th v-for="header in headers" :key="header">{{ header }}</th>
        </tr>
        <tr v-for="customer in filteredCustomers" :key="customer.name">
          <td style="width:10%;">
          <RouterLink :to="props.edit_to">
              <img src= "https://www.freeiconspng.com/uploads/communication-community-connection-global-internet-network-icon--14.png" alt="icon not found" style="width:2vw;height:2vw;"/>
              </RouterLink>
            </td>
            <td v-for="header in headers" :key="header">{{ customer[header] }}</td>
            <td><input type="checkbox" :id="customer.name" :value="customer.name" @change="handleCheckboxChange(customer)"></td>
        </tr>
      </table>

      <div class="fixed-button-block">
        <div v-if="props.button_new" class="button-container" id="new">
          <RouterLink :to="props.new_to">
            <div class="wrapper">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>plus</title><path d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" /></svg>
            </div>
          </RouterLink>
        </div>

        <div v-if="props.button_delete" class="button-container" id="delete">
          <RouterLink :to="props.delete_to">
            <div class="wrapper">
              <svg :onclick="deleter" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 30 30"><path d="M 14.984375 2.4863281 A 1.0001 1.0001 0 0 0 14 3.5 L 14 4 L 8.5 4 A 1.0001 1.0001 0 0 0 7.4863281 5 L 6 5 A 1.0001 1.0001 0 1 0 6 7 L 24 7 A 1.0001 1.0001 0 1 0 24 5 L 22.513672 5 A 1.0001 1.0001 0 0 0 21.5 4 L 16 4 L 16 3.5 A 1.0001 1.0001 0 0 0 14.984375 2.4863281 z M 6 9 L 7.7929688 24.234375 C 7.9109687 25.241375 8.7633438 26 9.7773438 26 L 20.222656 26 C 21.236656 26 22.088031 25.241375 22.207031 24.234375 L 24 9 L 6 9 z"></path></svg>
            </div>
          </RouterLink>
        </div>
      </div>


  </div>
</template>

<script>
export default {
  data() {
    return {
      searchQuery: '',
      customers: [
        { name: 'Alfreds Futterkiste', country: 'Germany' },
        { name: 'Berglunds snabbkop', country: 'Sweden' },
        { name: 'Island Trading', country: 'UK' },
        { name: 'Koniglich Essen', country: 'Germany' },
        { name: 'Laughing Bacchus Winecellars', country: 'Canada' },
        { name: 'Magazzini Alimentari Riuniti', country: 'Italy' },
        { name: 'North/South', country: 'UK' },
        { name: 'Paris specialites', country: 'France' }
      ]
    }
  },
  computed: {
    headers() {
      return this.customers.length ? Object.keys(this.customers[0]) : [];
    },
    filteredCustomers() {
      return this.customers.filter(customer => {
        return customer.name.toUpperCase().includes(this.searchQuery.toUpperCase());
      });
    }
  }
}
</script>

<style scoped>
* {
  box-sizing: border-box;
}

input {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  color:black;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

table {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

th, td {
  text-align: left;
  padding: 12px;
}
td img{
  width:10%;
  display:inline-block;
}
th{
  color:black;
  font-weight: bolder;
}

tr {
  border-bottom: 1px solid #ddd;
}

tr.header, tr:hover {
  background-color: #f1f1f1;

  td{
    color:black;
  }
}
</style>

<style scoped>
.fixed-link-block {
  position: fixed;
  bottom: 7vh;
  right: 5vw;

  display: flex;
  flex-direction: column;
  row-gap: 2vh;

  --button-length: 4vw;
  height: 4vw;
  width: var(--button-length);
}
</style>

<style scoped>
.fixed-button-block {
  position: fixed;
  bottom: 7vh;
  right: 5vw;

  display: flex;
  flex-direction: column;
  row-gap: 2vh;

  --button-length: 4vw;
  height: fit-content;
  width: var(--button-length);
}

.button-container {
  height: var(--button-length);
  width: var(--button-length);

  --background-color: var(--color-accent);
  --icon-color: var(--color-accent-dark);
  --icon-shadow-color: var(--color-accent-soft-trans);
  border-radius: 50%;
  background-color: var(--background-color);
  --shadow-radius: 0.5rem;
  box-shadow: 
    inset 0 0 var(--shadow-radius) var(--color-accent-dark),
    0 0 var(--shadow-radius) var(--color-accent-dark);

  display: flex;
  justify-content: center;
  
  transition: var(--transition-duration);

  & svg {
    transition: var(--transition-duration);
    fill: var(--icon-color);

    height: 100%;
    width: 100%;
  }
}

.button-container:hover {
  transform: scale(105%);
  --shadow-radius: 0.8rem;
  cursor: pointer;
}

.wrapper {
  transition: var(--transition-duration);
}

#new:hover {
  & .wrapper {
    transform: rotate(90deg);
  }
}

</style>

