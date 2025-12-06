<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <h1 class="text-4xl font-bold text-gray-900">Laravel 12 + Docker + Alpine</h1>
                <p class="mt-4 text-gray-600">Environment: {{ app()->environment() }}</p>
                <div class="mt-4" x-data="{ count: 0 }">
                    <button @click="count++" class="px-4 py-2 bg-blue-500 text-white rounded">Alpine Counter: <span x-text="count"></span></button>
                </div>
            </div>
        </div>
    </body>
</html>