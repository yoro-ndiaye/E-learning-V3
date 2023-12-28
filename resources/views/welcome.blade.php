<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body >





<div class="flex container mx-auto justify-center bg-gray-700 mt-24 pl-5 pr-5 pb-11 rounded-sm rounded-3xl">
    <div class="w-1/2 text-gray-900 dark:text-gray-100 first-line: pt-20 m-4">

            <!-- Formulaire pour ajouter un domaine -->
            <img src="{{ asset('img/acc.jpg') }}" alt="Image" class="">






    </body>
</html>
