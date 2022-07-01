<template>
    <button
        :class="baseClass"
        class="w-full sm:w-48 h-12 py-1 px-2 m-2 rounded-full hover:cursor-pointer transition hover:scale-105 duration-200 ease-in-out"
    >
        <slot />
    </button>
</template>

<script>
export default {
    name: "button",
    props: {
        type: {
            type: String,
            default: "primary"
        },
        textColor: {
            type: String,
            default: "light"
        },
    },
    data () {
        return {
        }
    },
    computed: {
        baseClass() {
            return [
                this.getType,
                this.getTextColor,
            ]
        },
        getType() {
            return this.type ? `bg-${this.type}` : ''
        },
        getTextColor() {
            return this.textColor ? `text-${this.textColor}` : ''
        }
    },
}
</script>

<style scoped>

</style>
