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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 dark:bg-gray-800">
    <div class="min-h-screen bg-white dark:bg-gray-900">
        @include('layouts.admin.navigation')
        <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900 relative">
            @include('layouts.admin.sidebar')
            <div id="main-content"
                class="relative w-full h-full overflow-y-auto bg-gray-50 md:ml-64 sm:ml-64 dark:bg-gray-900 ml-0">
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>

</html>
