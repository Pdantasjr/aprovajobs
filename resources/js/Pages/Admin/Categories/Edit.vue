<template>
    <Head title="Editar categoria"/>
    <AppLayout>
        <MainContent>
            <div class="flex items-center w-11/12 lg:w-full max-w-4xl h-auto mx-auto">
                <Link :href="route('admin.categories.index')">
                    <AppIcons name="return"/>
                </Link>
                <AppTitle title="Editar categoria"/>
            </div>
            <div class="flex justify-center flex-col w-11/12 lg:w-full max-w-4xl h-auto mt-6 mx-auto">
                <transition>
                    <AppValidationErrors class="mb-4"/>
                </transition>
                <form @submit.prevent="submit"
                      class="flex items-center justify-center lg:w-full h-auto mx-auto mt-6 mb-8">
                    <div>
                        <AppLabel text="Nome da categoria" for-input="name" required/>
                    </div>
                    <div class="w-full mx-4 flex-1">
                        <input type="text" id="name" name="name" v-model="form.name"
                            class="h-12 dark:bg-dark bg-light rounded-full transition duration-75 focus:border-primary focus:ring-1 active:outline-4 dark:text-light text-dark text-lg font-semibold px-8"
                            >
                    </div>
                    <div>
                        <AppButton>
                            <AppIcons name="refresh"/>
                            <span class="text-light mx-2">Atualizar</span>
                        </AppButton>
                    </div>
                </form>
            </div>
        </MainContent>
    </AppLayout>
</template>

<script>
import {defineComponent} from 'vue'

import {Head, Link} from '@inertiajs/inertia-vue3';

import AppLayout from "@/Pages/Admin/Layouts/AppLayout";
import MainContent from "@/Pages/Admin/Layouts/MainContent";

import AppInput from "@/Components/inputs/AppInput";
import AppLabel from "@/Components/inputs/AppLabel";
import AppValidationErrors from "@/Components/Validations/AppValidationErrors";
import AppIcons from "@/Components/icons/AppIcons";
import AppTitle from "@/Components/titles/AppTitle";
import AppButton from "@/Components/buttons/AppButton";
import AppStatus from "@/Components/status/AppStatus";
import AppInputSearch from "@/Components/inputs/AppInputSearch";

export default defineComponent({
    name: "Categories",
    props: {
        errors: Object,
        category: Object,
    },
    components: {
        AppInputSearch,
        AppStatus,
        Link,
        Head,
        AppInput,
        AppLabel,
        AppValidationErrors,
        AppLayout,
        MainContent,
        AppIcons,
        AppTitle,
        AppButton,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: this.category.name,
            })
        }
    },
    methods: {
        submit() {
            this.$inertia.put(route('admin.categories.update', [this.category.id]), this.form, {
                preserveScroll: true,
            });
        }
    }
})
</script>
