<template>
    <DashboardLayout :user="user">
            <div class="flex flex-col ">
                <div class="border-bot-only border-gray-600 shadow-md">
                    <span class="text-[20px] font-bold text-gray-500">All Users Page</span>
                    
                </div>
                <div v-if="$page.props.flash.success" class="flex items-center rounded-md bg-[#28a745] my-4 h-8 "><span class="p-3 text-gray-200">{{ $page.props.flash.success }}</span></div>
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 mt-4 overflow-x">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-scroll">
                            <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500 bg-gray-300">
                                <tr>
                                <th scope="col" class="px-6 py-4">ID #</th>
                                <th scope="col" class="px-6 py-4">Picture</th>
                                <th scope="col" class="px-6 py-4">Full name</th>
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
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <Image :src="user.image ? appUrl+user.image:appUrl+defaultImage" alt="Image" width="60" preview>
                                            <template #indicator>
                                                <i class="pi pi-eye"></i>
                                            </template>
                                        </Image>     
                                    </td>   
                                    <td class="whitespace-nowrap px-6 py-4">{{ toUpperFirst(user.lName)  }}, {{ toUpperFirst(user.fName) }} {{ user.mName.substring(0,1).toUpperCase() }}.</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ user.email }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ user.role }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class=" space-x-6" >
                                            <div v-if="$page.props.flash.success"><Toast position="top-left" /> </div>
                                            
                                        
                                            
                                            <Link :href="route('admin.userDelete', {user: user.id})" class="cursor-pointer" v-tooltip.left="'Delete User'" as="button" method="delete" ><span class="pi pi-trash text-red-700 scale-110 hover:dark:scale-150"></span></Link>
                                            <Link :href="route('admin.editUser', {id:user.id} )" class="cursor-pointer hover:dark:scale-125" v-tooltip.right="'Edit User'" ><span class="pi pi-user-edit text-green-600 scale-110 hover:dark:scale-150"></span></Link>
                                            <Link href="#" class="cursor-pointer" v-tooltip.right="'View full info'" ><span class="pi pi-eye text-green-600 scale-110 hover:dark:scale-150"></span></Link>
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
import {ref, computed } from 'vue'
import {Link, usePage} from '@inertiajs/vue3'
import { useToast } from 'primevue/usetoast';



//page.props.value.flash.success    <<<< to accesss data




// const showSuccess = (content) => {
//     toast.add({ severity: 'success',summary: 'Successfully Deleted', detail: content,  life: 3000});
// };

defineProps({
   users:Object,
})

const user = usePage().props.user;
const toUpperFirst = (str)=>{
    let firstLetter = str.charAt(0);
    let capFirstLetter = firstLetter.toUpperCase();
    let restOfString = str.slice(1);
    let result = capFirstLetter + restOfString;

    return result;
}
const appUrl = 'http://127.0.0.1:8000/storage/'
const defaultImage = 'images/default.png'
</script>