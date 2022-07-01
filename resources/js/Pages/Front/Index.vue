<template>
    <div class="flex flex-col w-screen h-auto">
        <!--LOGOTIPO-->
        <div class="flex items-center justify-center w-11/12 w-max-7xl mx-auto h-auto mt-32 mb-32">
            <img :src="logotypeMode" alt="logotipo AprovaJobs">
        </div>

        <div class="flex flex-col items-center w-11/12 mx-auto">
            <AppButton>Fazer login</AppButton>
            <Link href="#" class="text-dark/30 dark:text-light/30 my-4 hover:underline dark:hover:text-light hover:text-dark transition-all duration-200 ease-in-out">Cadastrar-se</Link>
        </div>
    </div>
</template>

<script>
import {defineComponent} from 'vue'

import {Link} from '@inertiajs/inertia-vue3';
import AppButton from "./Components/buttons/AppButton";

export default defineComponent({
    name: "Front",
    props: {},
    components: {
        Link,
        AppButton,
    },
    data () {
        return {
            darkMode: '',
            logotypeLight: './Images/logotype/logotipo-aprova-jobs-light-mode.svg',
            logotypeDark: './Images/logotype/logotipo-aprova-jobs-dark-mode.svg',
        }
    },
    computed: {
        logotypeMode() {
            return [
                this.getLogoDarkMode
            ]
        },
        getLogoDarkMode() {
            return this.darkMode ? this.logotypeDark : this.logotypeLight
        }
    },
    mounted() {
        this.darkMode = window.matchMedia('(prefers-color-scheme: dark)').matches
        console.log(this.darkMode)
    }
})

</script>
