<template>
    <Head title="Dashboard"/>
    <AppLayout>
        <MainContent>
            <div class="flex items-center w-11/12 lg:w-full max-w-4xl h-auto mx-auto">
                <Link :href="route('front.index')">
                    <AppIcons name="return"/>
                </Link>
                <AppTitle title="Acompanhamento de demandas"/>
            </div>
            <div class="flex items-center w-11/12 lg:w-full max-w-4xl h-auto mx-auto">
                <Link :href="route('demanda.create')"
                      class="bg-info w-full sm:w-auto sm:px-8 flex justify-center items-center h-12 py-1 px-2 m-2 rounded-full hover:cursor-pointer transition hover:scale-105 duration-200 ease-in-out">
                    <AppIcons name="add"/>
                    <span class="mx-2 text-light">Nova demanda</span>
                </Link>
                <AppInput/>
            </div>
            <div class="items-center w-11/12 lg:w-full max-w-4xl h-auto mx-auto">
                <div class="relative overflow-x-auto shadow-md rounded-2xl border border-line-border">
                    <table class="w-full text-sm rounded-2xl text-left text-light">
                        <thead class="text-xs text-light bg-white/10">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <span class="flex items-start text-sm font-semibold text-light">Título</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="flex items-start text-sm font-semibold text-light">Categoria</span>
                            </th>

                            <th scope="col" class="px-6 py-3">
                                <span class="flex items-start text-sm font-semibold text-light">Prazo</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="flex items-start text-sm font-semibold text-light">Status</span>
                            </th>

                            <th scope="col" class="px-6 py-3">
                                <span class="flex items-start text-sm font-semibold text-light"></span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y whitespace-nowrap rounded-lg">
                            <tr v-for="demand in demands" :key="demand.id"
                            class="border-y border-line-border">
                            <td>
                                <div class="px-4 py-2">
                                    <span class="text-light font-light">{{ demand.title }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="px-4 py-2">
                                    <span class="text-light font-light">{{ demand.job_category }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="px-4 py-2">
                                    <span class="text-light font-light">{{ demand.deadline }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="px-4 py-2">
                                    <span class="text-light font-light">{{ demand.status }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="px-4 py-2">
                                    <span class="text-light font-light"><AppIcons name="add"/></span>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
import AppInput from "../../Components/inputs/AppInput";
import MainContent from "../../Layouts/MainContent";

export default defineComponent({
    name: "Dashboard",
    props: {
        demands: Object,
    },
    components: {
        Link,
        Head,
        AppLayout,
        MainContent,
        AppInput,
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
