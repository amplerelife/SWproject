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
import OverviewCards from '@/components/overview/OverviewBlock.vue'
</script>

<template>
  <div class="container">
    <OverviewCards></OverviewCards>
  </div>
</template>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 80%;
  padding: 5%;

  border-radius: 1.5rem;

  background-color: var(--color-accent-mute);
}
</style>
