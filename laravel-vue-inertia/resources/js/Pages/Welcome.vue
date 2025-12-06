<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
               <h1 class="text-4xl font-bold text-gray-900">Laravel 12 + Inertia + Vue</h1>
            </div>
            <div class="mt-8 flex justify-center gap-4">
                <p>PHP: {{ phpVersion }}</p>
                <p>Laravel: {{ laravelVersion }}</p>
            </div>
        </div>
    </div>
</template>