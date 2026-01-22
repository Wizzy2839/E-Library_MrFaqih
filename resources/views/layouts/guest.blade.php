<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
            .bg-dots {
                background-color: #f8fafc; /* Slate-50 (Dasar Terang) */
                background-image: radial-gradient(#cbd5e1 1px, transparent 1px); /* Slate-300 (Titik) */
                background-size: 24px 24px; /* Jarak antar titik */
            }
        </style>
    </head>
    <body class="font-sans text-slate-900 antialiased bg-dots min-h-screen flex items-center justify-center p-6">
        
        {{ $slot }}

    </body>
</html>