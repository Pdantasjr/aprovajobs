<template>
    <div class="w-full h-auto bg-light2 dark:bg-dark2 rounded-2xl block transition-all duration-200 ease-in-out">
        <span @click="active = !active" class="text-dark dark:text-light text-lg font-semibold hover:cursor-pointer flex p-4" v-if="active"> <AppIcons :style="'dark'" name="arrowDown" /> Informações</span>
        <span @click="active = !active" class="text-dark dark:text-light text-lg font-semibold hover:cursor-pointer flex p-4" v-if="!active"> <AppIcons :style="'dark'" name="arrowRight" /> Informações</span>
        <transition name="slide-fade">
            <div v-if="active" class=" h-auto border-gray-200 mx-6 border-t border-line-border/30 block relative">
                <h3 class="text-dark dark:text-light my-2 font-semibold">Descrição</h3>
                <p class="text-dark dark:text-light my-2">{{ description }}</p>
                <div class="flex justify-between my-8">
                    <div>
                        <h3 class="text-dark dark:text-light my-2 font-semibold">Categoria</h3>
                        <p class="text-dark dark:text-light">{{ category }}</p>
                    </div>
                    <div class="ml-6">
                        <h3 class="text-dark dark:text-light my-2 font-semibold">Prazo</h3>
                        <p class="text-dark dark:text-light">
                            {{ new Intl.DateTimeFormat('pt-BR', { day: 'numeric', month: 'long', year: 'numeric'} ).format( new Date(deadline)) }}
                        </p>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
import {defineComponent} from "vue";
import AppIcons from "../icons/AppIcons";
export default {
    name: "AppAccordion",
    props: {
        description: String,
        category: String,
        deadline: String,
    },
    components: {
        AppIcons,
    },
    data () {
        return {
            active: false,
        }
    }
}
</script>

<style scoped>

.slide-fade-enter {
    opacity: 0;
}

.slide-fade-enter-active {
    transition: opacite .2s;
}

.slide-fade-to {
    opacity: 1;
}

.slide-fade-leave {
    opacity: 1;
}

.slide-fade-leave-active {
    transition: opacity .2s;
}

.slide-fade-leave-to {
    opacity: 0;
}

</style>
