<template>
    <div class="flex fixed bg-dark sticky bottom-0 items-center mt-6 dark:bg-dark bg-light justify-center w-full h-auto border-t dark:border-line-border/30 border-line-border/30">
        <span class="dark:text-light/30 text-dark/30 text-xs my-4">&copy; Aprova Jobs</span>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import {Link} from "@inertiajs/inertia-vue3";

export default defineComponent({
    name: "Footer",
    components: {
        Link,
    }
})
</script>
