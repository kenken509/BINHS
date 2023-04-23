<template>
   
  
    <div v-for="(link,index) in links" :key="index" class="flex gap-1">
        <Link
        :href="link.url === null ? '#' : link.url"
        class="cursor-pointer px-3 "
        :class="{'bg-green-800 dark:text-gray-100 rounded':link.active}"
        v-html="link.label"
        >
        </Link>
    </div>

</template>

<script setup>
import {Link} from '@inertiajs/vue3'
defineProps({
    links: Array,
})

</script>