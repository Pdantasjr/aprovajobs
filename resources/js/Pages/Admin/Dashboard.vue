<template>
    <Head title="Dashboard"/>
    <AppLayout>
        <MainContent>
            <Sidebar />
            <div class="flex items-center w-11/12 lg:w-full max-w-6xl h-auto mt-4 mx-auto">
                <h1>Dashboard</h1>
            </div>
        </MainContent>
    </AppLayout>
</template>

<script>
import {defineComponent} from 'vue'

import {Head, Link} from '@inertiajs/inertia-vue3';

import AppLayout from "@/Pages/Admin/Layouts/AppLayout";
import MainContent from "@/Pages/Admin/Layouts/MainContent";

import Sidebar from "@/Pages/Admin/Layouts/Sidebar";

export default defineComponent({
    name: "Dashboard",
    components: {
        Sidebar,
        Link,
        Head,
        AppLayout,
        MainContent,
    }
})
</script>
