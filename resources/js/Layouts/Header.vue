<template>
    <div class="flex items-center justify-center w-full h-40 dark:bg-dark bg-light border-b dark:border-line-border/30 border-line-border/30 ">
        <!--LOGOTIPO-->
        <Link :href="route('front.index')">
            <img v-if="this.darkMode" src="./Images/logotype/logotipo-aprova-jobs-dark-mode.svg"
                 alt="logotipo aprova jobs">
            <img v-if="!this.darkMode" src="./Images/logotype/logotipo-aprova-jobs-light-mode.svg"
                 alt="logotipo aprova jobs">
        </Link>
    </div>
    <ToggleDarkMode />
</template>

<script>
import {defineComponent} from 'vue'
import {Head, Link} from "@inertiajs/inertia-vue3";
import ToggleDarkMode from "../Components/buttons/ToggleDarkMode";
export default defineComponent({
    name: "Header",
    components: {
        Head,
        Link,
        ToggleDarkMode,
    },
    data () {
        return {
            darkMode: window.matchMedia('(prefers-color-scheme: dark)').matches,
        }
    }
})
</script>
