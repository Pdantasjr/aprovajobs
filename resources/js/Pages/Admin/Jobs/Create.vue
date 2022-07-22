<template>
    <Head title="Novo job"/>
    <AppLayout>
        <MainContent>
            <div class="flex items-center w-11/12 lg:w-full max-w-4xl h-auto mx-auto">
                <Link :href="route('front.index')">
                    <AppIcons name="return"/>
                </Link>
                <AppTitle title="Novo job"/>
            </div>
            <div class="flex justify-center flex-col w-11/12 lg:w-full max-w-4xl h-auto mt-6 mx-auto">
                <transition>
                    <AppValidationErrors class="mb-4"/>
                </transition>
                <form @submit.prevent="submit">
                    <AppLabel text="Título da job:" for-input="title" required/>
                    <AppInput name="title" id="title" v-model="form.title" autofocus required/>

                    <AppLabel text="Descreva seu job:" for-input="description" required/>
                    <AppTextArea name="description" id="description" v-model="form.description" required/>

                    <div class="flex flex-col sm:w-5/12 mt-6">
                        <AppLabel text="Categoria:" for-input="category"/>
                        <AppSelec name="category" id="category" v-model="form.category" required/>
                    </div>

                    <div class="flex flex-col sm:w-5/12 mt-6">
                        <AppLabel text="Prazo de entrega?" for-input="deadline"/>
                        <AppInput type="date" name="deadline" id="deadline" v-model="form.deadline"/>
                    </div>

                    <div class="mt-6 w-full flex justify-end items-end">
                        <AppButton>
                            <AppIcons name="sent"/>
                            <span class="text-light mx-2">Enviar</span>
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
import AppLayout from "../../../Layouts/AppLayout";
import MainContent from "../../../Layouts/MainContent";
import AppIcons from "../../../Components/icons/AppIcons";
import AppTitle from "../../../Components/titles/AppTitle";
import AppButton from "../../../Components/buttons/AppButton";
import AppValidationErrors from "../../../Components/Validations/AppValidationErrors";
import AppLabel from "../../../Components/inputs/AppLabel";
import AppInput from "../../../Components/inputs/AppInput";
import AppTextArea from "../../../Components/inputs/AppTextArea";
import AppSelec from "../../../Components/inputs/AppSelec";

export default defineComponent({
    name: "NewJob",
    components: {
        Head,
        Link,
        AppLayout,
        MainContent,
        AppIcons,
        AppTitle,
        AppButton,
        AppValidationErrors,
        AppLabel,
        AppInput,
        AppTextArea,
        AppSelec,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                description: '',
                author: this.$attrs.user.id,
                category: '',
                deadline: '',
            })
        }
    },
    methods: {
        submit() {
            this.$inertia.post(route('admin.jobs.store'), this.form, {
                forceFormData: true
            });
        },
    }
});
</script>

<style scoped>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
