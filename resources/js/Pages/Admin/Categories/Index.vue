<template>
    <Head title="Cadegotias"/>
    <AppLayout>
        <MainContent>
            <div class="flex items-center w-11/12 lg:w-full max-w-6xl h-auto mt-4 mx-auto">
                <Link :href="route('front.index')">
                    <AppIcons name="return"/>
                </Link>
                <AppTitle title="Categorias"/>
            </div>
            <div class="flex items-center w-11/12 lg:w-full max-w-6xl h-auto mx-auto mt-6 mb-8">
                <AppInputSearch v-if="categories.length"/>
                <Link :href="route('admin.categories.create')"
                      v-if="categories.length"
                      class="flex justify-center items-center rounded-full mx-4 hover:cursor-pointer transition duration-200 ease-in-out">
                    <AppIcons name="hover-filter"/>
                </Link>
                <Link :href="route('admin.categories.create')"
                      class="bg-info w-full sm:w-auto sm:px-8 flex justify-center items-center h-12 py-1 ml-2 rounded-full hover:cursor-pointer transition hover:scale-105 duration-200 ease-in-out">
                    <AppIcons name="add"/>
                    <span class="mx-2 text-light flex-auto w-32">Nova Categoria</span>
                </Link>
            </div>
            <div class="items-center w-11/12 lg:w-full max-w-6xl h-auto mx-auto">
                <div v-if="categories.length">
                    <div class="relative overflow-x-auto shadow-md rounded-2xl border border-line-border/30">
                        <table class="w-full text-sm rounded-2xl text-left text-light">
                            <thead class="text-xs text-light">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="flex items-start text-sm font-semibold text-dark dark:text-light">Nome</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="flex items-start text-sm font-semibold text-dark dark:text-light">slug</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="flex items-start text-sm font-semibold text-dark dark:text-light">Ações</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y whitespace-nowrap rounded-lg">
                            <tr v-for="category in categories" :key="category.id"
                                class="border-y border-line-border/30">
                                <td>
                                    <div class="px-4 py-2">
                                        <span class="text-dark dark:text-light font-light">{{ category.name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="px-4 py-2">
                                        <span class="text-dark dark:text-light font-light">{{ category.slug }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="px-4 py-2">
                                        <span class="text-dark dark:text-light font-light"></span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div v-else>
                    <span class="text-dark/30 text-sm text-center">Não há categorias cadastradas.</span>
                </div>
            </div>
        </MainContent>
    </AppLayout>
</template>

<script>
import {defineComponent} from 'vue'

import {Head, Link} from '@inertiajs/inertia-vue3';
import AppIcons from "../../../Components/icons/AppIcons";
import AppTitle from "../../../Components/titles/AppTitle";
import AppButton from "../../../Components/buttons/AppButton";
import AppLayout from ".././Layouts/AppLayout";
import MainContent from ".././Layouts/MainContent";
import AppStatus from "../../../Components/status/AppStatus";
import AppInputSearch from "../../../Components/inputs/AppInputSearch";

export default defineComponent({
    name: "Categories",
    props: {
        categories: Object,
    },
    components: {
        AppInputSearch,
        AppStatus,
        Link,
        Head,
        AppLayout,
        MainContent,
        AppIcons,
        AppTitle,
        AppButton,
    },
    data() {
        return {}
    },
    methods: {
        logout() {
            this.$inertia.post(route('logout'));
        },
    }
})
</script>
