<template>
    <div>
        <div class="bg-white fixed top-0 w-full px-[320px]  left-[50%] translate-x-[-50%] z-[50] shadow-md">
            <nav
            class="flex-no-wrap relative flex w-100 items-center  justify-between bg-green-[#f7f7f7] py-4  shadow-black/5 dark:bg-gray-[#f7f7f7] dark:shadow-black/10 lg:flex-wrap lg:justify-start   top-0 z-50"
            data-te-navbar-ref>
                <div class="flex w-full flex-wrap items-center justify-between px-2 ">
                    <div
                    class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto space-x-4"
                    id="navbarSupportedContent1"
                    data-te-collapse-item>
                    
                    <a
                        class="mt-2 mr-2 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mt-0"
                        href="#">
                        <!-- <img :src="'images/webPage/logo1.png'" class="w-14 h-14"/> -->
                        <h1 class="text-3xl font-semibold primary-text-black">BINHS</h1>
                        
                    </a>
                    
                    <!-- Left links -->
                    <ul
                        class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row space-x-4"
                        data-te-navbar-nav-ref>
                        <li class="lg:pr-2" data-te-nav-item-ref>
                        <a
                            class="nav"
                            href="#"
                            data-te-nav-link-ref
                            >Home</a
                        >
                        
                        <!--class="primary-text-black  hover:text-gray-600  focus:text-gray-400  focus:border-bot-only-focus "-->
                        </li>
                        <li class="lg:pr-2" data-te-nav-item-ref>
                        <a
                        class="nav"   
                        href="#"
                        data-te-nav-link-ref
                            >About</a
                        >
                        
                        </li>
                        
                        <li class="lg:pr-2" data-te-nav-item-ref>
                        <a
                            class="nav"  
                            href="#"
                            data-te-nav-link-ref
                            >Contact</a
                        >
                        </li>
                        <li class="lg:pr-2" data-te-nav-item-ref>
                        <a
                            class="nav"      
                            href="#testimonials"
                            data-te-nav-link-ref
                            >Events</a
                        >
                        </li>
                        <li class="lg:pr-2" data-te-nav-item-ref>
                        <a
                            class="nav"   
                            href="#testimonials"
                            data-te-nav-link-ref
                            >Downloads</a
                        >
                        </li>
                       
                        <li class="lg:pr-2" data-te-nav-item-ref>
                        <a
                            class="nav"  href="#testimonials"
                            data-te-nav-link-ref
                            >News</a
                        >
                        </li>
                        <!--Strands menu-->
                        <div  class="relative" data-te-dropdown-ref>
                        <a
                        class="hidden-arrow mr-4 flex items-center text-neutral-500 hover:text-neutral-700 focus:text-gray-400 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                        href="#"
                        id="dropdownMenuButton1"
                        role="button"
                        data-te-dropdown-toggle-ref
                        aria-expanded="false">
                            <a class="nav">Strands</a>
                            <span class="ml-2 w-2 primary-text-black  hover:text-gray-600  focus:text-gray-500">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                class="h-5 w-5">
                                <path
                                    fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                        
                        <ul
                        class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                        aria-labelledby="dropdownMenuButton1"
                        data-te-dropdown-menu-ref>
                        <li>
                            <a
                            class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                            :href="route('strand.showHE')"
                            data-te-dropdown-item-ref
                            >Home Economics</a
                            >
                        </li>
                        <li>
                            <a
                            class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                            :href="route('strand.showICT')"
                            data-te-dropdown-item-ref
                            >ICT</a
                            >
                        </li>
                        <li>
                            <a
                            class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                            :href="route('strand.showIA')"
                            data-te-dropdown-item-ref
                            >Industrial Arts</a
                            >
                        </li>
                        <li>
                            <a
                            class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                            :href="route('strand.showSMAW')"
                            data-te-dropdown-item-ref
                            >SMAW</a
                            >
                        </li>
                        </ul>
                        </div>
                        
                        <li v-if="currentUser" class="lg:pr-2" data-te-nav-item-ref >
                            <div v-if="currentUser.role === 'student'">
                                <a
                                class="nav"   
                                :href="route('studentExamination.show')"
                                data-te-nav-link-ref
                                >Studen Portal</a
                            >
                            </div>
                        </li>
                        <!-- login modal-->
                        
                        <!-- login modal-->

                    </ul>
                    
                    <!-- Left links -->
                    </div>
                
                
                    <!-- Collapsible wrapper -->

                    <!-- Right elements -->
                    
                    <div class="relative flex items-justify md:items-center flex-col md:flex-row space-x-4">
                    
                    <div v-if="currentUser" class="lg:pr-2" data-te-nav-item-ref>
                        <a
                            v-if="currentUser.role==='admin'"
                            class="primary-text-black  hover:text-gray-600  focus:text-gray-400 focus:border-bot-only-focus"
                            :href="route('admin.showAdminPanel')"
                            data-te-nav-link-ref
                            >Dashboard</a
                        >
                    </div>
                    <p   v-if="currentUser" class="primary-text-black">Welcome Back <span class="primary-text-black text-lg">{{ currentUser.name }}</span> </p>
                    <a
                    v-else
                        class="primary-text-black  hover:text-gray-600  focus:text-gray-400 hover:scale-110 "
                        :href="route('login')"
                        data-te-nav-link-ref
                        >Sign In</a
                    > 
                  
                        
                    <!--bell icon-->
                    
                    <!--User Icon-->
                    <div v-if="currentUser" class="relative" data-te-dropdown-ref>
                        <a
                        class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none"
                        href="#"
                        id="dropdownMenuButton2"
                        role="button"
                        data-te-dropdown-toggle-ref
                        aria-expanded="false">
                        <img
                            src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg"
                            class="rounded-full"
                            style="height: 25px; width: 25px"
                            alt=""
                            loading="lazy" />
                        </a>
                        <ul
                        class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                        aria-labelledby="dropdownMenuButton2"
                        data-te-dropdown-menu-ref>
                        <li>
                            <a
                            class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                            href="#"
                            data-te-dropdown-item-ref
                            >Action</a
                            >
                        </li>
                        <li>
                            <a
                            class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                            href="#"
                            data-te-dropdown-item-ref
                            >Another action</a
                            >
                        </li>
                        <li>
                            <Link
                            class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30 text-justify"
                            href="http://127.0.0.1:8000/logout"
                            data-te-dropdown-item-ref
                            method="delete"
                            as="button"
                            >Logout</Link
                            >
                        </li>
                        </ul>
                    </div>
                    </div>
                   
                    <!-- Right elements -->
                </div>
        
            </nav>
            
        </div>
        
    </div>

        
        

        
    

   
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    currentUser:Object
})


</script>