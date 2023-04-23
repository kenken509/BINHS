<template>
    <DashboardLayout>
        <div class="border-bot-only border-gray-600 shadow-md">
            <span class="text-[20px] font-bold text-gray-500">Add New User</span>  
        </div>

        <form @submit.prevent="submit">
            <div class="grid grid-cols-12   gap-4 w-full mt-12 ">
                <div class="col-span-12 mb-3 border-bot-only px-2">Personal Info</div>
                <div class="w-full col-span-12 md:col-span-4 ">
                    <span class="p-float-label">
                        <InputText id="firstName" v-model="form.firstName" class="w-full"/>
                        <label for="firstName">First name</label>
                    </span>
                </div>
                <div class="w-full mb-4 col-span-12 md:col-span-4 ">
                    <span class="p-float-label">
                        <InputText id="middleName" v-model="form.middleName" class="w-full" />
                        <label for="middleName">Middle name</label>
                    </span>
                </div>
                
                <div class="w-full mb-4 col-span-12 md:col-span-4 ">
                    <span class="p-float-label">
                        <InputText id="lastName" v-model="form.lastName" class="w-full"/>
                        <label for="lastName">Last name</label>
                    </span>
                </div>
                
                
                <div class="w-full mb-4 col-span-12 md:col-span-4 ">
                    <span class="p-float-label">
                        <InputText id="lastName" v-model="form.email" class="w-full" type="email"/>
                        <label for="lastName">Email</label>
                    </span>
                </div>

                <div class="w-full mb-4 col-span-12 md:col-span-4 " >
                    <span class="p-float-label">
                        <InputNumber v-model="form.phoneNumber" inputId="withoutgrouping" :useGrouping="false"  id="phoneNumber" class="w-full"/>
                        <label for="phoneNumber">Phone Number</label>
                    </span>
                </div>

                <div class="w-full mb-4 col-span-12 md:col-span-4 " >
                    <span class="p-float-label">
                        <Calendar v-model="form.birthDate" id="birthDate" class="w-full" />
                        <label for="birthDate">Birthday</label>
                    </span>
                </div>
                
                
                
                
                
                <!--Complete Address-->
                <div class="w-full mb-4 col-span-12 border-bot-only px-2 ">Address</div>
                <div class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3" >
                    <Dropdown  v-model="selectedRegion" :options="regionList" optionLabel="region_name" placeholder="Select a Region" class="w-full md:w-14rem" />
                </div>

                <div class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3" >
                    <Dropdown  v-model="selectedProvince" :options="provinceList" optionLabel="province_name" placeholder="Select a Province" class="w-full md:w-14rem" :disabled="disabledProvince"/>
                </div>

                <div class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3">
                    <Dropdown  v-model="selectedCity" :options="citiesList" optionLabel="city_name" placeholder="Select a City" class="w-full md:w-14rem "  :disabled="disabledCity"/>
                </div>
                <div class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3">
                    <Dropdown  v-model="selectedBrgy" :options="brgyList" optionLabel="brgy_name" placeholder="Select a Barangay" class="w-full md:w-14rem " :disabled="disabledBarangay"/>
                </div>
                
                <!--role-->
                <div class="w-full mb-4 col-span-12 border-bot-only px-2 ">Role</div>
                <div class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3" >
                    <Dropdown  v-model="selectedRole" :options="roleList" optionLabel="role" placeholder="Select a Role" class="w-full md:w-14rem " />
                </div>
                <div v-if="isTeacher" class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3" >
                    <Dropdown  v-model="selectedSubject" :options="subjectList" optionLabel="title" placeholder="Select a Subject" class="w-full md:w-14rem "  />
                </div>
                
            </div>
            
            <div class="w-full mt-6 ">
                <Button label="Submit" class="w-full" type="submit"/>
                
            </div>
            
        </form>
    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '../../Layout/DashboardLayout.vue';
import {ref, onMounted, watch, computed} from 'vue'
import {regions,provinces,cities,barangays,} from "select-philippines-address";
import { useForm } from '@inertiajs/vue3'


const disabledProvince = ref(true)
const disabledCity = ref(true)
const disabledBarangay= ref(true)
//data lists
const regionList = ref([])
const provinceList = ref([])
const citiesList = ref([])
const brgyList = ref([]) 
const roleList = ref([
    {
        'role':'Admin'
    },{
        'role':'Instructor'
    }
])
const subjectList = ref([
    {
        'title': 'Home Economics'
    },
    {
        'title': 'ICT'
    },
    {
        'title': 'Industrial Arts'
    },
    {
        'title': 'SMAW'
    }
])


regions().then((region)=> regionList.value = region)


//selected values
const selectedRegion = ref({})
const selectedProvince = ref({})
const selectedCity = ref({})
const selectedBrgy = ref({})
const selectedRole = ref({})
const selectedSubject = ref({})
const isTeacher = ref(false)
console.log(selectedRole.value)

watch(selectedRole, (val) =>{ 
    // console.log(val)
    if(val.role === 'Instructor'){
        isTeacher.value = true
    }else{
        isTeacher.value = false
    }
    
})

// watchers 
watch(selectedRegion, (val) =>{ 
    //console.log(val.region_code)
    provinces(val.region_code).then((province) => provinceList.value = province);
    disabledProvince.value = false
})

watch(selectedProvince, (val) =>{
    //console.log(val.province_code)
    cities(val.province_code).then((city) => citiesList.value = city);
    disabledCity.value = false
})

watch(selectedCity, (val) =>{
    //console.log(val.city_code)
    barangays(val.city_code).then((barangays) => brgyList.value = barangays);
    disabledBarangay.value = false
})

const form = useForm({
    firstName: null,
    middleName: null,
    lastName: null,
    email: null,
    phoneNumber: null,
    birthDate: null,
    
})

const submit = ()=>form.post(route('admin.userStore'),{
    preserveScroll: true,
})
</script>

