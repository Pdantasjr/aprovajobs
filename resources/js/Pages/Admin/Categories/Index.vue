<template>
    <Head title="Categorias"/>
    <AppLayout>
        <MainContent>
            <div class="flex items-center w-11/12 lg:w-full max-w-6xl h-auto mt-4 mx-auto">
                <Link :href="route('admin.categories.index')">
                    <AppIcons name="return"/>
                </Link>
                <AppTitle title="Categorias"/>
            </div>
            <div class="w-11/12 lg:w-full max-w-6xl h-auto mx-auto">

                <form class="flex items-center justify-center lg:w-full h-auto mx-auto mt-6 mb-8"
                      @submit.prevent="submit">
                    <div>
                        <AppLabel text="Adicionar categoria:" for-input="name" required/>
                    </div>
                    <div class="w-full mx-4 flex-1">
                        <AppInput name="name" id="name" v-model="form.name" autofocus required/>
                    </div>
                    <div>
                        <AppButton>
                            <AppIcons name="add"/>
                            <span class="text-light mx-2">Adicionar</span>
                        </AppButton>
                    </div>
                </form>

            </div>
            <div class="items-center w-11/12 lg:w-full max-w-6xl h-auto mx-auto">
                <div v-if="categories.data.length">
                    <div class="relative overflow-x-auto shadow-md rounded-2xl border border-line-border/30">
                        <table class="w-full text-sm rounded-2xl text-left text-light">
                            <thead class="text-xs text-light">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <span
                                        class="flex items-start text-sm font-semibold text-dark dark:text-light">Nome</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="flex items-start text-sm font-semibold text-dark dark:text-light">Cadastrado em</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span
                                        class="flex items-start text-sm font-semibold text-dark dark:text-light">Ações</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y whitespace-nowrap rounded-lg">
                            <tr v-for="category in categories.data" :key="category.id"
                                class="border-y border-line-border/30">
                                <td>
                                    <div class="px-4 py-2">
                                        <span class="text-dark dark:text-light font-light">{{ category.name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="px-4 py-2">
                                        <span class="text-dark dark:text-light font-light">{{
                                                new Intl.DateTimeFormat('pt-BR', {
                                                    day: 'numeric',
                                                    month: 'long',
                                                    year: 'numeric'
                                                }).format(new Date(category.created_at))
                                            }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="px-4 py-2">
                                        <div class=" flex justify-around items-center w-20">
                                            <Link class="mx-2" :href="route('admin.categories.edit', [category.slug])">
                                                <AppIcons name="edit"/>
                                            </Link>
                                            <button @click="catDelete(category.id, category.name)" class="mx-2">
                                                <AppIcons name="trash"/>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="py-1 border-t">
                        <nav class="flex items-center justify-between">
                            <div class="flex-1 items-center lg:grid grid-cols-1">
                                <div class="flex items-center">
                                    <div class="pl-2 text-sm font-medium">
                                        <Pagination class="mt-6" :links="categories.links"/>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div v-else>
                    <span class="text-dark/30 text-sm text-center">Não há categorias cadastradas.</span>
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

import AppLabel from "@/Components/inputs/AppLabel";
import AppInput from "@/Components/inputs/AppInput";
import Pagination from "@/Components/Pagination/Pagination";
import AppIcons from "@/Components/icons/AppIcons";
import AppTitle from "@/Components/titles/AppTitle";
import AppButton from "@/Components/buttons/AppButton";
import AppStatus from "@/Components/status/AppStatus";
import AppInputSearch from "@/Components/inputs/AppInputSearch";
import Button from "@/Jetstream/Button";

export default defineComponent({
    name: "Categories",
    props: {
        categories: Object,
    },
    components: {
        Button,
        AppInputSearch,
        AppStatus,
        Link,
        Head,
        Pagination,
        AppLabel,
        AppInput,
        AppLayout,
        MainContent,
        AppIcons,
        AppTitle,
        AppButton,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
            })
        }
    },
    methods: {
        submit() {
            this.$inertia.post(route('admin.categories.store'), this.form, {
                forceFormData: true
            });
        },
        catDelete(id, name) {
            if (confirm("Você tem certeza que deseja excluir " + name + " ?")) {
                this.$inertia.delete(route('admin.categories.destroy', [id]), this.form)
            }
        },
        logout() {
            this.$inertia.post(route('logout'));
        },
    }
})
</script>
