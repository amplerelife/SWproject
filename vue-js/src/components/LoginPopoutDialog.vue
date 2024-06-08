<script setup lang="ts">
import { Button } from '@/components/ui/button'
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger
} from '@/components/ui/dialog'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
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
            <Input id="username" class="col-span-3" style="color: black" />
          </div>
          <div class="grid grid-cols-4 items-center gap-4">
            <Label for="password" class="text-right" style="color: black"> Password </Label>
            <Input id="pasword" type="password" class="col-span-3" style="color: black" />
          </div>
        </div>
        <DialogFooter>
          <Button type="submit"> Login </Button>
          <Button type="clear"> Clear </Button>
        </DialogFooter>
      </DialogContent>
    </Dialog>
  </div>
</template>

<style scoped>
.DialogContainer {
}
</style>
