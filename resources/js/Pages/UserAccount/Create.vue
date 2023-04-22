<template>
   
    <div class="w-screen px-24">
        <section class="h-screen ">
        <div class="container h-full px-6 py-24  ">
            <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between ">
                <!-- Left column container with background-->
                <div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12 ">
                    <img
                    src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                    class="w-full"
                    alt="Phone image" />
                </div>

                <!-- Right column container with form -->
                <div class="md:w-8/12 lg:ml-6 lg:w-5/12 ">
                    <form @submit.prevent="register">
                    <!-- name input-->
                        <div class="relative mb-6" data-te-input-wrapper-init>
                            <input
                            v-model="form.name"
                            type="text"
                            class="peer input-anim"
                            id="name"
                            autocomplete="off"
                            />
                            <label
                            for="email"
                            class="absolute label-anim"
                            >Name
                            </label>
                            
                        </div>
                        <div v-if="form.errors.name" class="input-error mb-6">{{ form.errors.name }}</div>
                    <!-- Email input -->
                        <div class="relative mb-6 " data-te-input-wrapper-init>
                            <input
                            v-model="form.email"
                            type="text"
                            class="peer input-anim"
                            id="email"
                            autocomplete="off"
                            />
                            <label
                            for="email"
                            class="absolute label-anim"
                            >Email address
                            </label>
                        </div>
                        <div v-if="form.errors.email" class="input-error mb-6">{{ form.errors.email }}</div>

                    <!--Mobile number-->
                        <div class="relative mb-6 " data-te-input-wrapper-init>
                                <input
                                v-model="form.mobile_no"
                                type="text"
                                class="peer input-anim"
                                id="mobile_no"
                                autocomplete="off"
                                />
                                <label
                                for="mobile_no"
                                class="absolute label-anim"
                                >Mobile no.
                                </label>
                            </div>
                    
                        <div v-if="form.errors.mobile_no" class="input-error mb-6">{{ form.errors.mobile_no }}</div>
                    <!-- Password input -->
                        <div class="relative mb-6" data-te-input-wrapper-init>
                            <input
                            v-model="form.password"
                            
                            :type="inputType"
                            
                            class="peer input-anim"
                            id="password"
                            placeholder="Password" />
                            <label
                            for="password"
                            class="absolute label-anim"
                            >Password 
                            </label>
                        </div>
                        <div v-if="form.errors.password" class="input-error mb-6">{{ form.errors.password }}</div>
                    <!-- confirm password input-->
                    <div class="relative mb-6" data-te-input-wrapper-init>
                            <input
                            v-model="form.password_confirmation"
                            
                            :type="inputType"
                            
                            class="peer input-anim"
                            id="password_confirm"
                            placeholder="Password" />
                            <label
                            for="password"
                            class="absolute label-anim"
                            >Confirm password
                            </label>
                        </div>
                    
                        <div class="mb-6 flex items-center justify-between">
                            <div class="mb-[0.125rem] block min-h-[1.5rem] ">
                                <input type="checkbox" value=""  id="showPass" class="mr-2" @change="toggleInput"> 
                                <label for="showPass">show password</label>
                            </div>

                            <!-- Forgot password link -->
                            <p
                            class="text-gray-600"
                            >Have an account? <Link :href="route('login')"><span class="cursor-pointer text-red-500 hover:text-red-300">Sign in</span></Link>
                            </p>
                        </div>

                    <!-- Submit button -->
                        <button :href="route('register.store')"
                            type="submit"
                            class="inline-block w-full rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            Sign up
                    </button>

                    <!-- Divider -->
                        <div
                            class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                            <p
                            class="mx-4 mb-0 text-center font-semibold dark:text-neutral-200">
                            OR
                            </p>
                        </div>

                    <!-- Social login buttons -->
                        <a
                            class="mb-3 flex w-full items-center justify-center rounded bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                            style="background-color: #3b5998"
                            href="#!"
                            role="button"
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            <!-- Facebook -->
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 h-3.5 w-3.5"
                            fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                            </svg>
                            Continue with Facebook
                        </a>
                        <a
                            class="mb-3 flex w-full items-center justify-center rounded bg-info px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)]"
                            style="background-color: #55acee"
                            href="#!"
                            role="button"
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            <!-- Twitter -->
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 h-3.5 w-3.5"
                            fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                            Continue with Twitter
                        </a>
                    </form>
                </div>
            </div>
        </div>
        </section>
    </div>
    
   
</template>

<script setup>
    import {Link, useForm} from '@inertiajs/vue3'
    import {ref} from 'vue'

    const inputType = ref('password')
    
    const toggleInput = () => {
        inputType.value = inputType.value === "password" ? "text" : "password"
        
    }

    

    
    const form = useForm({
        name:null,
        email: null,
        mobile_no:null,
        password: null,
        password_confirmation:null,
    })

    const register = () => form.post(route('register.store'));


</script>