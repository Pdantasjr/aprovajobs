<template>
    <div class="w-full h-auto">
        <span @click="active = !active" class="text-light hover:cursor-pointer flex" v-if="active"> <AppIcons name="arrowDown" /> Informações</span>
        <span @click="active = !active" class="text-light hover:cursor-pointer flex" v-if="!active"> <AppIcons name="arrowRight" /> Informações</span>
        <div class="border-gray-200 rounded p-4 mx-6">
            <h3 class="text-light my-2 font-semibold">Descrição</h3>
            <p class="text-light my-2">{{ description }}</p>
            <div class="flex justify-between mt-8">
                <div>
                    <h3 class="text-light my-2 font-semibold">Categoria</h3>
                    <p class="text-light">{{ category }}</p>
                </div>
                <div class="ml-6">
                    <h3 class="text-light my-2 font-semibold">Prazo</h3>
                    <p class="text-light">{{ deadline }}</p>
                </div>
            </div>
        </div>
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
            active: true,
        }
    }
}
</script>

<style scoped>

</style>
