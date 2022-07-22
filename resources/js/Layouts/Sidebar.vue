<template>
    <div class="absolute h-screen z-10 inset-0 bg-dark2 bg-opacity-25 backdrop-blur-[5px]"></div>
    <aside
        class="flex flex-col h-screen absolute top-0 left-0 z-10 w-64 bg-dark2 overflow-hidden shadow-2xl transition duration-300 bg-white w-2/12 rounded-r-2xl shadow-lg">
        <header class="p-3 w-full h-20 flex items-center justify-end mt-4">
            <ul>
                <li class="flex items-center p-2 rounded-lg font-medium transition duration-300 hover:cursor-pointer hover:bg-light/5 focus:bg-light/5">
                    <AppIcons name="sidebar-collapse" />
                </li>
            </ul>
        </header>
        <nav class="flex-1 overflow-y-auto py-2">
            <ul class="space-y-6 px-6">
                <li>
                    <ul class="text-sm space-y-1 -mx-3">
                        <li>
                            <div
                                class="flex items-center px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light/5 focus:bg-light/5">
                                <div>
                                    <img class="w-10 h-auto" src="./Images/avatar/avatar_default.svg"
                                         alt="Imagem do avatar">
                                </div>
                                <div class="ml-2 flex flex-col items-start">
                                    <Link class="">
                                        <span class="text-dark dark:text-light text-[12pt]">
                                            Bem vindo, {{ this.$attrs.user.name }}
                                        </span>
                                    </Link>
                                    <Link>
                                        <span class="text-dark dark:text-light/30 text-[9pt] hover:underline">
                                            Editar perfil
                                        </span>
                                    </Link>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="text-sm space-y-1 -mx-3 mt-2">
                        <li>
                            <Link :href="route('admin.jobs.dashboard')"
                                class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light/5 focus:bg-light/5">
                                <AppIcons name="config"/>
                                <span class="text-dark dark:text-light text-sm">Configurações</span>
                                <span></span>
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('admin.categories.create')"
                                class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light/5 focus:bg-light/5">
                                <AppIcons name="edit"/>
                                <span class="text-dark dark:text-light text-sm">Categorias</span>
                            </Link>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <footer class="py-3 flex flex-col items-start w-full">
            <ul class="space-y-6 px-6 w-full">
                <li>
                    <ul class="text-sm space-y-1 -mx-3 mt-2">
                        <li>
                            <button @click="toggleTheme" class="flex items-center w-full gap-3 px-3 py-2 rounded-lg font-medium group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:text-light/30 group-hover:dark:text-light transition duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                <span class="dark:text-light/30 group-hover:dark:text-light transition duration-300 ease-in-out">Mudar tema</span>
                            </button>
                        </li>
                        <li>
                            <button class="flex items-center w-full gap-3 px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light/5 focus:bg-light/5">
                                <AppIcons name="logout-red"/>
                                <span class="text-danger">Sair</span>
                            </button>
                        </li>
                    </ul>
                </li>
            </ul>
        </footer>
    </aside>
</template>

<script>
import {defineComponent} from 'vue'
import {Head, Link} from '@inertiajs/inertia-vue3';
import Logotype from '@/Jetstream/ApplicationLogo'
import AppIcons from "../Components/icons/AppIcons";
import Button from "../Jetstream/Button";

export default defineComponent({
    name: 'siderbar',
    components: {
        Button,
        AppIcons,
        Logotype,
        Head,
        Link,
    },
    methods: {
        logout() {
            this.$inertia.post(route('logout'));
        },
        toggleTheme() {
            console.log('mudar tema')
        }
    }
})
</script>
