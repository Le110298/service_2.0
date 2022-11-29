<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Grafi from '@/Pages/Graficos.vue';
</script>

<template class="bg-slate-400">
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header >
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
            <Grafi/>
        </template>
    </AuthenticatedLayout>

</template>
