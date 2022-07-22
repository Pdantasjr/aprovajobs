<template>
    <Head title="Categorias"/>
    <AppLayout>
        <MainContent>
            <div class="flex items-center w-11/12 lg:w-full max-w-4xl h-auto mx-auto">
                <Link :href="route('admin.categories.index')">
                    <AppIcons name="return"/>
                </Link>
                <AppTitle title="Nova categoria"/>
            </div>
            <div class="flex justify-center flex-col w-11/12 lg:w-full max-w-4xl h-auto mt-6 mx-auto">
                <transition>
                    <AppValidationErrors class="mb-4"/>
                </transition>
                <form @submit.prevent="submit">
                    <AppLabel text="Nome da categoria" for-input="name" required/>
                    <AppInput name="name" id="name" v-model="form.name" autofocus required/>

                    <div class="mt-6 w-full flex justify-end items-end">
                        <AppButton>
                            <AppIcons name="sent"/>
                            <span class="text-light mx-2">Cadastrar</span>
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
import AppInput from "@/Components/inputs/AppInput";
import AppLabel from "@/Components/inputs/AppLabel";
import AppValidationErrors from "@/Components/Validations/AppValidationErrors";
import AppIcons from "../../../Components/icons/AppIcons";
import AppTitle from "../../../Components/titles/AppTitle";
import AppButton from "../../../Components/buttons/AppButton";
import AppLayout from ".././Layouts/AppLayout";
import MainContent from ".././Layouts/MainContent";
import AppStatus from "../../../Components/status/AppStatus";
import AppInputSearch from "../../../Components/inputs/AppInputSearch";

export default defineComponent({
    name: "Categories",
    props: {
        errors: Object,
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
        logout() {
            this.$inertia.post(route('logout'));
        },
    }
})
</script>
