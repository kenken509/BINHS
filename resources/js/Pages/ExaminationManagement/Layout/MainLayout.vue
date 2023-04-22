<template>

<div class="flex w-full h-full ">
    <div class="fixed left-0 z-[50]">
        <MainSideBar :user="user.user" :executeHandleToggle="execute"  />
        
    </div>
    

    <div class="w-full h-full flex flex-col overflow-hidden">
        <div class="w-full h-full fixed top-0  ">
            
            <MainHeader class="relative" />
            <i class="pi pi-bars side-closed"></i>
            
        </div>
        <div>
            <slot></slot>
        </div>
         
    </div>
    
</div>
</template>

<script setup>
import MainHeader from './MainHeader.vue'
import MainSideBar from './MainSideBar.vue';
import { ref } from "vue";


const user = defineProps({
    user:Object,
    execute:Boolean
})



</script>