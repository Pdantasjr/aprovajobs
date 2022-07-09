<template>
    <Head title="Dashboard"/>
    <AppLayout>
        <MainContent>
            <div class="flex items-center w-11/12 lg:w-full max-w-6xl h-auto mt-4 mx-auto">
                <Link :href="route('front.index')">
                    <AppIcons name="return"/>
                </Link>
                <AppTitle title="Acompanhamento de demandas"/>
            </div>
            <div class="flex items-center w-11/12 lg:w-full max-w-6xl h-auto mx-auto mt-6 mb-8">
                <div v-if="demands.length">
                    <AppInputSearch/>
                    <Link :href="route('demanda.create')"
                          class="flex justify-center items-center rounded-full mx-4 hover:cursor-pointer transition duration-200 ease-in-out">
                        <AppIcons name="hover-filter"/>
                    </Link>
                </div>
                <Link :href="route('demanda.create')"
                      class="bg-info w-full sm:w-auto sm:px-8 flex justify-center items-center h-12 py-1 ml-2 rounded-full hover:cursor-pointer transition hover:scale-105 duration-200 ease-in-out">
                    <AppIcons name="add"/>
                    <span class="mx-2 text-light flex-auto w-32">Nova demanda</span>
                </Link>

            </div>
            <div class="items-center w-11/12 lg:w-full max-w-6xl h-auto mx-auto">
                <div v-if="demands.length">
                    <div class="relative overflow-x-auto shadow-md rounded-2xl border border-line-border/30">
                        <table class="w-full text-sm rounded-2xl text-left text-light">
                            <thead class="text-xs text-light">
                                <tr>
                                <th scope="col" class="px-6 py-3">
                                    <span class="flex items-start text-sm font-semibold text-dark dark:text-light">Título</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="flex items-start text-sm font-semibold text-dark dark:text-light">Categoria</span>
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    <span class="flex items-start text-sm font-semibold text-dark dark:text-light">Prazo</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="flex items-start text-sm font-semibold text-dark dark:text-light">Status</span>
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    <Link :href="route('demanda.create')" class="flex items-start">
                                        <AppIcons name="hover-add"/>
                                    </Link>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y whitespace-nowrap rounded-lg">
                                <tr v-for="demand in demands" :key="demand.id"
                                class="border-y border-line-border/30">
                                <td>
                                    <div class="px-4 py-2">
                                        <span class="text-dark dark:text-light font-light">{{ demand.title }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="px-4 py-2">
                                        <span class="text-dark dark:text-light font-light">{{ demand.demand_category.name }}</span>
                                    </div>

                                </td>
                                <td>
                                    <div class="px-4 py-2">
                                        <span class="text-dark dark:text-light font-light">{{
                                                new Intl.DateTimeFormat('pt-BR', {
                                                    day: 'numeric',
                                                    month: 'numeric',
                                                    year: 'numeric'
                                                }).format(new Date(demand.deadline))
                                            }}</span>
                                    </div>
                                </td>
                                <td>
                                    <AppStatus :status="demand.status" />
                                </td>
                                <td>
                                    <div class="px-4 py-2">
                                        <span class="text-light font-light hover:cursor-pointer"><AppIcons name="hover-eye"/></span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div v-else>
                    <span class="text-dark/30 text-sm text-center">Não há demandas cadastradas.</span>
                </div>
            </div>
        </MainContent>
    </AppLayout>
</template>

<script>
import {defineComponent} from 'vue'

import {Head, Link} from '@inertiajs/inertia-vue3';
import AppIcons from "../../Components/icons/AppIcons";
import AppTitle from "../../Components/titles/AppTitle";
import AppButton from "../../Components/buttons/AppButton";
import AppLayout from "../../Layouts/AppLayout";
import MainContent from "../../Layouts/MainContent";
import AppStatus from "../../Components/status/AppStatus";
import AppInputSearch from "../../Components/inputs/AppInputSearch";

export default defineComponent({
    name: "Dashboard",
    props: {
        demands: Object,
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
