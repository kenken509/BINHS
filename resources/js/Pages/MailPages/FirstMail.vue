<template>
    <div class="w-screen h-screen border m-3 flex items-center justify-center">
        <div v-if="show" class="flex items-center">
            <p>Please verify your account {{ user.email }} </p>
            <a  :href="route('mail.verify',{id:user.id})" class="p-4 hover:text-blue-300 underline text-blue-500 " @click="handleClick">click here to send verification code</a>
        </div>
        
        <p v-else>waiting to be verified...</p>
    </div>
    
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
const user = usePage().props.user
const show = ref(true)
const handleClick = ()=> show.value = !show.value;

</script>