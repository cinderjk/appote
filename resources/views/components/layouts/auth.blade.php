<html>

<head>
    @livewireStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="flex items-center justify-center h-screen bg-gray-100 dark:bg-gray-900">
    {{ $slot }}

    @livewireScriptConfig
</body>

</html>