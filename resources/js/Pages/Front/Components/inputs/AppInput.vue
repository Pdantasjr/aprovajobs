<template>
    <div class="flex flex-col my-2">
        <label class="inline-flex items-center" for="name">
            <span class="text-base leading-4 dark:text-light font-semibold my-2 ml-6">
                Nome
                <sup class="font-medium dark:text-light/30 text-dark/30">*</sup>
            </span>
        </label>
        <input id="name" class="h-12 sm:h-16 dark:bg-dark bg-light rounded-full transition duration-75 focus:border-primary focus:ring-1 active:outline-4 dark:text-light text-dark text-lg font-semibold px-8" type="text">
    </div>
</template>

<script>
export default {
    name: "AppInput",
    components: {}

}
</script>

<style scoped>

</style>
