<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8" />
    <title>{{ $title ?? 'Halaman' }} - {{ config('app.name') }}</title>
    <meta content="{{ config('app.name') }}" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    @livewireStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="flex items-center justify-center h-screen bg-gray-100 dark:bg-gray-900">
    {{ $slot }}

    @livewireScriptConfig
</body>

</html>