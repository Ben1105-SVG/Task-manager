<template>
    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                </a>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <router-link :to="{name: 'Home'}" class="text-sm font-semibold leading-6 text-gray-900">Главная</router-link>
                <router-link :to="{name: 'Tasks-list'}" class="text-sm font-semibold leading-6 text-gray-900">Все задачи</router-link>
                <router-link :to="{name: 'Task-action', params: {action: 'create'}}" class="text-sm font-semibold leading-6 text-gray-900">Создать задачу</router-link>
            </div>
        </nav>
    </header>

</template>
