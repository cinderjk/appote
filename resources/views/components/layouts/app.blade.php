<html>

<head>
    <!-- ... -->
    @livewireStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    app
    {{ $slot }}

    @livewireScriptConfig
</body>

</html>