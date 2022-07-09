<template>
    <select
        :name="name"
        :id="id"
        :required="required"
        @input="$emit('update:modelValue', $event.target.value)"
        class="h-12 dark:bg-dark bg-light rounded-full transition duration-75 focus:border-primary focus:ring-1 active:outline-4 dark:text-light text-dark text-sm px-6"
    >
        <option selected disabled>Nenhuma categoria selecionada</option>
        <option value="instagram" class="tracking-widest font-bold p-2 border-2 border-line-border/30">Instagram</option>
        <option value="Impresso">Impresso</option>
        <option value="blog">Blog</option>
        <option value="adm">Google Ads</option>
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
        name: String,
        id: String,
    },
    emits: ['update:modelValue'],
}
</script>

<style scoped>

</style>
