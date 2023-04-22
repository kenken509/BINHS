<template>
    <nav aria-label="Page navigation example">
  <ul class="list-style-none flex">
    <li v-for="(link,index) in links" :key="index">
        
        
        
        <Link
        :href="link.url === null ? '#' : link.url"
        class="cursor-pointer relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-500 transition-all duration-300 dark:text-gray-700"
        :class="{'bg-green-800 dark:text-gray-100':link.active}"
        v-html="link.label"
        >
        </Link>
    </li>
  </ul>
</nav>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
defineProps({
    links: Array,
})

</script>