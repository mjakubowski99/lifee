<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-c-background">
<head>
    @include('partials.head')
    @livewireStyles
</head>
<body class="min-h-screen bg-white dark:bg-c-background">
    {{ $slot }}
    @livewireScripts
</body>
</html>
