<template>
    <div class="w-full h-auto">
        <span @click="active = !active" class="text-light hover:cursor-pointer flex" v-if="active"> <AppIcons name="arrowDown" /> Informações</span>
        <span @click="active = !active" class="text-light hover:cursor-pointer flex" v-if="!active"> <AppIcons name="arrowRight" /> Informações</span>
        <div class="border-gray-200 rounded p-4 mx-6">
            <h3 class="text-light my-2 font-semibold">Descrição</h3>
            <p class="text-light my-2">Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse pariatur duis deserunt mollit dolore cillum minim tempor enim. Elit aute irure tempor cupidatat incididunt sint deserunt ut voluptate aute id deserunt nisi.</p>
            <div class="flex justify-between mt-8">
                <div>
                    <h3 class="text-light my-2 font-semibold">Categoria</h3>
                    <p class="text-light">Nome da categoria</p>
                </div>
                <div class="ml-6">
                    <h3 class="text-light my-2 font-semibold">Prazo</h3>
                    <p class="text-light">20/07/2022</p>
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
