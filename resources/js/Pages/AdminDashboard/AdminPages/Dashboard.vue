<template>
   <DashboardLayout :user="user">
      
      

   </DashboardLayout>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import DashboardLayout from '../Layout/DashboardLayout.vue';

const user = usePage().props.user;

</script>