<template>
    <Head title="Login"/>
    <Header/>
    <div class="flex items-center w-11/12 lg:w-screen max-w-4xl h-auto mt-48 mx-auto">
        <Link :href="route('front.index')">
            <AppIcons name="return"/>
        </Link>
        <AppTitle title="Login"/>
    </div>
    <div class="flex justify-center flex-col w-11/12 lg:w-screen max-w-4xl h-auto mt-6 mx-auto">
        <transition>
            <AppValidationErrors class="mb-4"/>
        </transition>
        <div v-if="status" class="mb-4 font-medium text-sm text-warning">
            {{ status }}
        </div>
        <form @submit.prevent="submit">
            <AppLabel value="E-mail" required/>
            <AppInput label="E-mail" type="email" name="email" v-model="form.email"/>
            <AppLabel value="password" required/>
            <AppInput label="Senha" type="password" name="password" v-model="form.password"/>
            <AppLabel class="flex items-center">
                <AppCheckbox name="remember" v-model:checked="form.remember"/>
                <span class="ml-2 text-sm text-gray-600">Lembrar de mim</span>
            </AppLabel>
            <div
                class="flex flex-col sm:flex-row items-center justify-end w-full h-auto mx-auto my-12">
                <Link :href="route('password.request')"
                      class="sm:order-first order-last text-dark/30 dark:text-light/30 m-4 hover:underline dark:hover:text-light hover:text-dark transition-all duration-200 ease-in-out">
                    Esqueci minha senha
                </Link>
                <AppButton>
                    <AppIcons name="login"/>
                    <span class="mx-2">Login</span>
                </AppButton>
            </div>
        </form>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import {Head, Link} from '@inertiajs/inertia-vue3';
import Header from "../Front/Components/Header";
import AppValidationErrors from "../Front/Components/Validations/AppValidationErrors";
import AppTitle from "../Front/Components/titles/AppTitle";
import AppInput from "../Front/Components/inputs/AppInput";
import AppCheckbox from "../Front/Components/inputs/AppCheckbox";
import AppIcons from "../Front/Components/icons/AppIcons";
import AppButton from "../Front/Components/buttons/AppButton";
import AppLabel from "../Front/Components/inputs/AppLabel";

export default defineComponent({
    components: {
        AppTitle,
        Header,
        AppValidationErrors,
        Head,
        AppInput,
        AppCheckbox,
        AppIcons,
        AppButton,
        AppLabel,
        Link,
    },
    props: {
        canResetPassword: Boolean,
        status: String
    },
    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false
            })
        }
    },
    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ...data,
                    remember: this.form.remember ? 'on' : ''
                }))
                .post(this.route('login'), {
                    onFinish: () => this.form.reset('password'),
                })
        }
    }
})
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
