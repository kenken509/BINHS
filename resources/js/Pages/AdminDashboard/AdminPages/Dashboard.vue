<template>
   <DashboardLayout :user="user">
      <div class="border-bot-only border-gray-600 shadow-md mb-[30px]">
            <span class="text-[20px] font-bold text-gray-500">Admin Dashboard</span>  
      </div>
      <section class="grid grid-cols-12 mt-4" >
         <div class="col-span-12 md:col-span-6 lg:col-span-3">
            <DashboardCard :title="'ADMINS'" :value="3" :percentage="10" :arrow="'pi pi-angle-down text-red-500'" :textColor="'text-red-500'" :evaluation="'decreased'"></DashboardCard>
         </div>
         <div class="col-span-12 md:col-span-6 lg:col-span-3">
            <DashboardCard :title="'INSTRUCTORS'" :value="10" :percentage="10" :arrow="'pi pi-angle-down text-red-500'" :textColor="'text-red-500'" :evaluation="'decreased'"></DashboardCard>
         </div>
         
         <div class="col-span-12 md:col-span-6 lg:col-span-3">
            <DashboardCard :title="'STUDENTS'" :value="500" :percentage="23" :arrow="'pi pi-angle-up text-[#2a9e66]'" :textColor="'text-green-500'" :evaluation="'increased'"></DashboardCard>
         </div>
         
         <div class="col-span-12 md:col-span-6 lg:col-span-3">
            <DashboardCard :title="'FAILED STUDENTS'" :value="3" :percentage="30" :arrow="'pi pi-angle-up text-red-500'" :textColor="'text-red-500'" :evaluation="'increased'"></DashboardCard>
         </div>
         <!--flowbit tables-->
         
        



         <!--flowbit tables-->
         
      </section>
         <div class="flex justify-center items-center border-bot-only border-gray-600 shadow-md mb-[30px] mt-[50px]">
            <span class="text-[24px] font-bold text-gray-500">TOP 10 STUDENTS</span>  
         </div>
      <section class="grid grid-cols-12 mt-4 space-x-10 shadow-md" >
         <div class="flex flex-col col-span-12  lg:col-span-3">
            <div class="flex justify-center items-center font-bold">HOME ECONOMICS</div>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 ">
               <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                  <div class="overflow-hidden">
                  <table class="min-w-full text-center text-sm font-light border-gray-200">
                     <thead
                        class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-green-600 border ">
                        <tr>
                        <th scope="col" class=" px-6 py-4 bg-gray">#</th>
                        <th scope="col" class=" px-6 py-4">First</th>
                        <th scope="col" class=" px-6 py-4">Last</th>
                        <th scope="col" class=" px-6 py-4">Grades</th>
                        </tr>
                     </thead>
                     <tbody class="border border-gray-200">
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">1</td>
                           <td class="whitespace-nowrap  px-6 py-4">Mark</td>
                           <td class="whitespace-nowrap  px-6 py-4">Villela</td>
                           <td class="whitespace-nowrap  px-6 py-4">98.75</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">2</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">97.5</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">3</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">96.3</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">4</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">95.0</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">5</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">92.0</td>
                        </tr>
                        
                     </tbody>
                  </table>
                  </div>
               </div>
            </div>
         </div>
         <div class="flex flex-col col-span-12  lg:col-span-3">
            <div class="flex justify-center items-center font-bold">ICT</div>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
               <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                  <div class="overflow-hidden">
                  <table class="min-w-full text-center text-sm font-light">
                     <thead
                        class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-green-600 border border-gray-200">
                        <tr>
                        <th scope="col" class=" px-6 py-4">#</th>
                        <th scope="col" class=" px-6 py-4">First</th>
                        <th scope="col" class=" px-6 py-4">Last</th>
                        <th scope="col" class=" px-6 py-4">Grades</th>
                        </tr>
                     </thead>
                     <tbody class="border border-gray-200">
                        <tr class="border-b dark:border-neutral-500 ">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">1</td>
                           <td class="whitespace-nowrap  px-6 py-4">Mark</td>
                           <td class="whitespace-nowrap  px-6 py-4">Villela</td>
                           <td class="whitespace-nowrap  px-6 py-4">98.75</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">2</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">97.5</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">3</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">96.3</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">4</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">95.0</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">5</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">92.0</td>
                        </tr>
                        
                     </tbody>
                  </table>
                  </div>
               </div>
            </div>
         </div>

         <div class="flex flex-col col-span-12  lg:col-span-3">
            <div class="flex justify-center items-center font-bold">INDUSTRIAL ARTS</div>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
               <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                  <div class="overflow-hidden">
                  <table class="min-w-full text-center text-sm font-light">
                     <thead
                        class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-green-600 border border-gray-200">
                        <tr>
                        <th scope="col" class=" px-6 py-4">#</th>
                        <th scope="col" class=" px-6 py-4">First</th>
                        <th scope="col" class=" px-6 py-4">Last</th>
                        <th scope="col" class=" px-6 py-4">Grades</th>
                        </tr>
                     </thead>
                     <tbody class="border border-gray-200">
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">1</td>
                           <td class="whitespace-nowrap  px-6 py-4">Mark</td>
                           <td class="whitespace-nowrap  px-6 py-4">Villela</td>
                           <td class="whitespace-nowrap  px-6 py-4">98.75</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">2</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">97.5</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">3</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">96.3</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">4</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">95.0</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">5</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">92.0</td>
                        </tr>
                        
                     </tbody>
                  </table>
                  </div>
               </div>
            </div>
         </div>

         <div class="flex flex-col col-span-12  lg:col-span-3">
            <div class="flex justify-center items-center font-bold">SMAW</div>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
               <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                  <div class="overflow-hidden">
                  <table class="min-w-full text-center text-sm font-light">
                     <thead
                        class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-green-600 border border-gray-200">
                        <tr>
                        <th scope="col" class=" px-6 py-4">#</th>
                        <th scope="col" class=" px-6 py-4">First</th>
                        <th scope="col" class=" px-6 py-4">Last</th>
                        <th scope="col" class=" px-6 py-4">Grades</th>
                        </tr>
                     </thead>
                     <tbody class="border border-gray-200">
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">1</td>
                           <td class="whitespace-nowrap  px-6 py-4">Mark</td>
                           <td class="whitespace-nowrap  px-6 py-4">Villela</td>
                           <td class="whitespace-nowrap  px-6 py-4">98.75</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">2</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">97.5</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">3</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">96.3</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">4</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">95.0</td>
                        </tr>
                        <tr class="border-b dark:border-neutral-500">
                           <td class="whitespace-nowrap  px-6 py-4 font-medium">5</td>
                           <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                           <td class="whitespace-nowrap  px-6 py-4">Pangilinan</td>
                           <td class="whitespace-nowrap  px-6 py-4">92.0</td>
                        </tr>
                        
                     </tbody>
                  </table>
                  </div>
               </div>
            </div>
         </div>
      </section>
      


   </DashboardLayout>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import DashboardLayout from '../Layout/DashboardLayout.vue';
import DashboardCard from '../AdminComponents/DashboardCard.vue';

const user = usePage().props.user;

</script>