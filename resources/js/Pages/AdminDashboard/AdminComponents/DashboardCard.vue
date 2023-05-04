<template>
    <div
    class="block rounded-lg bg-white p-6 shadow-md m-2">
        <h4
            class="mb-2 text-xl font-medium leading-tight text-gray-500  ">
            {{ title }}
        </h4>
        <div>
            
        </div>
        <p class="mb-4 text-base text-gray-700 font-bold text-[45px] py-2">
            {{ value }}
        </p>
        <div class="flex space-x-2 ">
            <div class="flex space-x-1">
                <i :class="arrow"></i>
                <p :class="textColor" >{{percentage}} %</p>
                
            </div>
            
            <p> {{ evaluation }} from previous school year</p>
        </div>
        
    </div>
    
    <template>
        
</template>
</template>

<script setup>
import { Colors } from 'chart.js';



defineProps({
    title:String,
    value: Number,
    percentage:Number,
    arrow:String,
    textColor:String,
    evaluation:String,
})
</script>