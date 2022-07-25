<template>
    <Head title="Jobs"/>
    <AppLayout>
        <toast :toast="$page.props.flash.message"></toast>
        <MainContent>
            <div class="flex items-center w-11/12 lg:w-full max-w-6xl h-auto mt-4 mx-auto">
                <Link :href="route('admin.dashboard.index')">
                    <AppIcons name="return"/>
                </Link>
                <AppTitle title="Acompanhamento de demandas"/>
            </div>
            <div class="flex items-center justify-end w-11/12 lg:w-full max-w-6xl h-auto mx-auto m-6">
                <Link :href="route('admin.jobs.create')" class="flex items-start">
                    <AppIcons name="add-job" :style="'primary'"/>
                    <span class="mx-2 text-primary flex-auto w-32">Adicionar Job</span>
                </Link>
            </div>
            <div class="items-center w-11/12 lg:w-full max-w-6xl h-auto mx-auto">
                <div v-if="jobs.length">
                    <div class="relative overflow-x-auto shadow-md rounded-2xl border border-line-border/30">
                        <table class="w-full text-sm rounded-2xl text-left text-light">
                            <thead class="text-xs text-light">
                            <tr>
                                <th scope="col" class="p-3">
                                    <span class="flex items-start text-sm font-semibold text-dark dark:text-light">Título</span>
                                </th>
                                <th scope="col" class="p-3">
                                    <span class="flex items-start text-sm font-semibold text-dark dark:text-light">Categoria</span>
                                </th>

                                <th scope="col" class="p-3">
                                    <span
                                        class="flex items-start text-sm font-semibold text-dark dark:text-light">Prazo</span>
                                </th>
                                <th scope="col" class="p-3">
                                    <span class="flex items-center justify-center text-sm font-semibold text-dark dark:text-light">Status</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y whitespace-nowrap rounded-lg">
                            <tr v-for="job in jobs" :key="job.id"
                                class="border-y border-line-border/30">
                                <td>
                                    <div class="p-3">
                                        <span class="text-dark dark:text-light font-light">{{ job.title }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="p-3">
                                        <span class="text-dark dark:text-light font-light">{{
                                                job.job_category.name
                                            }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="p-3">
                                        <span class="text-dark dark:text-light font-light">{{
                                                new Intl.DateTimeFormat('pt-BR', {
                                                    day: 'numeric',
                                                    month: 'numeric',
                                                    year: 'numeric'
                                                }).format(new Date(job.deadline))
                                            }}</span>
                                    </div>
                                </td>
                                <td>
                                    <AppStatus :status="job.status"/>
                                </td>
                                <td>
                                    <div class="p-3">
                                        <Link :href="route('admin.jobs.show', [job.slug])">
                                            <span class="text-light font-light hover:cursor-pointer"><AppIcons
                                                name="hover-eye"/></span>
                                        </Link>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div v-else>
                    <span class="text-dark/30 text-sm text-center">Não há jobs cadastradas.</span>
                </div>
            </div>
        </MainContent>
    </AppLayout>
</template>

<script>
import {defineComponent} from 'vue'

import {Head, Link} from '@inertiajs/inertia-vue3';

import AppLayout from "@/Pages/Admin/Layouts/AppLayout";
import MainContent from "@/Pages/Admin/Layouts/MainContent";

import Toast from "@/Components/Notifications/Toast";
import AppIcons from "@/Components/icons/AppIcons";
import AppTitle from "@/Components/titles/AppTitle";
import AppButton from "@/Components/buttons/AppButton";
import AppStatus from "@/Components/status/AppStatus";
import AppInputSearch from "@/Components/inputs/AppInputSearch";

export default defineComponent({
    name: "Dashboard",
    props: {
        jobs: Object,
    },
    components: {
        AppInputSearch,
        AppStatus,
        Toast,
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
