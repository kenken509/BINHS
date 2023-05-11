<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import {Link} from '@inertiajs/vue3'

const inputType = ref('password');
const iconType = ref(true)

const handleClick = () => {
    inputType.value = inputType.value === 'password' ? 'text' : 'password'
    iconType.value = !iconType.value
}

const form = useForm({
    email:null,
    password:null
})

const login = ()=> form.post(route('login.store'))
</script>

<template >
    <div class="w-screen h-screen flex items-center justify-center">
        <div class="grid grid-cols-2  border border-black rounded  w-2/3 h-2/3">
            <div class="flex items-center justify-center ">
                <img src="images/webPage/loginBG.png" class="bg-red-500">
            </div>

            <!--login form-->
            <div class="">
                <form  @submit.prevent="login">
                    <div class="w-full mx-auto p-5">
                        <div class=" mt-4  ">
                            <label class="label" for="email">E-mail</label>
                            
                            
                            <div class="w-full relative flex items-center">
                                <i class="fa-solid fa-user absolute p-3 text-blue-400 pointer-events-none"></i>
                                <input type="text" id="email" name="email" class="input pl-8"  v-model="form.email" autocomplete="false">
                            </div>
                            
                            
                            <div v-if="form.errors.email" class="input-error">{{ form.errors.email }}</div>
                        </div>
                        
                        <div class="mt-4">
                            <label class="label" for="password">Password</label>
                            
                            <div class="relative flex items-center w-full ">
                                <div class="absolute flex justify-between w-full  items-center ">
                                    <i v-if="iconType" class="fa-solid fa-eye fa-fade fa-sm text-blue-400 pl-3 cursor-pointer" @click="handleClick"></i>
                                    <i v-else class="fa-solid fa-eye-slash fa-sm text-blue-400 pl-3 cursor-pointer" @click="handleClick"></i>
                                    
                                </div>
                                <input :type="inputType" id="password" name="password" placeholder="password" class="input focus:outline:white focus:outline-offset-0 shadow-none pl-8 w-full" v-model="form.password">
                            </div>
                            
                        </div >
                        <button class="btn-primary w-full mt-4 text-center" type="submit">Login</button>
                        <div class="flex justify-between mt-2">
                            <span>Don't have and account? <Link :href="route('register.guest')" class="text-blue-500"> register</Link></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
</template>
