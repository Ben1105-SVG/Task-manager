<template>
    <div tabindex="0" aria-label="card 1" class="focus:outline-none lg:w-full lg:mb-0 mb-7 bg-white dark:bg-gray-800  p-6 shadow rounded">
        <div class="flex items-center border-b border-gray-200 dark:border-gray-700  pb-6">
            <div class="flex items-start justify-between w-full">
                <div class="pl-3 flex-1">
                    <p tabindex="0" class="focus:outline-none text-xl font-medium leading-5 text-gray-800 dark:text-white ">{{ task.title }}</p>
                    <p tabindex="0" class="focus:outline-none text-sm leading-normal pt-2 text-gray-500 dark:text-gray-200 ">{{ task.deadline }}</p>
                </div>
                <div role="img" aria-label="bookmark">
                    <badge :status="task.status"/>
                </div>
            </div>
        </div>
        <div class="px-2">
            <p tabindex="0" class="break-all focus:outline-none text-sm leading-5 py-4 text-gray-600 dark:text-gray-200 ">{{ task.description }}</p>
        </div>

        <router-link :to="{name: 'Task-action', params: {id: task.id, action: 'update'}}" class="capitalize mt-3 w-full shadow bg-yellow-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >
            Обновить
        </router-link>
    </div>
</template>
<script setup>
import Badge from '@/components/Badge.vue'
defineProps({
    task: {
        required: true,
        type: Object
    }
})
</script>
