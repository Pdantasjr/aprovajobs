<template>
    <Head :title="title"/>
    <div class="flex flex-col min-h-screen justify-between">
        <Header/>
            <transition name="fade">
                <slot></slot>
            </transition>
        <Footer/>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import {Head, Link} from '@inertiajs/inertia-vue3';
import Header from "./Header";
import Footer from "./Footer";

export default defineComponent({
    props: {
        title: String,
    },
    components: {
        Header,
        Footer,
        Head,
        Link,
    },
})
</script>
<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
