<template>
    <DashboardLayout>
            <div class="flex flex-col ">
                <div class="border-bot-only border-gray-600 shadow-md">
                    <span class="text-[20px] font-bold text-gray-500">All Users Page</span>
                </div>
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 mt-4 overflow-x">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-scroll">
                            <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500 bg-gray-300">
                                <tr>
                                <th scope="col" class="px-6 py-4">ID #</th>
                                <th scope="col" class="px-6 py-4">User Name</th>
                                <th scope="col" class="px-6 py-4">Email</th>
                                <th scope="col" class="px-6 py-4">Role</th>
                                <th scope="col" class="px-6 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                v-for="user in users.data"
                                :key="user.id"
                                
                                class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-gray-300">
                                    
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ user.id}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ user.name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ user.email }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ user.role }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class=" space-x-6" >
                                            <Link class="cursor-pointer hover:dark:scale-125" v-tooltip.left="'Edit User'"><span class="pi pi-user-edit text-green-600 scale-110 hover:dark:scale-150"></span></Link>
                                            <Link class="cursor-pointer" v-tooltip.right="'Delete User'"><span class="pi pi-trash text-red-700 scale-110 hover:dark:scale-150"></span></Link>
                                        </div>
                                        
                                    </td>
                                </tr>
                                
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div v-if="users.data.length" class="w-full flex justify-center mt-8 mb-8">
                    <Pagination :links="users.links"/>
                </div>
            </div>
    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '../../Layout/DashboardLayout.vue';
import Pagination from '../../AdminComponents/Pagination.vue';
import {ref} from 'vue'
import {Link} from '@inertiajs/vue3'


defineProps({
   users:Object,
})



</script>