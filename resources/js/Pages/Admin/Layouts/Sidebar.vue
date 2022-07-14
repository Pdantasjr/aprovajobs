<template>
    <div v-if="!sidebarIsActive" class="absolute h-screen z-10 inset-0 bg-dark2 bg-opacity-25 backdrop-blur-[5px]"></div>
    <aside :class="toggleWidth" class="flex flex-col h-screen absolute top-0 left-0 z-10 w-48 bg-dark2 overflow-hidden shadow-2xl transition-all duration-300 bg-white w-2/12 rounded-r-2xl shadow-lg">
        <header v-if="!sidebarIsActive" class="p-3 w-full h-20 flex items-center justify-end mt-4">
            <div>
                <img src="./Images/logotype/logotipo-aprova-jobs-dark-mode.svg" alt="">
            </div>
                <div @click="sidebarIsActive = !sidebarIsActive" class="flex items-center p-2 rounded-lg font-medium transition duration-300 hover:cursor-pointer hover:bg-light/5 focus:bg-light/5">
                    <AppIcons v-if="!sidebarIsActive" name="sidebar-collapse" />
                </div>
        </header>
        <nav v-if="!sidebarIsActive" class="flex-1 overflow-y-auto py-2">

                <button class="bg-info w-auto w-11/12 flex justify-center mx-2 items-center h-12 rounded-full hover:cursor-pointer transition duration-200 ease-in-out">
                    <AppIcons name="add" />
                    <span class="block mx-2 text-light">Adicionar Job</span>
                </button>

            <ul class="space-y-6 px-6 w-full">
                <li>
                    <ul class="text-sm space-y-1 -mx-3 mt-2">
                        <li>
                            <Link
                                class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light/5 focus:bg-light/5">
                                <AppIcons name="config"/>
                                <span class="text-dark dark:text-light text-sm">Configurações</span>
                                <span></span>
                            </Link>
                        </li>
                        <li>
                            <Link
                                class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light/5 focus:bg-light/5">
                                <AppIcons name="edit"/>
                                <span class="text-dark dark:text-light text-sm">Categorias</span>
                            </Link>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <footer v-if="!sidebarIsActive" class="py-3 flex flex-col items-start w-full">
            <ul class="space-y-6 px-6 w-full">
                <li>
                    <ul class="text-sm space-y-1 -mx-3 mt-2">
                        <li>
                            <button @click="toggleTheme" class="flex items-center w-full gap-3 px-3 py-2 rounded-lg font-medium group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:text-light/30 group-hover:dark:text-light transition duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                <span v-if="!sidebarIsActive" class="dark:text-light/30 group-hover:dark:text-light transition duration-300 ease-in-out">Mudar tema</span>
                            </button>
                        </li>
                        <li>
                            <button class="flex items-center w-full gap-3 px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light/5 focus:bg-light/5">
                                <AppIcons name="logout-red"/>
                                <span v-if="!sidebarIsActive" class="text-danger">Sair</span>
                            </button>
                        </li>
                    </ul>
                </li>
            </ul>
        </footer>

        <header v-if="sidebarIsActive" class="p-3 w-full flex items-center mt-4">

                <div @click="sidebarIsActive = !sidebarIsActive" class="p-2 w-full flex justify-center items-center rounded-lg transition duration-300 hover:cursor-pointer hover:bg-light/5 focus:bg-light/5">
                    <AppIcons v-if="sidebarIsActive" name="burger" />
                </div>

        </header>
        <nav v-if="sidebarIsActive" class="flex-1 overflow-y-auto py-2">
            <div class="flex items-center justify-center">
                <button class="bg-info w-12 h-12 flex justify-center mx-2 items-center h-12 rounded-full hover:cursor-pointer transition duration-200 ease-in-out">
                    <AppIcons name="add" />
                </button>
            </div>
            <ul class="space-y-6 px-6 w-full">
                <li>
                    <ul class="text-sm space-y-1 mt-2">
                        <li>
                            <Link
                                class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light/5 focus:bg-light/5">
                                <AppIcons name="config"/>
                            </Link>
                        </li>
                        <li>
                            <Link
                                class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light/5 focus:bg-light/5">
                                <AppIcons name="edit"/>
                            </Link>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <footer v-if="sidebarIsActive" class="py-3 flex flex-col items-start w-full">
            <ul class="space-y-6 px-6 w-full">
                <li>
                    <ul class="text-sm space-y-1 mt-2">
                        <li>
                            <button @click="toggleTheme" class="flex items-center w-full gap-3 px-3 py-2 rounded-lg font-medium group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:text-light/30 group-hover:dark:text-light transition duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                            </button>
                        </li>
                        <li>
                            <button class="flex items-center w-full gap-3 px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light/5 focus:bg-light/5">
                                <AppIcons name="logout-red"/>
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
import AppIcons from "../../../Components/icons/AppIcons";
import AppButton from "../../../Components/buttons/AppButton";
import Button from "../../../Jetstream/Button";
export default defineComponent({
    name: 'siderbar',
    components: {
        Button,
        AppIcons,
        AppButton,
        Head,
        Link,
    },
    data () {
        return {
            sidebarIsActive: false,
        }
    },
    computed: {
        toggleWidth() {
           return this.sidebarIsActive = this.sidebarIsActive ? 'w-24 items-center' : ''

        }
    },
    methods: {
        logout() {
            this.$inertia.post(route('logout'));
        },
        toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('translate-x-full')
        },
        toggleTheme() {
            console.log('mudar tema')
        }
    }
})
</script>
<style>
</style>
