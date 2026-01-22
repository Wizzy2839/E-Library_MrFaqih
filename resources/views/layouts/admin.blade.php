<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Lib_OS Admin') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Inter', sans-serif; }
            
            /* Background Dot Pattern Halus */
            .bg-dots {
                background-color: #f1f5f9; /* Slate-100 (Lebih gelap dikit dari login biar kontras sama kartu) */
                background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
                background-size: 24px 24px;
            }

            /* Scrollbar Halus */
            ::-webkit-scrollbar { width: 6px; height: 6px; }
            ::-webkit-scrollbar-track { background: transparent; }
            ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
            ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        </style>
    </head>
    <body class="font-sans antialiased text-slate-900 bg-dots" x-data="{ sidebarOpen: false }">
        
        @include('layouts.partials.admin-sidebar')

        <div class="lg:pl-64 flex flex-col min-h-screen transition-all duration-300">
            
            @include('layouts.partials.admin-topbar')

            <main class="flex-1 p-6 lg:p-10">
                {{ $slot }}
            </main>

        </div>

        <div x-show="sidebarOpen" 
             @click="sidebarOpen = false"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/50 z-40 lg:hidden">
        </div>

    </body>
</html>