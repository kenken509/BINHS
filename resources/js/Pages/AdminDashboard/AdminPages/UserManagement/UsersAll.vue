<template>
    <DashboardLayout :user="user">
            <!-- flow bite tables-->
            <div class="flex flex-col ">
                <div class="grid grid-cols-6 items-center justify-between border-bot-only border-gray-600 shadow-md py-2">
                    <div class="col-span-6 md:col-span-5">
                        <span class="text-[20px] font-bold text-gray-500">All Users Page</span>
                    </div>
                    <div class="col-span-6 md:col-span-1 item-center">
                        <form @submit.prevent="submit">
                            <Dropdown  v-model="selectedRole" :options="filter" optionLabel="role" placeholder="Sort by role" class="w-full md:w-14rem " />
                        </form> 
                    </div>
                    <div class="card flex justify-content-center">
                        <InputText type="text" v-model="searchField" />
                    </div>
                    <div >Search field: {{ searchField }}</div>
                    
                    <div v-for="search in exist" :key="search.id">Hanap : {{ search.fName }}</div>
                    

                  
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
                                <th scope="col" class="px-6 py-4">Added by:</th>
                                <th scope="col" class="px-6 py-4">Updated by:</th>
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
                                        
                                        <div v-for="(creator,index) in users.data" :key="index">
                                            <p v-if="creator.id === user.created_by">{{creator.role }} {{ creator.fName }}</p>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        
                                        <div v-for="(editor,index) in users.data" :key="index">
                                            <p v-if="editor.id === user.updated_by">{{editor.role }} {{ editor.fName }}</p>
                                        </div>
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class=" space-x-6" >
                                            <div v-if="$page.props.flash.success"><Toast position="top-left" /> </div>
                                            
                                        
                                            
                                            <Link :href="route('admin.userDelete', {user: user.id})" class="cursor-pointer" v-tooltip.left="'Delete User'" as="button" method="delete" ><span class="pi pi-trash text-red-700 scale-110 hover:dark:scale-150"></span></Link>
                                            <Link :href="route('admin.editUser', {id:user.id} )" class="cursor-pointer hover:dark:scale-125" v-tooltip.right="'Edit User'" ><span class="pi pi-user-edit text-green-600 scale-110 hover:dark:scale-150"></span></Link>
                                            <span class="pi pi-eye text-green-600 scale-110 hover:dark:scale-150 cursor-pointer" v-tooltip.right="'View full info'" @click="openModal(user.id)" ></span>
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
                <!--Modal-->
                <div class="card flex justify-content-center userInfo">
                    
                    <Dialog v-model:visible="visible" modal   :userId="userId" :style="{ width: '50vw' } ">
                        <div v-for="user in users.data" :key="user.id">
                            <div v-if="user.id === userId">
                                <img :src="user.image ? appUrl+user.image:appUrl+defaultImage" alt="error" class="w-[50px] h-[50px]"/>
                                <h1 class="border-bot-only">User Info</h1>
                                <p>Role: {{ user.role }}</p>
                                <p>First Name: {{ user.fName }}</p>
                                <p>Middle Name: {{ user.mName }}</p>
                                <p>Last Name: {{ user.lName }}</p>
                                <p>Gender: {{ user.gender }}</p>
                                <p>Civil Status: {{ user.civilStatus }}</p>
                                <p >Email: {{ user.email }}</p>
                                <p>Birthday: {{ user.birthDate }}</p>
                                <p>Age: {{ user.age }}</p>
                                <p>Contact #: {{ user.phoneNumber }}</p>
                                <p>Subject: {{ user.subject_id }}</p>

                            </div>
                            
                        </div>
                       
                        <template #footer>
                            <Button label="Close" icon="pi pi-times" @click="visible = false" text />
                            <Button label="Print" icon="pi pi-check" @click="printPage" autofocus />
                        </template>
                    </Dialog>
                </div>
            </div>
    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '../../Layout/DashboardLayout.vue';
import Pagination from '../../AdminComponents/Pagination.vue';
import {ref, computed, watch, onMounted } from 'vue'
import {Link, useForm, usePage} from '@inertiajs/vue3'
import { useToast } from 'primevue/usetoast';
import { toUpperFirst } from '../../../Functions/Methods.vue';

const searchField = ref('');




const filter = ref([
    {
        'role':'All',
        'value': 'all'
    },
    {
        'role':'Admin',
        'value': 'admin'
    },
    {
        'role': 'Instructor',
        'value': 'instructor'
    },
    {
        'role': 'Student',
        'value': 'student'
    }
])
const visible = ref(false);
const userId =ref(1)
const selectedRole = ref(null);
const selectedFilter = useForm({
    role : null,
});

watch(selectedRole,(val) =>{
    // do something!
    selectedFilter.role = val.value

    const submit = selectedFilter.post(route('admin.showAllUsers'),{
        preserveScroll: true,
    });
    
})
//page.props.value.flash.success    <<<< to accesss data





// const showSuccess = (content) => {
//     toast.add({ severity: 'success',summary: 'Successfully Deleted', detail: content,  life: 3000});
// };

const props = defineProps({
   users:Object,
})
const exist = ref([]);



watch(searchField, (newSearchField )=>{
   

    const searchUser = props.users.data.map((user)=>{
    const found = Object.keys(user).find((data) => user[data] === newSearchField);
    
    if(newSearchField === ''){
        exist.value = []
    }
    if(found){
        exist.value.push(user);
    }
});
})






const user = usePage().props.user;



//modal toggler
const openModal = (id)=> {
    visible.value = true
    userId.value = id
    
    
}

// print
const printPage = ()=>{
    window.print()
}

const appUrl = 'http://127.0.0.1:8000/storage/'
const defaultImage = 'images/default.png'
</script>