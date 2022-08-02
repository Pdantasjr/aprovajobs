<template>
    <div class="rounded-full flex flex-col w-full my-4">
        <span :class="[baseTextColor, baseBg]" class="rounded-full px-4 py-2 text-center flex items-center justify-center border-2 w-full">
            <AppIcons v-if="status === 0" :style="'dark/30'" :name="icon"/>
            <AppIcons v-if="status === 1" :style="'info'" :name="icon"/>
            <AppIcons v-if="status === 2" :style="'danger'" :name="icon"/>
            <AppIcons v-if="status === 3" :style="'info'" :name="icon"/>
            <AppIcons v-if="status === 4" :style="'warning'" :name="icon"/>
            <AppIcons v-if="status === 5" :style="'dark/30'" :name="icon"/>
            <AppIcons v-if="status === 6" :style="'primary'" :name="icon"/>
            <AppIcons v-if="status === 7" :style="'dark/30'" :name="icon"/>
            <span :class="baseTextColor" class="mx-2 font-semibold">{{ baseText }}</span>
        </span>
        <div v-if="status === 2" class="w-full my-4 flex justify-center py-2 px-4 mx-2 text-center items-center border-2 border-line-border/30 rounded-lg">
            <span class="text-dark dark:text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aperiam assumenda corporis, deleniti dicta enim esse fugit illo illum nisi numquam optio ratione recusandae reiciendis rerum sed ullam unde vel.</span>
        </div>
    </div>
</template>

<script>
import AppIcons from "../icons/AppIcons";

export default {
    name: "AppStatus",
    props: {
        status: {
            type: Number,
            default: 1,
        },
    },
    components: {
        AppIcons
    },
    data() {
        return {
            textStatus: this.getText,
            style: 'dark/30',
        }
    },
    computed: {
        baseBg() {
            if (this.status === 0) {
                return 'border-dark/30 dark:border-light/30'
            } else if (this.status === 1) {
                return 'border-info'
            } else if (this.status === 2) {
                return 'border-danger'
            } else if (this.status === 3) {
                return 'border-info'
            } else if (this.status === 4) {
                return 'border-warning'
            } else if (this.status === 5) {
                return 'border-dark/30'
            } else if (this.status === 6) {
                return 'border-primary'
            } else {
                return 'border-dark/30 dark:border-light/30'
            }
        },
        baseText() {
            if (this.status === 0) {
                return 'Arquivado'
            } else if (this.status === 1) {
                return 'Em análise'
            } else if (this.status === 2) {
                return 'Em atraso'
            } else if (this.status === 3) {
                return 'Em produção'
            } else if (this.status === 4) {
                return 'Alteração'
            } else if (this.status === 5) {
                return 'Pendente Aprovação'
            } else if (this.status === 6) {
                return 'Aprovado'
            } else {
                return 'Concluído'
            }
        },
        baseTextColor() {
            if (this.status === 0) {
                return 'text-dark/30 dark:text-light/30'
            } else if (this.status === 1) {
                return 'text-info'
            } else if (this.status === 2) {
                return 'text-danger'
            } else if (this.status === 3) {
                return 'text-info'
            } else if (this.status === 4) {
                return 'text-warning'
            } else if (this.status === 5) {
                return 'text-dark/30'
            } else if (this.status === 6) {
                return 'text-primary'
            } else {
                return 'text-dark/30 dark:text-light/30'
            }
        },
        icon() {
            if (this.status === 0) {
                return 'status-archived'
            } else if (this.status === 1) {
                return 'status-analysis'
            } else if (this.status === 2) {
                return 'status-daley'
            } else if (this.status === 3) {
                return 'status-production'
            } else if (this.status === 4) {
                return 'status-change'
            } else if (this.status === 5) {
                return 'status-pendent'
            } else if (this.status === 6) {
                return 'status-approved'
            } else {
                return 'status-done'
            }
        }
    },
}
</script>

<!--STATUS-->

<!--0 - ARQUIVADO - dark [#27272A33] -->
<!--1 - EM ANALISE - info [#71BFF8]-->
<!--2 - EM ATRASO - danger [#F87171]-->
<!--3 - EM PRODUÇÃO - info [#71BFF8]-->
<!--4 - ALTERAÇÃO - warning [#E5BD38]-->
<!--5 - PENDENTE DE APROVAÇÃO - dark [#E5BD38]-->
<!--6 - APROVADO - primary [#10B981] -->
<!--7 - CONCLUÍDO - dark [#27272A33]-->

