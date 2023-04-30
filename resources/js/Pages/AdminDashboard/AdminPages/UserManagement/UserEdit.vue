<template>
    <DashboardLayout :user="loggedUser" >
        <div class="border-bot-only border-gray-600 shadow-md">
            <span class="text-[20px] font-bold text-gray-500">Edit User</span>  
        </div>
        
        <form @submit.prevent="submit">
            <div class="grid grid-cols-12   gap-4 w-full mt-12 ">
                    
                 <!--role-->
                <div class="w-full mb-4 col-span-12 border-bot-only px-2 ">Role</div>
                <div class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3" >
                    <Dropdown  v-model="selectedRole" :options="roleList" optionLabel="role" placeholder="Select a Role" class="w-full md:w-14rem " />
                    <InputError :error="form.errors.role"/>
                </div>
                <div v-if="isTeacher || isStudent" class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3" >
                    <Dropdown  v-model="selectedSubject" :options="subjects" optionLabel="name" placeholder="Select a Subject" class="w-full md:w-14rem " />
                    <InputError :error="form.errors.subject_id"/>
                    
                </div>
                <div class="col-span-12 mb-3 border-bot-only px-2">Personal Info</div>
                <div class="w-full col-span-12 md:col-span-4 ">
                    <span class="p-float-label">
                        <InputText id="firstName" v-model="form.fName" class="w-full" />
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
               <!--spacer-->
               <div v-show="isTeacher" class="w-full mb-4 col-span-12 md:col-span-4 "></div>
                <!--spacer-->
                <!-- parents name -->
                <div  v-if="isStudent" class="w-full mb-4 col-span-12 md:col-span-4 ">
                    <span v-if="isStudent" class="p-float-label">
                        <InputText id="fatherName" v-model="form.fatherName" class="w-full" />
                        <label for="fatherName">Father's name</label>
                    </span>
                    <InputError :error="form.errors.fatherName"/>
                </div>

                <div v-if="isStudent" class="w-full mb-4 col-span-12 md:col-span-4 " >
                    <span class="p-float-label">
                        <InputText id="motherName" v-model="form.motherName" class="w-full" />
                        <label for="motherName">Mother's name</label>
                    </span>
                    <InputError :error="form.errors.motherName"/>
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
                    <Dropdown  v-model="selectedRegion" :options="regionList" optionLabel="region_name" placeholder="Select a Region" class="w-full md:w-14rem"  />
                    <InputError :error="form.errors.region"/>
                </div>

                <div class="w-full mb-4 col-span-12 md:col-span-4 lg:col-span-3" >
                    <Dropdown  v-model="selectedProvince" :options="provinceList" optionLabel="province_name" placeholder="Select a Province" class="w-full md:w-14rem" :disabled="disabledProvince" />
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
                
               
             
                
                
                
            </div>
            
            
            <div class="w-full mt-6 ">
                <Button label="Submit" class="w-full" type="submit"/>
            </div>
            
        </form>
    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '../../Layout/DashboardLayout.vue';
import {ref, onMounted, watch, computed, onBeforeUnmount, reactive, defineProps} from 'vue'
import {regions,provinces,cities,barangays,provinceByName,regionByCode, provincesByCode} from "select-philippines-address";
import { useForm, usePage } from '@inertiajs/vue3'
import InputError from '../../../GlobalComponent/InputError.vue';

const user = defineProps({
    subjects:Array,
    user: Object,
    userSubject: Object,
    
})




regions().then((region)=> regionList.value = region)



const loggedUser = computed(() => usePage().props.user);




const handleSubjectChange = ()=>{
    console.log('selected subject: '+selectedSubject);
}

// show selected
onMounted(()=>{
    regionByCode(user.user.region).then((region) => {
        selectedRegion.value = region
        
        provincesByCode(selectedRegion.value.region_code).then((province) => {
            const tempProvince = province.filter((prov)=> prov.province_code === user.user.province)
            selectedProvince.value = tempProvince[0];
           
            cities(selectedProvince.value.province_code).then((city) => {
                const tempCity = city.filter((town)=> town.city_code === user.user.city)
                selectedCity.value = tempCity[0];
                
                barangays(selectedCity.value.city_code).then((barangays) => {
                    const tempBarangay = barangays.filter((barangay) => barangay.brgy_code === user.user.barangay)
                    selectedBrgy.value = tempBarangay[0]
                   
                });
            });
        });
    });

    if(user.user.role === 'instructor'){
        isTeacher.value = true
        isStudent.value = false
        form.role = user.user.role
    }
    else if(user.user.role === 'student'){
        isStudent.value = true;
        isTeacher.value = false;
        form.role       = user.user.role
    }
    else{
        isTeacher.value = false
        isStudent.value = false
        form.role       = user.user.role
    }
    selectedSubject.value       = user.userSubject
    selectedGender.value        = user.user.gender
    selectedCivilStatus.value   = user.user.civilStatus

    form.email  = user.user.email
    form.id     = user.user.id
    form.image = user.user.image
    form.fatherName = user.user.fatherName
    form.motherName = user.user.motherName
})





const disabledProvince = ref(true)
const disabledCity = ref(true)
const disabledBarangay= ref(true)
//data lists
const regionList = ref()
const provinceList = ref([])
const citiesList = ref([])
const brgyList = ref([]) 
const roleList = ref([
    {
        'role':'admin'
    },
    {
        'role':'instructor'
    },
    {
        'role': 'student'
    }
])










//selected values

const selectedRegion = ref({})

const selectedProvince = ref({})
const selectedCity = ref({})
const selectedBrgy = ref({})
const selectedRole = ref({'role': user.user.role})
const selectedSubject = ref({})
const selectedGender = ref('')
const selectedCivilStatus = ref('')
const isTeacher = ref(false)
const isStudent = ref(false)



//provinceByName(user.user.province).then((province) => console.log(province));
watch([selectedGender, selectedCivilStatus], ([newSelectedGender, newSelectedCivilStatus])=>{
    //console.log(newSelectedCivilStatus+ " *** " + newSelectedGender)
    form.civilStatus = newSelectedCivilStatus
    form.gender = newSelectedGender
})

watch(selectedSubject,(val) =>{
    if(val){
        if(val.name){
            form.subject_id = val.id
            //console.log(val.name)
        }
    }
    
})

watch(selectedRole, (val) =>{ 
     console.log(val.role)
     console.log('role changed');
    if(val.role === 'instructor'){
        isStudent.value = false
        isTeacher.value = true
        form.role       = val.role
        
    }
    else if(val.role === 'student'){
        isTeacher.value = false
        isStudent.value = true;
        form.role       = val.role
    }
    else{
        isTeacher.value = false
        isStudent.value = false
        form.role       = val.role
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
    id:null,
    fName: user.user.fName,
    mName: user.user.mName,
    lName: user.user.lName,
    gender: null,
    civilStatus: null,
    phoneNumber: parseInt(user.user.phoneNumber),
    birthDate: user.user.birthDate,
    image:null,
    region: null,
    province: null,
    city: null,
    barangay: null,
    role: null,
    subject_id: null,
    email:null,
    fatherName:null,
    motherName:null,
})





const submit = ()=> form.post(route('admin.userUpdate'),{
    preserveScroll: true,
    
})
</script>

