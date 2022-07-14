<template>
    <div class="dark:bg-dark bg-light min-h-screen flex flex-col justify-between">
        <Header/>
            <transition name="page" mode="out-in" appear>
                <slot></slot>
            </transition>
        <Footer/>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import {Link} from '@inertiajs/inertia-vue3';
import Header from "./Header";
import MainContent from "./MainContent";
import Footer from "./Footer";

export default defineComponent({
    components: {
        Header,
        MainContent,
        Footer,
        Link,
    },
})
</script>
<style scoped>
.page-enter-active,
.page-leave-active {
    transition: all 1s;
}

.page-enter,
.page-leave-active {
    opacity: 0;
}
</style>
