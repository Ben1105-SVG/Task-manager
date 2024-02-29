<template>

    <div aria-label="group of cards" tabindex="0" class="focus:outline-none py-8 w-full">
        <div class="lg:flex items-center justify-center w-full flex-wrap gap-6">
            <div class="flex justify-start w-full gap-6">
                <div class="flex flex-col justify-between">
                    <label for="min_date">Мин Дата</label>
                    <input v-model="filters.min_date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="date" id="min_date">
                </div>
                <div class="flex flex-col justify-between">
                    <label for="min_date">Мин Дата</label>
                    <input v-model="filters.max_date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="date" id="max_date">
                </div>
                <div class="flex flex-col justify-between">
                    <label for="status">Статус</label>
                    <select v-model="filters.status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="status">
                        <option value="all">Все</option>
                        <option value="todo">Todo</option>
                        <option value="backlog">Backlog</option>
                        <option value="in_progress">In progress</option>
                        <option value="in_review">In review</option>
                        <option value="closed">Closed</option>
                    </select>
                </div>
            </div>
            <template v-for="task in tasks" :key="task.id">
                <task-list-item :task="task"/>
            </template>
            <p v-if="!tasks.length">По вашим фильтрам задачи не найдены</p>
        </div>
    </div>
</template>
<script setup>
import {onMounted, computed, ref, watch} from 'vue'
import TaskListItem from './TaskListItem.vue'
import { useMainStore } from "../store";
const store = useMainStore()
const filters= ref({
    min_date: '',
    max_date: '',
    status: 'all'
})
const tasks = computed(() => store.tasks)
onMounted(() => {
    store.fetchTasks()
})
watch(filters, (newVal) => {
    store.fetchTasks(newVal)
},  { deep: true })
</script>
