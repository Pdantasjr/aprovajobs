<template>
    <Link
        :href="href"
        :class="baseClass"
        class="w-full flex justify-center items-center sm:w-48 h-12 py-1 px-2 m-2 rounded-full hover:cursor-pointer transition hover:scale-105 duration-200 ease-in-out"
    >
        <slot />
    </Link>
</template>

<script>
import {defineComponent} from 'vue'

import {Link} from '@inertiajs/inertia-vue3';
export default defineComponent({
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
        href: {
            type: String,
            default: '#',
        }
    },
    components: {
        Link,
    },
    data() {
        return {}
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
})
</script>
