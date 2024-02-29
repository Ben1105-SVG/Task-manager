<template>
    <div>
        <h2 class="text-2xl text-center mb-7"><span class="capitalize">{{ action === 'update' ? 'Обновить': 'Создать' }}</span> задачу</h2>
        <form class="w-full max-w-lg mx-auto flex flex-col ">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Заголовок
                    </label>
                    <input v-model="form.title" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                    <p v-if="errors?.title" class="text-red-500 text-xs italic">{{ errors?.title[0] }}</p>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Крайний срок
                    </label>
                    <input v-model="form.deadline" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="date" placeholder="Doe">
                    <p v-if="errors?.deadline" class="text-red-500 text-xs italic">{{ errors?.deadline[0] }}</p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Описание
                    </label>
                    <textarea v-model="form.description" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" placeholder="Опишите задачу"/>
                    <p v-if="errors?.description" class="text-red-500 text-xs italic">{{ errors?.description[0] }}</p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Статус
                    </label>
                    <div class="relative">
                        <select v-model="form.status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            <option value="todo">Todo</option>
                            <option value="backlog">Backlog</option>
                            <option value="in_progress">In progress</option>
                            <option value="in_review">In review</option>
                            <option value="closed">Closed</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <button @click="doAction" class="capitalize mt-3 w-full shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                {{ action === 'update' ? 'Обновить': 'Создать' }}
            </button>
            <button v-if="isUpdate" @click="showDeleteConfirmation" class="capitalize mt-3 w-full shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                Удалить
            </button>
        </form>

    </div>
</template>
<script setup>
import Swal from 'sweetalert2'
import { computed, onMounted, ref } from "vue";
import { useRoute, useRouter } from 'vue-router';
import { useMainStore } from "../store";
const form = ref({
    id: null,
    title: null,
    description: null,
    deadline: null,
    status: 'todo'
})
const errors = ref({})
const isUpdate = computed(() => action.value === 'update')
const route = useRoute();
const router = useRouter();
const action = computed(() => route.params.action);
const store = useMainStore();
const task = computed(() => store.activeTask)
const doAction = () => {
    let methodName;
    if (isUpdate.value) {
        methodName = 'updateTask';
    } else {
        methodName = 'createTask';
    }
    store[methodName](form.value).then(res => {
        if (isUpdate.value) {
            showSuccess(res.message)
        } else {
            showSuccess(res.message)
            router.push({name: 'Tasks-list'})
        }
    }).catch((e) => {
        console.log(e)
        errors.value = e.errors
    })
}

const showDeleteConfirmation = () => {
    Swal.fire({
        title: 'Вы точно хотите удалить задачу ?',
        showConfirmButton: true,
        confirmButtonText: 'Удалить',
        cancelButtonText: 'Отменить',
        showCancelButton: true,
        icon: 'warning'
    }).then(res => {
        if (res.isConfirmed) {
            store.deleteTask(task.value.id).then(() => {
                showSuccess('Задача успешно удалена')
                router.push({name: 'Tasks-list'})
            })
        }
    })
}

const showSuccess = (message) => {
    return Swal.fire({
        title: message,
        toast: true,
        timer: 3500,
        position: 'top-end',
        showConfirmButton: false,
        icon: 'success'
    })
}
onMounted(() => {
    if (isUpdate.value) {
        store.fetchTask(route.params.id).then(() => {
            form.value.title = task.value.title
            form.value.id = task.value.id
            form.value.description = task.value.description
            form.value.deadline = task.value.deadline
            form.value.status = task.value.status
        })
    }
})
</script>
