<template>
    <div class="flex justify-center h-40 w-40 absolute top-0 right-0">
        <button @click="toggleDarkMode" class="hover:cursor-pointer">
            <AppIcons name="hover-change-theme" />
        </button>
    </div>
</template>

<script>
import AppIcons from "../icons/AppIcons";

export default {
    name: "ToggleDarkMode",
    components: {
        AppIcons
    },
    data () {
        return {
            darkMode: '',
        }
    },
    methods: {
      toggleDarkMode() {
          console.log('year!')
      }
    }
}
</script>
