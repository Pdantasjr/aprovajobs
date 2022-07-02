<template>
    <Header />
    <div class="flex w-11/12 sm:w-screen max-w-4xl h-auto mt-48 mx-auto">
        <AppTitle />
    </div>
    <div class="flex justify-center flex-col w-11/12 sm:w-screen max-w-4xl h-auto mx-auto">
        <AppInput />
        <AppInput />
        <AppInput />
        <AppInput />
    </div>
    <div class="flex flex-col sm:flex-row items-center justify-end w-11/12 sm:w-screen max-w-4xl h-auto mx-auto my-12">
        <Link :href="route('register')" class="sm:order-first order-last text-dark/30 dark:text-light/30 m-4 hover:underline dark:hover:text-light hover:text-dark transition-all duration-200 ease-in-out">Já tenho uma conta</Link>
        <AppButton :href="route('login')">
            <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 9L9 5M9 5L13 9M9 5L9 14M5 14L4 14C3.20435 14 2.44129 13.6839 1.87868 13.1213C1.31607 12.5587 1 11.7956 1 11L1 4C1 3.20435 1.31607 2.44129 1.87868 1.87868C2.44129 1.31607 3.20435 0.999999 4 0.999999L14 1C14.7956 1 15.5587 1.31607 16.1213 1.87868C16.6839 2.44129 17 3.20435 17 4L17 11C17 11.7956 16.6839 12.5587 16.1213 13.1213C15.5587 13.6839 14.7956 14 14 14L13 14" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="mx-2">Registrar</span>
        </AppButton>
    </div>
</template>

<script>
import {defineComponent} from 'vue'

import {Link, Head} from '@inertiajs/inertia-vue3';
import Header from "./Components/Header";
import AppTitle from "./Components/titles/AppTitle";
import AppInput from "./Components/inputs/AppInput";
import AppButton from "./Components/buttons/AppButton";

export default defineComponent({
    name: "Register",
    props: {
        storageUrl: String,
    },
    components: {
        Link,
        Head,
        Header,
        AppTitle,
        AppInput,
        AppButton,
    },
    data () {
        return {
            darkMode: window.matchMedia('(prefers-color-scheme: dark)').matches,
        }
    },
})

</script>
