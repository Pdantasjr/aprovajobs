<template>
    <Button :type="type" :class="baseClass"
            class="w-full flex justify-center items-center sm:w-48 h-12 py-1 px-2 m-2 rounded-full hover:cursor-pointer transition hover:scale-105 duration-200 ease-in-out">
        <slot/>
    </Button>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "AppButton",
    props: {
        type: {
            type: String,
            default: "submit",
        },
        style: {
            type: String,
            default: "primary"
        },
        textColor: {
            type: String,
            default: "light"
        },
        href: {
            type: String,
            default: '#',
        }
    },
    computed: {
        baseClass() {
            return [
                this.getStyle,
                this.getTextColor,
            ]
        },
        getStyle() {
            return this.style ? `bg-${this.style}` : ''
        },
        getTextColor() {
            return this.textColor ? `text-${this.textColor}` : ''
        }
    },
})
</script>
