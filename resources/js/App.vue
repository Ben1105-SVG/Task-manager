<template>
    <div>
        <header-component></header-component>
        <div class="max-w-7xl mx-auto">
            <router-view></router-view>
        </div>
    </div>
</template>
<script setup>
    import HeaderComponent from '@/components/HeaderComponent.vue'
</script>
