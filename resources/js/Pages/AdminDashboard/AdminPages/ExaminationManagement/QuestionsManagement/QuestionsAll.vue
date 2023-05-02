<template>
    <DashboardLayout :user="user" >
        <div class="border-bot-only border-gray-600 shadow-md mb-4">
            <span class="text-[20px] font-bold text-gray-500">All Questions Page</span>  
        </div>
        
<div class=" overflow-x-auto shadow-md sm:rounded-lg">
    <table  class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-200 uppercase bg-green-700  ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Question
                </th>
                <th scope="col" class="px-6 py-3">
                    Subject
                </th>
                <th scope="col" class="px-6 py-3">
                    Answer
                </th>
                <th scope="col" class="px-6 py-3">
                    Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                
            </tr>
        </thead>
        <tbody v-for="question in questions.questions" :key="question.id" >
            <tr class="bg-white border-b ">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900  ">
                   {{ question.question }}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900  ">
                    ICT
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900  ">
                   <span class="text-red-600">{{ question.correct_answer }}</span>
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 ">
                    {{ question.question_type }}
                </td>
                <td>
                    <div class=" space-x-4">
                        <Link href="#" class="cursor-pointer" v-tooltip.left="'Delete User'" as="button" method="delete" ><span class="pi pi-trash text-red-700 scale-110 hover:dark:scale-150"></span></Link>
                        <Link href="#" class="cursor-pointer hover:dark:scale-125" v-tooltip.right="'Edit User'" ><span class="pi pi-user-edit text-green-600 scale-110 hover:dark:scale-150"></span></Link>
                        <span class="pi pi-eye text-green-600 scale-110 hover:dark:scale-150 cursor-pointer" v-tooltip.right="'View full info'" @click="openModal(user.id)" ></span>
                    </div>    
                </td>
            </tr>
            
        </tbody>
    </table>
</div>



        
    </DashboardLayout>
 </template>
 
 <script setup>
 
 import { usePage, Link } from '@inertiajs/vue3';
 import DashboardLayout from '../../../Layout/DashboardLayout.vue';
 
 const user = usePage().props.user;
 
 const questions = defineProps({
    questions: Array,
 })
 </script>