<template>
    <div class="flex flex-col w-screen h-auto">
        <!--LOGOTIPO-->
        <div class="flex items-center justify-center w-11/12 w-max-7xl mx-auto h-auto mt-32 mb-32">
            <img src="./Images/logotype/logotipo-aprova-jobs.svg" alt="logotipo AprovaJobs">
        </div>

        <div class="flex flex-col items-center w-11/12 mx-auto">
            <Button :btn-disabled="true" :btn-text="'Algo'" :btn-type="primary" />
            <button class="bg-primary w-full sm:w-48 h-12 py-1 px-2 text-white rounded-full hover:cursor-pointer hover:bg-primary/80 transition hover:scale-105 duration-200 ease-in-out">Fazer login</button>
            <Link href="#" class="text-white/30 my-4 hover:underline hover:text-white transition-all duration-200 ease-in-out">Cadastrar-se</Link>
        </div>
    </div>
</template>

<script>
import {defineComponent} from 'vue'

import {Link} from '@inertiajs/inertia-vue3';
import Button from "./Components/buttons/button";

export default defineComponent({
    name: "Front",
    props: {
    },
    components: {
        Link,
        Button,
    },
})

</script>
