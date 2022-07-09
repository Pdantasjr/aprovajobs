<template>
    <div class="flex flex-col w-full my-2">
        <input
            :id="id"
            :name="name"
            @input="$emit('update:modelValue', $event.target.value)"
            class="h-12 dark:bg-dark bg-light rounded-full mr-2 border border-line-border transition duration-75 focus:border-primary focus:ring-1 active:outline-4 dark:text-light text-dark text-lg font-semibold px-8"
            :type="type"
            :required="required"
            :autofocus="autofocus"
            placeholder="Pesquisa"
        >
    </div>
</template>

<script>
export default {
    name: "AppInputSearch",
    props: {
        id: String,
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
