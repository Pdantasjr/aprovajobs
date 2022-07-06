<template>
    <Head title="Login"/>
    <AppLayout>
        <div class="flex items-center w-11/12 lg:w-full max-w-4xl h-auto mt-48 mx-auto">
            <Link :href="route('front.index')">
                <AppIcons name="return"/>
            </Link>
            <AppTitle title="Login"/>
        </div>
        <div class="flex justify-center flex-col w-11/12 lg:w-full max-w-4xl h-auto mt-6 mx-auto">
            <transition>
                <AppValidationErrors class="mb-4"/>
            </transition>
            <div v-if="status" class="mb-4 font-medium text-sm text-warning">
                {{ status }}
            </div>

            <form @submit.prevent="submit">
                <AppLabel text="E-mail" for-input="email" required/>
                <AppInput id="email" type="email" name="email" v-model="form.email" required autofocus/>

                <AppLabel text="Senha" for-input="password" required/>
                <AppInput id="password" type="password" name="password" v-model="form.password" required/>

                <AppLabel class="flex items-center">
                    <AppCheckbox name="remember" v-model:checked="form.remember"/>
                    <span class="ml-2 text-sm dark:text-light/30 text-dark/30 hover:cursor-pointer hover:text-primary transition duration-200 ease-in-out">Lembrar de mim</span>
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
    </AppLayout>
</template>

<script>
import {defineComponent} from 'vue'
import {Head, Link} from '@inertiajs/inertia-vue3';
import AppLayout from "../../Layouts/AppLayout";
import Header from "../../Layouts/Header";
import AppValidationErrors from "../../Components/Validations/AppValidationErrors";
import AppTitle from "../../Components/titles/AppTitle";
import AppInput from "../../Components/inputs/AppInput";
import AppCheckbox from "../../Components/inputs/AppCheckbox";
import AppIcons from "../../Components/icons/AppIcons";
import AppButton from "../../Components/buttons/AppButton";
import AppLabel from "../../Components/inputs/AppLabel";
import Footer from "../../Layouts/Footer";

export default defineComponent({
    components: {
        AppTitle,
        AppLayout,
        Header,
        AppValidationErrors,
        Head,
        AppInput,
        AppCheckbox,
        AppIcons,
        AppButton,
        AppLabel,
        Link,
        Footer,
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
