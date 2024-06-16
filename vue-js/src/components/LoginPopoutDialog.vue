<script setup lang="ts">
import { ref } from 'vue'
import { Button } from '@/components/ui/button'
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger
} from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import axios from 'axios';

// Reactive variables for form inputs
const username = ref('');
const password = ref('');
const InputReact = ref(true);

// const submit = () => {
//   console.log('Username:', username.value);
//   console.log('Password:', password.value);
// };

async function submit() {
  const data = {
    usrname: username.value,
    password: password.value,
  };

  try {
    const response = await axios.post('api/account/login', data);
    console.log('Response:', response.data);
    if (response.data.status.toString() === "error"){
      alert(`Error: ${response.data.message}`);
    } 
    else{
      alert(`Success: ${response.data.usertype}`);
      InputReact.value = false;
    }
  } catch (error) {
    console.error('There was an error!', error);
    alert('An error occurred while submitting the data.');
  }
}

const clear = () => {
  username.value = ''
  password.value = ''
}
</script>

<template>
  <div class="DialogContainer">
    <Dialog>
      <DialogTrigger as-child>
        <button>Login</button>
      </DialogTrigger>
      <DialogContent class="sm:max-w-[425px]">
        <DialogHeader>
          <DialogTitle style="color: black">Login Dialog</DialogTitle>
          <DialogDescription> Please enter your username and password. </DialogDescription>
        </DialogHeader>
        <div class="grid gap-4 py-4">
          <div class="grid grid-cols-4 items-center gap-4">
            <Label for="username" class="text-right" style="color: black"> Username </Label>
            <Input id="username" class="col-span-3" v-model="username" style="color: black" :disabled="!InputReact"/>
          </div>
          <div class="grid grid-cols-4 items-center gap-4">
            <Label for="password" class="text-right" style="color: black"> Password </Label>
            <Input id="password" type="password" class="col-span-3" v-model="password" style="color: black" :disabled="!InputReact"/>
          </div>
        </div>
        <DialogFooter>
          <Button v-if="InputReact" type="submit" @click="submit"> Login </Button>
          <Button v-if="InputReact" type="clear" @click="clear"> Clear </Button>
        </DialogFooter>
      </DialogContent>
    </Dialog>
  </div>
</template>

<style scoped>
.DialogContainer {
}
</style>
