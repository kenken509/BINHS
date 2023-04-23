<template>
    <DashboardLayout>
        <div class="border-bot-only border-gray-600 shadow-md">
            <span class="text-[20px] font-bold text-gray-500">Add New User</span>  
        </div>

        <form>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 w-full mt-6 ">
                <div class="w-full ">
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
                
                <!--Complete Address-->
                
                <div >
                    <Dropdown  v-model="selectedProvince" :options="provinces.data" optionLabel="name" placeholder="Select a Province" class="w-full md:w-14rem" />
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
import {ref, onMounted} from 'vue'


const provincesUrl =  'https://ph-locations-api.buonzz.com/v1/provinces'
const provinces = ref({})


const selectedProvince = ref('')

onMounted(async () => {
  try {
    const response = await axios.get(provincesUrl)
    provinces.value = response.data
  } catch (error) {
    console.error(error)
  }
})




</script>