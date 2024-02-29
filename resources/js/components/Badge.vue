<template>
    <div class="p-1 rounded" :class="classByStatus">
        {{ titleByStatus }}
    </div>
</template>
<script setup>
import { computed } from "vue";

const props = defineProps({
    status: {
        required: true,
        type: String
    }
})

const titleByStatus = computed(() => {
    switch (props.status) {
        case 'todo':
            return 'Todo'
        case 'backlog':
            return 'Backlog'
        case 'in_progress':
            return 'In progress'
        case 'in_review':
            return 'In review'
        case 'closed':
            return 'Closed'
        default:
            return 'Todo'
    }
});

const classByStatus = computed(() => {
    switch (props.status) {
        case 'todo':
            return 'bg-yellow-400'
        case 'backlog':
            return 'bg-slate-400'
        case 'in_progress':
            return 'bg-blue-400'
        case 'in_review':
            return 'bg-purple-400'
        case 'closed':
            return 'bg-green-400'
        default:
            return 'Todo'
    }
});
</script>
