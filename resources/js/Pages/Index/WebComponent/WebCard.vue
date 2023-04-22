<template>
    <div>
        <div
            class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] ">
            <a href="#!">
                <img
                class="rounded-t-lg h-52  w-full "
                :src=cardContent.imageSrc 
                alt="error" />
            </a>
            <div class="flex flex-col justify-center p-6 text-center">
                <!-- <h5
                class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                Card title
                </h5> -->
                <div class="h-52 max-h-40">
                    <p class="mb-4 text-base primary-text-black  ">
                        {{ cardContent.content }}
                    </p>
                </div>
               
                <button
                type="button"
                class="inline-block rounded-md bg-[#083b22] px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-gray-200 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-green-700 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                data-te-ripple-init
                data-te-ripple-color="light">
                {{ cardContent.buttnTitle }}
                </button>
            </div>
        </div>
    </div>

</template>

<script setup>

defineProps({
    cardContent:Object,

})


</script>