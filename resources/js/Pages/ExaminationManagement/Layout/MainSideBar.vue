<template>
    <div :class= "`w-[${boxWidth}] h-screen bg-gray-800 relative transition-all flex flex-col `">
        <!-- <i class="pi pi-bars text-gray-200 hover:text-gray-100 hover:scale-110 absolute right-[-16px] top-[25px] cursor-pointer " @click="handleToggle"></i> -->
        <div class="flex item-center justify-center bg-gray-700 h-[66px] ">
            <div class="flex items-center justify-center text-[20px] font-bold text-white" v-show="isOpenSideBar" >Examination System</div>
            <div class=" flex items-center text-center text-white transition-all" v-show="!isOpenSideBar">
                <!--logo should be placed here-->
                <img src="../../../../../public/images/webPage/aries1.jpg" alt="error" class=" p-1  rounded-full transition-all" :style="`height:${imgHeight}; width:${imgWidth};`" >
            </div>
        </div>
          
        
        <div class="flex flex-col  justify-between h-[cal(100vh-3rem) bg-gray-900] ">
            <div class="menu-man text-left px-2 whitespace-nowrap c">
                <div class="profile flex  justify-center  items-center text-center p-5 " v-show="isOpenSideBar">
                    <div class="text-center text-white">
                        <img src="../../../../../public/images/webPage/aries1.jpg" alt="error" class=" p-1  rounded-full transition-all" :style="`height:${imgHeight}; width:${imgWidth};`" >
                        <h5 class="text-white">{{user.name }}</h5>
                        <p class="text-gray-500">Admin</p>
                        
                    </div>
                </div>
                <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-300" v-show="isOpenSideBar">
                <div class="` py-3 rounded-sm cursor-pointer text-gray-300 hover:text-white active:bg-blue-500   `" v-tooltip="'Dashboard'" >
                    
                    <Link href="#" class="px-2 flex space-x-2 active:bg-blue-500 focus:bg-red-500  "><span class="pi pi-microsoft"></span ><span v-show="isOpenSideBar" class=" transition-all focus:bg-red-500 active:bg-blue-500 " >Dashboard</span></Link>
                </div>
                <div class=" py-3 rounded-sm cursor-pointer text-gray-300 hover:text-white " v-tooltip="'User Management'">
                    <Link href="#" class="px-2 flex space-x-2"><span class="pi pi-user"></span ><span v-show="isOpenSideBar" class=" transition-all">User Management</span></Link>
                </div>
                <div class=" py-3 rounded-sm cursor-pointer text-gray-300 hover:text-white " v-tooltip="'Content Management'">
                    <Link href="#" class="px-2 flex space-x-2"><span class="pi pi-briefcase"></span ><span v-show="isOpenSideBar" class=" transition-all">Content Management</span></Link>
                </div>
                <div class=" py-3 rounded-sm cursor-pointer text-gray-300 hover:text-white " v-tooltip="'Exam Management'" >
                    <Link href="#" class="px-2 flex space-x-2"><span class="pi pi-book"></span ><span v-show="isOpenSideBar" class=" transition-all">Exam Management</span></Link>
                </div>
                <div class=" py-3 rounded-sm cursor-pointer text-gray-300 hover:text-white " v-tooltip="'Question Management'">
                    <Link href="#" class="px-2 flex space-x-2"><span class="pi pi-file-edit"></span ><span v-show="isOpenSideBar">Question Management</span></Link>
                </div>
                
            </div>
        </div>
    </div>
    {{ execute }}        
</template>

<script setup>
import {ref, reactive, computed} from 'vue'
import { Link } from '@inertiajs/vue3';
import Dashboard from '../Dashboard.vue';

const props = defineProps({
    user:Object,
    executeHandleToggle:Boolean,
    
})






const isOpenSideBar = ref(true)
const boxWidth = ref('300px')
const imgWidth = ref('70px')
const imgHeight = ref('70px')
const isCentered = ref('')


const handleToggle = ()=>{
    boxWidth.value = boxWidth.value === '300px' ? '100px' : '300px'
    imgWidth.value = imgWidth.value === '70px' ? '50px' : '70px'
    imgHeight.value = imgHeight.value === '70px' ? '50px' : '70px'
    isOpenSideBar.value = !isOpenSideBar.value
    isCentered.value = !isCentered.value
    
}

const execute = computed(()=> {
    if(props.executeHandleToggle){
        handleToggle()
    }else{
        handleToggle()
    }
})









</script>