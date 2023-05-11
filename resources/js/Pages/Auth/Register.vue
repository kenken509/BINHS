<template>

   
    <div class="grid grid-cols-3 bg-gray-200 h-screen items-center py-10">
        <div></div>
        <div class="border border-black col-span-3 md:col-span-1 h-full   mx-4 md:mx-0 pt-8 rounded-md" >
            <div class="flex justify-center items-center w-full mt-4">
                <img src="../../../../public/images/webPage/logo1.png" alt="error"  class="w-[150px] h-[150px]" /> 
            </div>
            <div class="flex justify-center">
                <span class=" font-bold text-xl">Account Registration</span>
            </div>
            <!--input group-->
            <div>
                <form class="px-8" @submit.prevent="submit">
                    <div class="w-full col-span-12 md:col-span-4 mt-20 ">
                        <span class="p-float-label">
                            <InputText id="email"  class="w-full" v-model="form.email" />
                            <label for="email">email</label>
                        </span>
                        <InputError :error="form.errors.email"/>
                    </div>
                    <div class="w-full my-8 ">
                        <span class="p-float-label ">
                            <div class="w-full bg-red-300">
                            </div>
                            <InputText id="password" type="password" class="w-full" v-model="form.password" />
                            <label for="password">Password</label>
                        </span>
                        <InputError :error="form.errors.password"/>
                    </div>

                    <div class="w-full my-8">
                        <span class="p-float-label ">
                            <div class="w-full bg-red-300">
                            </div>
                            <InputText id="password_confirmation" type="password" class="w-full" v-model="form.password_confirmation" />
                            <label for="password_confirmation">Confirm password</label>
                        </span>
                    </div>
                    <div class="w-fullmy-8">
                        <Button label="Submit" class="w-full" type="submit"/>
                    </div>
                    
                    
                    
                </form>
            </div>
        </div>
        
        <div></div>
    </div>
</template>

<script setup>
import {computed} from 'vue'
import { useForm,usePage } from '@inertiajs/vue3';
import InputError from '../GlobalComponent/InputError.vue';
const user = computed(() => usePage().props.user);

const form = useForm({
    email: null,
    password:null,
    password_confirmation:null,
    role: 'guest',
})

const submit = () => form.post(route('register.guestStore'),{preserveScroll:true});
</script>