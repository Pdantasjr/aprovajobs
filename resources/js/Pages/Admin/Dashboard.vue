<template>
    <Head title="Dashboard"/>
    <AppLayout>
        <MainContent>
            <div class="flex items-center w-11/12 lg:w-full max-w-4xl h-auto mx-auto">
                <Link :href="route('front.index')">
                    <AppIcons name="return"/>
                </Link>
                <AppTitle title="Dashboardd"/>
            </div>
            <div class="flex w-11/12 lg:w-full max-w-4xl h-auto mx-auto">
            <AppButton :style="'red-600'" @click="logout">
                <AppIcons name="logout" />
                <span class="mx-2">Sair</span>
            </AppButton>
            <Link :href="route('admin.jobs.create')" class="bg-info w-full sm:w-auto sm:px-8 flex justify-center items-center h-12 py-1 px-2 m-2 rounded-full hover:cursor-pointer transition hover:scale-105 duration-200 ease-in-out">
                <AppIcons name="add" />
                <span class="mx-2 text-light">Nova demanda</span>
            </Link>
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

export default defineComponent({
    name: "Dashboard",
    components: {
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
