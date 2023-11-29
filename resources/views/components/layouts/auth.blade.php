<html>

<head>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8" />
    <title>{{ $title ?? 'Halaman' }} - {{ config('app.name') }}</title>
    <meta content="{{ config('app.name') }}" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    @livewireStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="grid justify-items-stretch md:flex md:items-center md:justify-center h-screen bg-gray-100 dark:bg-gray-900">
    {{ $slot }}

    @livewireScriptConfig
</body>

</html>