<template>
    <div class="flex justify-center items-center">
        <Link :href="route('front.index')">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-dark dark:text-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
            </svg>
        </Link>
        <h1 class="text-4xl text-dark dark:text-light font-semibold m-2">Login</h1>
    </div>
</template>

<script>
import {defineComponent} from 'vue'

import {Link} from '@inertiajs/inertia-vue3';
export default defineComponent({
    name: "AppTitle",
    components: {
        Link
    }
})
</script>

<style scoped>

</style>
