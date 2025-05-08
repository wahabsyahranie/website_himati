<!DOCTYPE html>
<html lang="en" class="h-full bg-text-primary">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css')
        <title>{{ $title ?? 'HIMA TI' }}</title>
        <x-pdf_style></x-pdf_style>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="h-full">
        {{ $slot }}
    </body>
</html>