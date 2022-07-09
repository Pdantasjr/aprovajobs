<template>
    <div class="flex flex-col my-2">
        <textarea
            :required="required"
            :name="name"
            :id="id"
            @input="$emit('update:modelValue', $event.target.value)"
            class="h-32 sm:h-36 dark:bg-dark bg-light rounded-2xl text-lg transition duration-75 focus:border-primary focus:ring-1 active:outline-4 dark:text-light text-dark text-lg font-semibold px-6"
        >
        </textarea>
    </div>
</template>

<script>
export default {
    name: "AppTextArea",
    props: {
        required: {
            type: Boolean,
            default: false,
        },
        name: String,
        id: String,
    },
    emits: ['update:modelValue'],
}
</script>

<style scoped>

</style>
