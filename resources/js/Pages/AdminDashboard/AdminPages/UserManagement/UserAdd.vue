<template>
    <DashboardLayout :user="user">
        <div class="border-bot-only border-gray-600 shadow-md">
            <span class="text-[20px] font-bold text-gray-500">Add New User</span>  
        </div>
        
        <form @submit.prevent="submit">
            <div class="grid grid-cols-12   gap-4 w-full mt-12 ">

                <div class="col-span-12 mb-3 border-bot-only px-2">Personal Info</div>
                <div class="w-full col-span-12 md:col-span-4 ">
                    <span class="p-float-label">
                        <InputText id="firstName" v-model="form.fName" class="w-full"/>
                        <label for="firstName">First name</label>
                    </span>
                    <InputError :error="form.errors.fName"/>
                </div>
                <div class="w-full mb-4 col-span-12 md:col-span-4 ">
                    <span class="p-float-label">
                        <InputText id="middleName" v-model="form.mName" class="w-full" />
                        <label for="middleName">Middle name</label>
                    </span>
                    <InputError :error="form.errors.mName"/>
                </div>
                
                <div class="w-full mb-4 col-span-12 md:col-span-4 ">
                    <span class="p-float-label">
                        <InputText id="lastName" v-model="form.lName" class="w-full"/>
                        <label for="lastName">Last name</label>
                    </span>
                    <InputError :error="form.errors.lName"/>
                </div>
                
                
                <div class="w-full mb-4 col-span-12 md:col-span-4 ">
                    <span class="p-float-label">
                        <InputText id="email" v-model="form.email" class="w-full" type="email"/>
                        <label for="email">Email</label>
                    </span>
                    <InputError :error="form.errors.email"/>
                </div>

                <div class="w-full mb-4 col-span-12 md:col-span-4 " >
                    <span class="p-float-label">
                        <InputNumber v-model="form.phoneNumber" inputId="withoutgrouping" :useGrouping="false"  id="phoneNumber" class="w-full"/>
                        <label for="phoneNumber">Phone Number ( <span class="text-red-300">639191112222</span> )</label>
                    </span>
                    <InputError :error="form.errors.phoneNumber"/>
                </div>

                <div class="w-full mb-4 col-span-12 md:col-span-4 " >
                    <span class="p-float-label">
                        <Calendar v-model="form.birthDate" id="birthDate" class="w-full" />
                        <label for="birthDate">Birthday</label>                       
                    </span>
                    <InputError :error="form.errors.birthDate"/>
                </div>

                <div class="w-full mb-4 col-span-12 md:col-span-4 space-y-2 mx-4" >
                    <h1 class="text-gray-600 text-[16px]">Gender :</h1>
                    <div class="w-full mb-4 col-span-12 md:col-span-4 flex align-items-center space-x-4 items-center">
                        <RadioButton v-model="selectedGender" inputId="male" name="male" value="male" />
                        <label for="ingredient1" class="ml-2">Male</label>
                        
                        <RadioButton v-model="selectedGender" inputId="female" name="female" value="female" />
                        <label for="ingredient1" class="ml-2">Female</label>
                        <InputError :error="form.errors.gender"/>
                    </div>
                    
                </div>

                <div class="w-full mb-4 col-span-12 md:col-span-4 space-y-2 mx-4" >
                    <h1 class="text-gray-600 text-[16px]">Civil Status :</h1>
                    <div class="w-full mb-4 col-span-12 md:col-span-4 flex align-items-center space-x-4 items-center">
                        <RadioButton v-model="selectedCivilStatus" inputId="single" name="single" value="single" />
                        <label for="ingredient1" class="ml-2">Single</label>

                        <RadioButton v-model="selectedCivilStatus" inputId="married" name="married" value="married" />
                        <label for="ingredient1" class="ml-2">Married</label>
                        <InputError :error="form.errors.civilStatus"/>
                    </div>
                </div>
               
                
                
                
                
                <!--Complete Address-->
                <div class="w-full mb-4 col-span-12 border-bot-only px-2 ">Address</div>
                <div class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3" >
                    <Dropdown  v-model="selectedRegion" :options="regionList" optionLabel="region_name" placeholder="Select a Region" class="w-full md:w-14rem" />
                    <InputError :error="form.errors.region"/>
                </div>

                <div class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3" >
                    <Dropdown  v-model="selectedProvince" :options="provinceList" optionLabel="province_name" placeholder="Select a Province" class="w-full md:w-14rem" :disabled="disabledProvince"/>
                    <InputError :error="form.errors.province"/>
                </div>

                <div class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3">
                    <Dropdown  v-model="selectedCity" :options="citiesList" optionLabel="city_name" placeholder="Select a City" class="w-full md:w-14rem "  :disabled="disabledCity"/>
                    <InputError :error="form.errors.city"/>
                </div>
                <div class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3">
                    <Dropdown  v-model="selectedBrgy" :options="brgyList" optionLabel="brgy_name" placeholder="Select a Barangay" class="w-full md:w-14rem " :disabled="disabledBarangay" />
                    <InputError :error="form.errors.barangay"/>
                </div>
                
                <!--role-->
                <div class="w-full mb-4 col-span-12 border-bot-only px-2 ">Role</div>
                <div class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3" >
                    <Dropdown  v-model="selectedRole" :options="roleList" optionLabel="role" placeholder="Select a Role" class="w-full md:w-14rem " />
                    <InputError :error="form.errors.role"/>
                </div>
                <div v-if="isTeacher" class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3" >
                    <Dropdown  v-model="selectedSubject" :options="subjectList" optionLabel="title" placeholder="Select a Subject" class="w-full md:w-14rem " />
                    <InputError :error="form.errors.subject"/>
                </div>
             

                <div class="col-span-12 mb-3 border-bot-only px-2">Avatar</div>
                <div class="col-span-12  px-6" >
                    <img  :src="imageUrl  ? imageUrl: appUrl+defaultImage" alt="Uploaded Image" class="w-[100px] h-[100px] rounded-full">
                </div>
                <div class="flex flex-col col-span-12 px-4">
                    <label for="myfile" class="mb-2 cursor-pointer">Profile Picture</label>
                    <input  type="file" id="myfile" @input="onFileChange" class="mt-2">
                    
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                    <div v-if="imageErrors.includes('this image')"><InputError :error="'Image file type must be in jpg,png format. Maximum size: 3mb'" /></div>
                    
                    
                    
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
import {ref, onMounted, watch, computed, onBeforeUnmount, reactive} from 'vue'
import {regions,provinces,cities,barangays,} from "select-philippines-address";
import { useForm, usePage } from '@inertiajs/vue3'
import InputError from '../../../GlobalComponent/InputError.vue';



const cleanup = ()=>{
    URL.revokeObjectURL(imageUrl.value);
}

onBeforeUnmount(cleanup);

const user = computed(() => usePage().props.user);

const imageUrl = ref('');

const handleSubjectChange = ()=>{
    console.log('selected subject: '+selectedSubject);
}





const appUrl = 'http://127.0.0.1:8000/storage/'
const defaultImage = 'images/default.png'

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
        'role':'admin'
    },{
        'role':'instructor'
    }
])
const subjectList = ref([
    {
        'title': 'home Economics'
    },
    {
        'title': 'ict'
    },
    {
        'title': 'industrial arts'
    },
    {
        'title': 'smaw'
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
const selectedGender = ref('')
const selectedCivilStatus = ref('')
const isTeacher = ref(false)


watch([selectedGender, selectedCivilStatus], ([newSelectedGender, newSelectedCivilStatus])=>{
    //console.log(newSelectedCivilStatus+ " *** " + newSelectedGender)
    form.civilStatus = newSelectedCivilStatus
    form.gender = newSelectedGender
})

watch(selectedSubject,(val) =>{
    //console.log(val)
    form.subject = val.title
})

watch(selectedRole, (val) =>{ 
     //console.log(val.role)
    if(val.role === 'instructor'){
        isTeacher.value = true
        form.role = val.role
    }else{
        isTeacher.value = false
        form.role = val.role
    }
    
})

// watchers 
watch(selectedRegion, (val) =>{ 
    //console.log(val.region_code)
    form.region = val.region_code
    provinces(val.region_code).then((province) => provinceList.value = province);
    
    disabledProvince.value = false
})

watch(selectedProvince, (val) =>{
    //console.log(val.province_code)
    form.province = val.province_code
    cities(val.province_code).then((city) => citiesList.value = city);
    disabledCity.value = false
})

watch(selectedCity, (val) =>{
    //console.log(val.city_code)
    form.city = val.city_code
    barangays(val.city_code).then((barangays) => brgyList.value = barangays);
    disabledBarangay.value = false
})

watch(selectedBrgy, (val) =>{
    //console.log(val.brgy_code)
    form.barangay = val.brgy_code
})

const form = useForm({
    fName: null,
    mName: null,
    lName: null,
    gender: selectedGender.value,
    civilStatus: null,
    email: null,
    phoneNumber: null,
    birthDate: null,
    image:[],
    region: null,
    province: null,
    city: null,
    barangay: null,
    role: null,
    subject: null,
    password: null,
})

const imageErrors = computed(()=> Object.values(form.errors))

const onFileChange = (event) =>{
    
    const file = event.target.files[0];
    imageUrl.value = URL.createObjectURL(file);
    
    form.image.push(event.target.files[0])
    
}


const submit = ()=> form.post(route('admin.userStore'),{
    preserveScroll: true,
    onSuccess: () => form.reset('images'), // if sucessfull reset image input
})
</script>

