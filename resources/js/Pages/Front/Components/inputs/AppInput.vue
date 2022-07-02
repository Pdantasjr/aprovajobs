<template>
    <div class="flex flex-col my-2">
        <input
            :id="label"
            :name="name"
            @input="$emit('update:modelValue', $event.target.value)"
            class="h-12 sm:h-16 dark:bg-dark bg-light rounded-full transition duration-75 focus:border-primary focus:ring-1 active:outline-4 dark:text-light text-dark text-lg font-semibold px-8"
            :type="type"
            :required="required"
            :autofocus="autofocus"
        >
    </div>
</template>

<script>
export default {
    name: "AppInput",
    props: {
        label: {
            type: String,
            default: "[Label name]"
        },
        required: {
            type: Boolean,
            default: false,
        },
        autofocus: {
            type: Boolean,
            default: false,
        },
        type: {
            type: String,
            default: "text",
        },
        name: {
            type: String,
            default: "inputName"
        }
    },
    emits: ['update:modelValue'],
}
</script>
