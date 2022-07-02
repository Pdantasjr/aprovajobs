<template>
    <label class="inline-flex items-center" :for="value">
            <span class="text-base leading-4 dark:text-light font-semibold my-2 ml-6">
                <span v-if="value">{{ value }}</span>
                <span v-else><slot></slot></span>
                <sup v-if="required" class="font-medium dark:text-light/30 text-dark/30 mx-1">*</sup>
            </span>
    </label>
</template>

<script>
export default {
    name: "AppLabel",
    props: {
        value: {
            type: String,
        },
        required: {
            type: Boolean,
            default: false,
        }
    }
}
</script>

<style scoped>

</style>
