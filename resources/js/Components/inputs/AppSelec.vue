<template>
    <select
        :name="name"
        :id="id"
        :required="required"
        @input="$emit('update:modelValue', $event.target.value)"
        class="h-12 dark:bg-dark bg-light rounded-full transition duration-75 focus:border-primary focus:ring-1 active:outline-4 dark:text-light text-dark text-sm px-6"
    >
        <option selected disabled>Nenhuma categoria selecionada</option>
        <option v-for="opt in options" :value="opt.id" class="tracking-widest p-2 border-2 border-line-border/30">{{ opt.name }}</option>
    </select>
</template>

<script>
export default {
    name: "AppSelec",
    props: {
        required: {
            type: Boolean,
            default: false,
        },
        options: Array,
        name: String,
        id: String,
    },
    emits: ['update:modelValue'],
}
</script>

<style scoped>

</style>
