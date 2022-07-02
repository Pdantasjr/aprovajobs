<template>
    <div class="flex justify-center items-center">
        <h1 class="text-2xl sm:text-4xl text-dark dark:text-light font-semibold m-2">{{ title }}</h1>
    </div>
</template>

<script>
import {defineComponent} from 'vue'

import {Link} from '@inertiajs/inertia-vue3';
export default defineComponent({
    name: "AppTitle",
    props: {
        title: String,
    },
    components: {
        Link
    }
})
</script>

<style scoped>

</style>
