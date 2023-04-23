<template>
    <DashboardLayout>
        <div class="border-bot-only border-gray-600 shadow-md">
            <span class="text-[20px] font-bold text-gray-500">Add New User</span>  
        </div>

        <form>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 w-full mt-6 ">
                <!-- <div class="w-full ">
                    <span class="p-float-label">
                        <InputText id="firstName" v-model="value" class="w-full"/>
                        <label for="firstName">First name</label>
                    </span>
                </div>
                <div class="w-full ">
                    <span class="p-float-label">
                        <InputText id="middleName" v-model="value" class="w-full" />
                        <label for="middleName">Middle name</label>
                    </span>
                </div>
                <div class="w-full ">
                    <span class="p-float-label">
                        <InputText id="lastName" v-model="value" class="w-full"/>
                        <label for="lastName">Last name</label>
                    </span>
                </div>
                <div class="w-full ">
                    <span class="p-float-label">
                        <InputText id="email" v-model="value" class="w-full"/>
                        <label for="email">Email</label>
                    </span>
                </div>
                <div class="w-full">
                    <span class="p-float-label">
                        <InputNumber v-model="value2" inputId="withoutgrouping" id="phoneNumber" :useGrouping="false" class="w-full"/>
                        <label for="phoneNumber">Phone number</label>
                    </span>
                </div>
                 -->
                <!--Complete Address-->
                
                <div >
                    <Dropdown  v-model="selectedProvince" :options="provinces" optionLabel="name" placeholder="Select a Province" class="w-full md:w-14rem" />
                </div>

                <div >
                    <Dropdown  v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Select a City" class="w-full md:w-14rem" />
                </div>
                
                
            </div>
            
            <div class="w-full mt-6 ">
                <Button label="Submit" class="w-full" />
            </div>
        </form>
    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '../../Layout/DashboardLayout.vue';
import axios from 'axios';
import {ref, onMounted, watch, computed} from 'vue'


const provincesUrl =  'https://ph-locations-api.buonzz.com/v1/provinces'
const citiesUrl = 'https://ph-locations-api.buonzz.com/v1/cities'

const provinces = ref({})
const cities = ref({})


const selectedProvince = ref('')
const selectedCity = ref('')




 const getCities = async () =>{
        try{
            const res = await axios.get(citiesUrl)
            const tests = res.data.data
            console.log('my data: '+ res.data.data[1].name)
            cities.value = res.data.data.filter((val) => val.province_code === selectedProvince.value.id )
        }catch(e){
            console.log(e)
        }
    }

watch(selectedProvince,(val)=>{
    getCities()
})




onMounted(async () => {
  try {
    const response = await axios.get(provincesUrl)
    provinces.value = response.data.data
  } catch (error) {
    console.error(error)
  }
})




</script>