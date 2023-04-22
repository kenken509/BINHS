<template>
    <div class="">
        <MainLayout :user="user" :execute="execute" class="relative">
            <!-- <i :class="togglerPosition" class="pi pi-bars" @click="handleToggle"></i> -->
            
            <div class="flex flex-col justify-center item-center  w-full h-full overflow-hidden bg-blue-100 pl-[218px]">
                <div class="flex items-center text-[24px]  p-2 border-bot-only border-indigo-950 mx-2 ">
                    <h1 class="ml-2 font-bold text-gray-600">Dashboard</h1>
                </div>
                <!--MAIN VIEW-->
                
                <!--analytics-->
                <div class="grid grid-cols-4 my-6">
                    <DashboardCard></DashboardCard>
                </div>
                <!--analytics-->
                
                <div class="flex justify-center items-center bg-gray-200 mx-2">TOP 10 STUDENTS</div>
                

                
               
                <!--table-->
                <div class="grid grid-cols-1 md:grid-cols-2  lg:grid-cols-4  gap-4 mx-2">
                    <!--table 1-->
                    <div class="flex flex-col ">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <h1 class="w-full bg-gray-800 text-gray-200 flex justify-center item-center">COOKERY  </h1>
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-center text-sm font-light">
                                    <thead
                                        class="border-b bg-gray-800 font-medium text-white dark:border-neutral-500 dark:bg-gray-900">
                                        <tr>
                                        <th scope="col" class=" px-6 py-4">#</th>
                                        <th scope="col" class=" px-6 py-4">First</th>
                                        <th scope="col" class=" px-6 py-4">Last</th>
                                        <th scope="col" class=" px-6 py-4">Avg</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap  px-6 py-4 font-medium">1</td>
                                            <td class="whitespace-nowrap  px-6 py-4">Mark</td>
                                            <td class="whitespace-nowrap  px-6 py-4">Otto</td>
                                            <td class="whitespace-nowrap  px-6 py-4">97</td>
                                        </tr>
                                        <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap  px-6 py-4 font-medium">2</td>
                                            <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                                            <td class="whitespace-nowrap  px-6 py-4">Thornton</td>
                                            <td class="whitespace-nowrap  px-6 py-4">96</td>
                                        </tr>
                                        <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap  px-6 py-4 font-medium">2</td>
                                            <td class="whitespace-nowrap  px-6 py-4 ">Juan</td>
                                            <td class="whitespace-nowrap  px-6 py-4">Dela Cruz</td>
                                            <td class="whitespace-nowrap  px-6 py-4">95</td>
                                        </tr>
                                        
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--table 1-->
                    <!--**********-->
                    <!--table 2-->
                    <div class="flex flex-col ">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <h1 class="w-full bg-gray-800 text-gray-200 flex justify-center item-center">COSMETOLOGY  </h1>
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-center text-sm font-light">
                                    <thead
                                        class="border-b bg-gray-800 font-medium text-white dark:border-neutral-500 dark:bg-gray-900">
                                        <tr>
                                        <th scope="col" class=" px-6 py-4">#</th>
                                        <th scope="col" class=" px-6 py-4">First</th>
                                        <th scope="col" class=" px-6 py-4">Last</th>
                                        <th scope="col" class=" px-6 py-4">Avg</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap  px-6 py-4 font-medium">1</td>
                                        <td class="whitespace-nowrap  px-6 py-4">Mark</td>
                                        <td class="whitespace-nowrap  px-6 py-4">Otto</td>
                                        <td class="whitespace-nowrap  px-6 py-4">@mdo</td>
                                        </tr>
                                        <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap  px-6 py-4 font-medium">2</td>
                                        <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                                        <td class="whitespace-nowrap  px-6 py-4">Thornton</td>
                                        <td class="whitespace-nowrap  px-6 py-4">@fat</td>
                                        </tr>
                                        <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap  px-6 py-4 font-medium">3</td>
                                        <td colspan="2" class="whitespace-nowrap  px-6 py-4">
                                            Larry the Bird
                                        </td>
                                        <td class="whitespace-nowrap  px-6 py-4">@twitter</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--table 2-->
                    <!--**********-->
                    <!--table 3-->
                    <div class="flex flex-col ">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <h1 class="w-full bg-gray-800 text-gray-200 flex justify-center item-center">ELECTRICAL  </h1>
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-center text-sm font-light">
                                    <thead
                                        class="border-b bg-gray-800 font-medium text-white dark:border-neutral-500 dark:bg-gray-900">
                                        <tr>
                                        <th scope="col" class=" px-6 py-4">#</th>
                                        <th scope="col" class=" px-6 py-4">First</th>
                                        <th scope="col" class=" px-6 py-4">Last</th>
                                        <th scope="col" class=" px-6 py-4">Avg</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap  px-6 py-4 font-medium">1</td>
                                        <td class="whitespace-nowrap  px-6 py-4">Mark</td>
                                        <td class="whitespace-nowrap  px-6 py-4">Otto</td>
                                        <td class="whitespace-nowrap  px-6 py-4">@mdo</td>
                                        </tr>
                                        <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap  px-6 py-4 font-medium">2</td>
                                        <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                                        <td class="whitespace-nowrap  px-6 py-4">Thornton</td>
                                        <td class="whitespace-nowrap  px-6 py-4">@fat</td>
                                        </tr>
                                        <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap  px-6 py-4 font-medium">3</td>
                                        <td colspan="2" class="whitespace-nowrap  px-6 py-4">
                                            Larry the Bird
                                        </td>
                                        <td class="whitespace-nowrap  px-6 py-4">@twitter</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--table 3-->
                    <!--**********-->
                    <!--table 4-->
                        <div class="flex flex-col ">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <h1 class="w-full bg-gray-800 text-gray-200 flex justify-center item-center">ICT STUDENTS</h1>
                                    <div class="overflow-hidden">
                                        <table class="min-w-full text-center text-sm font-light">
                                        <thead
                                            class="border-b bg-gray-800 font-medium text-white dark:border-neutral-500 dark:bg-gray-900">
                                            <tr>
                                            <th scope="col" class=" px-6 py-4">#</th>
                                            <th scope="col" class=" px-6 py-4">First</th>
                                            <th scope="col" class=" px-6 py-4">Last</th>
                                            <th scope="col" class=" px-6 py-4">Avg</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap  px-6 py-4 font-medium">1</td>
                                            <td class="whitespace-nowrap  px-6 py-4">Mark</td>
                                            <td class="whitespace-nowrap  px-6 py-4">Otto</td>
                                            <td class="whitespace-nowrap  px-6 py-4">@mdo</td>
                                            </tr>
                                            <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap  px-6 py-4 font-medium">2</td>
                                            <td class="whitespace-nowrap  px-6 py-4 ">Jacob</td>
                                            <td class="whitespace-nowrap  px-6 py-4">Thornton</td>
                                            <td class="whitespace-nowrap  px-6 py-4">@fat</td>
                                            </tr>
                                            <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap  px-6 py-4 font-medium">3</td>
                                            <td colspan="2" class="whitespace-nowrap  px-6 py-4">
                                                Larry the Bird
                                                {{ togglerPosition }}
                                            </td>
                                            <td class="whitespace-nowrap  px-6 py-4">@twitter</td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--table 4-->
                    {{ viewWidth }}
                </div>
                <div class="grid grid-cols-1 gap-x-3 lg:grid-cols-4 w-full">
                    <div>

                    </div>
                    <Chart type="pie" :data="chartData" :options="chartOptions" class="w-full " />
                    
                    
                </div>
            </div>
            <!--chart-->
            
                <!--chart-->
        </MainLayout>
       
    </div>
    
    

   
</template>

<script setup>
import MainLayout from './Layout/MainLayout.vue';
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import DashboardCard from './ExamComponents/DashboardCard.vue'
import { ref, onMounted } from "vue";
import Chart from 'primevue/chart';



defineProps({
    viewWidth:String
})


const user = computed(() => usePage().props.user)
const execute = ref(false);
const togglerPosition = ref('side-closed')

const handleToggle = ()=> {
    execute.value = !execute.value
    togglerPosition.value = togglerPosition.value === 'side-open' ? 'side-closed' : 'side-open'
}

const te = computed(()=>{
    if(togglerPosition === '218px'){
        
    }
})
const chartData = ref({
    labels: ['Cookery', 'Cosmetology', 'Industrial Arts', 'ICT'],
    datasets: [
        {
            label: 'Sales',
            data: [300, 325, 702, 620],
            backgroundColor: ['rgba(255, 159, 64, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(153, 102, 255, 0.2)'],
            borderColor: ['rgb(255, 159, 64)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)', 'rgb(153, 102, 255)'],
            borderWidth: 1
        }
    ]
});
const chartOptions = ref({
    scales: {
        y: {
            beginAtZero: true
        }
    }
});



</script>

