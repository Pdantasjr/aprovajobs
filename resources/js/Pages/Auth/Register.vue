<template>
    <Head title="Registro" />
    <Header/>
    <div class="flex items-center w-11/12 lg:w-full max-w-4xl h-auto mt-48 mx-auto">
        <Link :href="route('front.index')">
            <AppIcons name="return"/>
        </Link>
        <AppTitle title="Cadastro"/>
    </div>
    <div class="flex justify-center flex-col w-11/12 lg:w-full max-w-4xl h-auto mt-6 mx-auto">
        <transition>
            <AppValidationErrors class="mb-4"/>
        </transition>
        <form @submit.prevent="submit">
            <AppLabel value="Nome" required/>
            <AppInput label="Nome" name="name" v-model="form.name" required autofocus/>
            <AppLabel value="E-mail" required/>
            <AppInput label="email" name="email" type="email" v-model="form.email" required />
            <AppLabel value="Senha" required/>
            <AppInput label="password" name="password" type="password" v-model="form.password" required />
            <AppLabel value="Confirme sua senha:" required/>
            <AppInput label="password_confirmation" name="password_confirmation" type="password" v-model="form.password_confirmation" required />
            <div
                class="flex flex-col sm:flex-row items-center justify-end w-full h-auto mx-auto my-12">
                <Link :href="route('login')"
                      class="sm:order-first order-last text-dark/30 dark:text-light/30 m-4 hover:underline dark:hover:text-light hover:text-dark transition-all duration-200 ease-in-out">
                    Já tenho uma conta
                </Link>
                <AppButton>
                    <AppIcons name="enter"/>
                    <span class="mx-2">Registrar</span>
                </AppButton>
            </div>
        </form>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import Header from "../Front/Components/Header";
    import AppTitle from "../Front/Components/titles/AppTitle";
    import AppIcons from "../Front/Components/icons/AppIcons";
    import AppValidationErrors from "../Front/Components/Validations/AppValidationErrors";
    import AppLabel from "../Front/Components/inputs/AppLabel";
    import AppInput from "../Front/Components/inputs/AppInput";
    import AppButton from "../Front/Components/buttons/AppButton";

    export default defineComponent({
        components: {
            Head,
            Header,
            AppTitle,
            AppIcons,
            AppValidationErrors,
            AppLabel,
            AppInput,
            AppButton,
            Link,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
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
