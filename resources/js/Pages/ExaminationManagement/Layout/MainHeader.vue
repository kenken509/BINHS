<template>
    <div class="flex bg-gray-800  justify-between w-full">
        <div class="flex items-center ml-6">
            <!-- <i class="pi pi-bars text-gray-200 hover:text-gray-100 hover:scale-110 "></i> -->
            
        </div>
        <div class="p-2">
            <span class="p-input-icon-left">
                <i class="pi pi-search" />
                <InputText v-model="value1" placeholder="Search" />
            </span>
        </div>
        <div class="flex items-center space-x-3 px-3">
            
            <div class="text-md">Admin</div>
            
            <!--Avatar-->
            <div class="relative" data-te-dropdown-ref>
                <!-- Second dropdown trigger -->
                <a
                class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none"
                href="#"
                id="dropdownMenuButton2"
                role="button"
                data-te-dropdown-toggle-ref
                aria-expanded="false">
                <!-- User avatar -->
                <img
                    src="../../../../../public/images/webPage/aries1.jpg"
                    class="rounded-full"
                    style="height: 40px; width: 40px"
                    alt="error"
                    loading="lazy" />
                </a>
                <!-- Second dropdown menu -->
                <ul
                class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                aria-labelledby="dropdownMenuButton2"
                data-te-dropdown-menu-ref>
                <!-- Second dropdown menu items -->
                <li>
                    <a
                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                    href="#"
                    data-te-dropdown-item-ref
                    >Action</a
                    >
                </li>
                <li>
                    <a
                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                    href="#"
                    data-te-dropdown-item-ref
                    >Another action</a
                    >
                </li>
                <li>
                    <a
                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                    href="#"
                    data-te-dropdown-item-ref
                    >Something else here</a
                    >
                </li>
                </ul>
            </div>
            <!--Avatar-->
        </div>
    </div>
</template>

<script setup>
import {useForm} from '@inertiajs/vue3'
import {ref} from 'vue'


const value1 = ref("") 

const form = useForm({
    search: value1.value
})



    

</script>