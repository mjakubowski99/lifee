<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-c-background">
<head>
    @include('partials.head')
    @livewireStyles
</head>
<body class="min-h-screen bg-white" style="background: linear-gradient(90deg, rgba(42, 42, 64, 0.8) 0%, rgba(38, 38, 38, 0.7) 100%);">
    {{ $slot }}
    @livewireScripts
</body>
</html>
