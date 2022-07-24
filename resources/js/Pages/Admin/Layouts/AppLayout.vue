<template>
    <div class="dark:bg-dark bg-light min-h-screen flex flex-col justify-between">
        <Header/>
        <Sidebar />
            <slot></slot>
        <Footer/>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import {Link} from '@inertiajs/inertia-vue3';
import Header from "./Header";
import MainContent from "./MainContent";
import Footer from "./Footer";
import Sidebar from "@/Pages/Admin/Layouts/Sidebar";

export default defineComponent({
    components: {
        Sidebar,
        Header,
        MainContent,
        Footer,
        Link,
    },
})
</script>
