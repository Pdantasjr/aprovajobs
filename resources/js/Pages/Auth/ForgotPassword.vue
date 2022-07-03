<template>
    <Head title="Forgot Password" />
    <div class="flex flex-col h-screen justify-between">
        <Header />
        <div class="flex items-center w-11/12 lg:w-full max-w-4xl h-auto mt-48 mx-auto">
            <Link :href="route('front.index')">
                <AppIcons name="return"/>
            </Link>
            <AppTitle title="Recuperação de senha"/>
        </div>
        <div class="my-4 w-10/12 lg:w-full max-w-4xl h-auto mx-auto">
            <p class="text-xs sm:text-sm text-dark/30 dark:text-light/30 text-justify">Esqueceu sua senha? Não se preocupe, digite seu e-mail aqui embaixo para receber um link de recuperação de senha no e-mail cadastrado no Aprova Jobs. Assim que receber, clique no link e digite sua nova senha, simples assim!</p>
        </div>
        <div class="flex justify-center flex-col w-11/12 lg:w-full max-w-4xl h-auto mt-6 mx-auto">
            <div v-if="status" class="mb-4 font-medium text-sm text-warning">
                {{ status }}
            </div>
            <transition>
                <AppValidationErrors class="mb-4"/>
            </transition>
            <form @submit.prevent="submit">
                <AppLabel text="E-mail" for-input="email" required/>
                <AppInput id="email" type="email" name="email" v-model="form.email" required autofocus/>

                <div class="flex flex-col sm:flex-row items-center justify-end w-full h-auto mx-auto my-12">
                    <AppButton>
                        <AppIcons name="recovery"/>
                        <span class="mx-2">Recuperar senha</span>
                    </AppButton>
                </div>
            </form>
        </div>
        <Footer />
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import Header from "../../Layouts/Header";
    import AppIcons from "../../Components/icons/AppIcons";
    import AppTitle from "../../Components/titles/AppTitle";
    import AppValidationErrors from "../../Components/Validations/AppValidationErrors";
    import AppLabel from "../../Components/inputs/AppLabel";
    import AppInput from "../../Components/inputs/AppInput";
    import AppButton from "../../Components/buttons/AppButton";
    import Footer from "../../Layouts/Footer";

    export default defineComponent({
        components: {
            Head,
            Link,
            Header,
            AppIcons,
            AppTitle,
            AppValidationErrors,
            AppLabel,
            AppInput,
            AppButton,
            Footer,
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.email'))
            }
        }
    })
</script>
