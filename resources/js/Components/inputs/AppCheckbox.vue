<template>
    <input type="checkbox" :value="value" v-model="proxyChecked"
           class="rounded dark:bg-light/30 dark:bg-dark/30 dark:border-light/30 border-dark/30 text-primary focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 hover:cursor-pointer">
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    emits: ['update:checked'],

    props: {
        checked: {
            type: [Array, Boolean],
            default: false,
        },
        value: {
            default: null,
        },
    },

    computed: {
        proxyChecked: {
            get() {
                return this.checked;
            },

            set(val) {
                this.$emit("update:checked", val);
            },
        },
    },
})
</script>
