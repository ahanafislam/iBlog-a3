<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans">
    <x-partials.navbar></x-partials.navbar>
    <main>
        {{ $slot }}
    </main>
    <x-partials.footer></x-partials.footer>
</body>
</html>
