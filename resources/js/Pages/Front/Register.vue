<template>
    <Header />
    <div class="flex items-center w-11/12 sm:w-screen max-w-4xl h-auto mt-48 mx-auto">
        <Link :href="route('front.index')">
            <AppIcons name="return" />
        </Link>
        <AppTitle title="Cadastro" />
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
            <AppIcons name="enter" />
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
import AppIcons from "./Components/icons/AppIcons";

export default defineComponent({
    name: "Register",
    props: {
        storageUrl: String,
    },
    components: {
        AppIcons,
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
