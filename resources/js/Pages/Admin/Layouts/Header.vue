<template>
    <div class=" flex items-center justify-center w-full h-40 dark:bg-dark bg-light border-b dark:border-line-border/30 border-line-border/30 ">
        <!--LOGOTIPO-->
        <Link  v-if="isDark" :href="route('front.index')">
            <img src="./Images/logotype/logotipo-aprova-jobs-dark-mode.svg"
                 alt="logotipo aprova jobs">
        </Link>

        <Link v-if="!isDark" :href="route('front.index')">
            <img src="./Images/logotype/logotipo-aprova-jobs-light-mode.svg"
                 alt="logotipo aprova jobs">
        </Link>

    </div>
</template>

<script>
import {defineComponent} from 'vue'
import {Head, Link} from "@inertiajs/inertia-vue3";

export default defineComponent({
    name: "Header Admin",
    components: {
        Head,
        Link,
    },
    data () {
        return {
            isDark: false,
        }
    }
})
</script>
