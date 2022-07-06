<template>
    <Head title="Home" />
    <AppLayout>
        <MainContent>
            <div class="flex flex-col mim-w-screen h-full">
                <div class="flex flex-col items-center w-11/12 mx-auto">
                    <Link :href="route('login')"
                          class="bg-primary w-full flex justify-center items-center sm:w-48 h-12 py-1 px-2 m-2 rounded-full hover:cursor-pointer transition hover:scale-105 duration-200 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-light" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        <span class="mx-2 text-light">Fazer login</span>
                    </Link>
                    <Link :href="route('register')"
                          class="text-dark/30 dark:text-light/30 my-4 hover:underline dark:hover:text-light hover:text-dark transition-all duration-200 ease-in-out">
                        Cadastrar-se
                    </Link>
                </div>
            </div>
        </MainContent>
    </AppLayout>
</template>

<script>
import {defineComponent} from 'vue'

import {Head, Link} from '@inertiajs/inertia-vue3';
import AppLayout from "../../Layouts/AppLayout";
import MainContent from "../../Layouts/MainContent";
import AppButton from "../../Components/buttons/AppButton";
import AppIcons from "../../Components/icons/AppIcons";

export default defineComponent({
    name: "Front",
    components: {
        AppLayout,
        MainContent,
        Head,
        Link,
        AppButton,
        AppIcons,
    }
})
</script>
