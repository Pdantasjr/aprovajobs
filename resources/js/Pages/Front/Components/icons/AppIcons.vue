<template>
    <svg v-if="name === 'login'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:text-light text-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
    <svg v-else-if="name === 'return'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:text-light text-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" /></svg>
    <svg v-else-if="name === 'enter'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-light text-dark" fill="none" viewBox="0 0 18 15" stroke="currentColor" stroke-width="2"><path d="M5 9L9 5M9 5L13 9M9 5L9 14M5 14L4 14C3.20435 14 2.44129 13.6839 1.87868 13.1213C1.31607 12.5587 1 11.7956 1 11L1 4C1 3.20435 1.31607 2.44129 1.87868 1.87868C2.44129 1.31607 3.20435 0.999999 4 0.999999L14 1C14.7956 1 15.5587 1.31607 16.1213 1.87868C16.6839 2.44129 17 3.20435 17 4L17 11C17 11.7956 16.6839 12.5587 16.1213 13.1213C15.5587 13.6839 14.7956 14 14 14L13 14" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
</template>

<script>
export default {
    props: {
        name: String,
    },
}
</script>
