<template>
    <Header />
    <div class="flex items-center w-11/12 sm:w-screen max-w-4xl h-auto mt-48 mx-auto">
        <Link :href="route('front.index')">
            <AppIcons name="return" />
        </Link>
        <AppTitle title="Login" />
    </div>
    <div class="flex justify-center flex-col w-11/12 sm:w-screen max-w-4xl h-auto mt-6 mx-auto">
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <form @submit.prevent="submit">
            <AppLabel value="E-mail" required />
            <AppInput label="E-mail" type="email" name="email" v-model="form.email" />
            <AppLabel value="password" required />
            <AppInput label="Senha" type="password" name="password" v-model="form.password" />

            <div class="flex flex-col sm:flex-row items-center justify-end w-11/12 sm:w-screen max-w-4xl h-auto mx-auto my-12">
                <Link :href="route('password.request')" class="sm:order-first order-last text-dark/30 dark:text-light/30 m-4 hover:underline dark:hover:text-light hover:text-dark transition-all duration-200 ease-in-out">Esqueci minha senha</Link>
                <AppButton :href="route('login')">
                    <AppIcons name="login" />
                    <span class="mx-2">Login</span>
                </AppButton>
            </div>
        </form>
    </div>
</template>

<script>
import {defineComponent} from 'vue'

import {Link, Head} from '@inertiajs/inertia-vue3';
import Header from "./Components/Header";
import AppTitle from "./Components/titles/AppTitle";
import AppInput from "./Components/inputs/AppInput";
import AppIcons from "./Components/icons/AppIcons";
import AppButton from "./Components/buttons/AppButton";
import AppLabel from "./Components/inputs/AppLabel";

export default defineComponent({
    name: "Login",
    props: {
        storageUrl: String,
        status: String
    },
    components: {
        AppLabel,
        Link,
        Head,
        Header,
        AppTitle,
        AppInput,
        AppIcons,
        AppButton,
    },
    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
            })
        }
    },
    methods: {
        submit() {
            console.log('teste')
            this.form
                .transform(data => ({
                    ... data,
                    remember: this.form.remember ? 'on' : ''
                }))
                .post(this.route('login'), {
                    onFinish: () => this.form.reset('password'),
                })
        }
    }
})

</script>
