<template>
    <div class="grid grid-cols-2 gap-3">
        <!--About-->
        <div >
            <WebCard :cardContent="cardContent.about" />
        </div>
        <!--contact us-->
        <div>
            <WebCard :cardContent="cardContent.contactUs" />
        </div>

        
        
    </div>

</template>

<script setup>
import WebCard from './WebCard.vue'

defineProps({
    cardContent: Object
})
</script>