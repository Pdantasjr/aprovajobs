<template>
    <aside :class="toggleWidth"
           class="flex flex-col h-screen w-72 absolute top-0 left-0 z-10 dark:bg-dark2 bg-light2 overflow-hidden transition-all duration-300 bg-white rounded-r-2xl">

        <header v-if="!sidebarIsActive" class="p-4 w-full h-36 flex items-center justify-end mt-4 mx-auto">
            <div class="w-full h-auto block">
                <transition>
                    <img v-if="!sidebarIsActive" class="ml-4 h-8 w-auto"
                         src="./Images/logotype/logotipo-horizontal-aprova-jobs-light-mode.svg.svg" alt="Logotipo">
                </transition>
            </div>
            <div @click="sidebarIsActive = !sidebarIsActive"
                 class="flex items-center p-2 rounded-lg font-medium transition duration-300 hover:cursor-pointer hover:bg-light hover:dark:bg-dark focus:bg-light/5">
                <AppIcons name="sidebar-collapse"/>
            </div>
        </header>

            <nav v-if="!sidebarIsActive" class="flex-1 overflow-y-auto py-2">
            <transition name="slide-fade">
                <div class="flex items-center justify-center my-4">
                    <button
                        class="bg-primary w-auto w-10/12 flex justify-center mx-2 items-center h-12 rounded-full hover:cursor-pointer transition duration-200 ease-in-out hover:scale-105">
                        <AppIcons name="sidebar-add"/>
                        <span class="block mx-2 text-light">Adicionar Job</span>
                    </button>
                </div>
            </transition>
            <ul class="space-y-6 px-6 w-full mt-14">
                <li>
                    <ul class="text-sm space-y-4 -mx-3 mt-2">
                        <li>
                            <Link
                                class="flex items-center gap-3 px-3 py-4 rounded-lg font-medium transition duration-300 hover:bg-light hover:dark:bg-dark focus:bg-light/5">
                                <AppIcons name="sidebar-clipboard"/>
                                <span class="text-dark dark:text-light block text-sm">Dashboard</span>
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('categories.index')"
                                class="flex items-center gap-3 px-3 py-4 rounded-lg font-medium transition duration-300 hover:bg-light hover:dark:bg-dark focus:bg-light/5">
                                <AppIcons name="sidebar-edit"/>
                                <span class="text-dark dark:text-light block text-sm">Categorias</span>
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
                            <Link
                                class="flex items-center gap-3 px-3 py-4 rounded-lg font-medium transition duration-300 hover:bg-light hover:dark:bg-dark focus:bg-light/5">
                                <AppIcons name="sidebar-config"/>
                                <span class="text-dark dark:text-light block text-sm">Configurações</span>
                            </Link>
                        </li>
                        <li>
                            <button @click="toggleTheme"
                                    class="flex items-center w-full gap-3 px-3 py-2 rounded-lg font-medium group hover:bg-light hover:dark:bg-dark">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-7 w-7 dark:text-light/30 text-dark/30 group-hover:dark:text-light group-hover:text-dark transition duration-300 ease-in-out"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                <span class="dark:text-light/30 text-dark/30 group-hover:dark:text-light group-hover:text-dark transition duration-300 ease-in-out block">Mudar tema</span>
                            </button>
                        </li>
                        <li>
                            <button class="flex items-center w-full gap-3 px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light hover:dark:bg-dark focus:bg-light/5">
                                <AppIcons name="sidebar-logout"/>
                                <span class="text-danger block">Sair</span>
                            </button>
                        </li>
                    </ul>
                </li>
            </ul>
        </footer>

        <header v-if="sidebarIsActive" class="w-full h-36 flex items-center justify-center mt-4 mx-auto">
            <div @click="sidebarIsActive = !sidebarIsActive"
                 class="flex items-center p-2 rounded-lg font-medium transition duration-300 hover:cursor-pointer hover:bg-light hover:dark:bg-dark focus:bg-light/5">
                <AppIcons v-if="sidebarIsActive" name="sidebar-burger"/>
            </div>
        </header>
        <nav v-if="sidebarIsActive" class="flex-1 overflow-y-auto py-2">
            <div class="flex items-center justify-center my-4">
                <button
                    class="bg-primary w-12 flex justify-center mx-2 items-center h-12 rounded-full hover:cursor-pointer transition duration-200 ease-in-out hover:scale-105">
                    <AppIcons name="sidebar-add"/>
                </button>
            </div>
            <ul class="space-y-6 px-6 w-full mt-14">
                <li>
                    <ul class="text-sm space-y-4 mt-2">
                        <li>
                            <Link
                                class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light hover:dark:bg-dark focus:bg-light/5">
                                <AppIcons name="sidebar-clipboard"/>
                            </Link>
                        </li>
                        <li>
                            <Link
                                class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light hover:dark:bg-dark focus:bg-light/5">
                                <AppIcons name="sidebar-edit"/>
                            </Link>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <footer v-if="sidebarIsActive" class="py-3 flex flex-col items-center w-full">
            <ul class="space-y-1 mt-2 flex flex-col justify-center items-center mt-2">
                <li>
                    <Link
                        class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light hover:dark:bg-dark focus:bg-light/5">
                        <AppIcons name="sidebar-config"/>
                    </Link>
                </li>
                <li>
                    <button @click="toggleTheme"
                            class="flex items-center w-full gap-3 px-3 py-2 rounded-lg font-medium group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-7 w-7 dark:text-light/30 text-dark/30 group-hover:dark:text-light group-hover:text-dark transition duration-300 ease-in-out"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </button>
                </li>
                <li>
                    <button
                        @click="logout"
                        class="flex items-center w-full gap-3 px-3 py-2 rounded-lg font-medium transition duration-300 hover:bg-light hover:dark:bg-dark focus:bg-light/5">
                        <AppIcons name="sidebar-logout"/>
                    </button>
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
    data() {
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
<style scoped>
.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(20px);
    opacity: 0;
}
</style>
