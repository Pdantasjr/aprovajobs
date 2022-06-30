<template>
    <button
        :class="btnType"
        class="bg-primary w-full sm:w-48 h-12 py-1 px-2 rounded-full hover:cursor-pointer transition hover:scale-105 duration-200 ease-in-out"
        :disabled="btnDisabled" >{{ btnText }}</button>
</template>

<script>
export default {
    name: "button",
    props: {
        btnText: {
            type: String,
            default: "Inserir Texto",
        },
        btnType: {
            type: String,
            default: "bg-primary"
        },
        btnDisabled: {
            type: String,
            default: false,
        }
    },
    data () {
        return {
            primary: 'text-white hover:bg-primary/80',
            secondary: '',
            danger: 'text-red-500 hover:bg-primary/80',
            warning: '',
            info: '',
            light: '',
            dark: '',
        }
    }
}
</script>

<style scoped>

</style>
