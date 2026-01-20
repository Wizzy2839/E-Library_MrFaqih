<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lib_OS | Sistem Perpustakaan Modern</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=jetbrains-mono:400,500" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif

        <style>
            body { font-family: 'Instrument Sans', sans-serif; }
            .font-mono { font-family: 'JetBrains Mono', monospace; }
            /* Pola Grid Halus di Background */
            .grid-bg {
                background-size: 40px 40px;
                background-image: linear-gradient(to right, rgba(0,0,0,0.03) 1px, transparent 1px),
                                  linear-gradient(to bottom, rgba(0,0,0,0.03) 1px, transparent 1px);
            }
        </style>
    </head>
    <body class="bg-white text-slate-900 antialiased grid-bg min-h-screen flex flex-col">

        <header class="w-full py-6 px-6 lg:px-12 flex items-center justify-between border-b border-gray-100 bg-white/80 backdrop-blur-sm fixed top-0 z-50">
            <div class="flex items-center gap-3">
                <svg class="h-8 w-auto text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.201912 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319091 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257708 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257708 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V8.10652C35.9355 7.90123 35.887 7.69918 35.7948 7.51933C35.7026 7.33949 35.5698 7.18765 35.4089 7.07817L23.4296 0.17765C23.238 0.0666497 23.0181 0.00755913 22.7963 0.00755913C22.5745 0.00755913 22.3546 0.0666497 22.163 0.17765L13.4763 5.17794L4.78964 0.17765C4.59806 0.0666497 4.37813 0.00755913 4.15631 0.00755913C3.93448 0.00755913 3.71456 0.0666497 3.52297 0.17765L0.999243 1.62937L0.995504 1.63311C0.68533 1.815 0.493745 2.14633 0.493745 2.50682V49.1337C0.493745 49.339 0.542261 49.541 0.634458 49.7209C0.726656 49.9007 0.859424 50.0526 1.02029 50.162L24.9573 63.9549C25.1489 64.0659 25.3688 64.125 25.5906 64.125C25.8124 64.125 26.0323 64.0659 26.2239 63.9549L50.1609 50.162C50.3218 50.0526 50.4545 49.9007 50.5467 49.7209C50.6389 49.541 50.6874 49.339 50.6874 49.1337V36.9332L61.3901 30.7663C61.7003 30.5844 61.8919 30.2531 61.8919 29.8926V14.8858C61.8921 14.799 61.8797 14.7126 61.8548 14.6253ZM30.9472 59.9865L6.03222 45.6322V17.7712L30.9472 32.1255V59.9865ZM55.9167 45.6322L36.9189 56.5772V32.1255L6.90382 14.8322L30.9472 0.985443L55.9167 15.3675V45.6322Z" fill="currentColor"/>
                </svg>
                
                <div class="flex flex-col">
                    <span class="font-bold text-sm tracking-tight leading-none text-black">Lib_OS</span>
                    <span class="font-mono text-[9px] text-gray-400 uppercase tracking-widest leading-none mt-0.5">System v2</span>
                </div>
            </div>

            @if (Route::has('login'))
                <nav class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-xs font-bold uppercase tracking-wide hover:underline underline-offset-4">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-xs font-bold uppercase tracking-wide text-gray-500 hover:text-black transition-colors">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 bg-black text-white text-xs font-bold uppercase tracking-wide rounded-md hover:bg-gray-800 transition-colors shadow-sm">
                                Daftar
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="flex-grow flex items-center justify-center pt-24 pb-12 px-6">
            <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                <div class="space-y-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-50 border border-gray-200 rounded-full">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                        <span class="font-mono text-[10px] uppercase tracking-widest text-gray-500">Sistem Operasional</span>
                    </div>

                    <h1 class="text-5xl lg:text-7xl font-bold tracking-tighter leading-[0.9] text-black">
                        Kelola <span class="text-gray-300">Wawasan.</span> <br>
                        Tanpa Batas.
                    </h1>

                    <p class="text-lg text-gray-500 max-w-md leading-relaxed">
                        Sistem perpustakaan modern yang minimalis, dirancang untuk generasi pembelajar masa depan. Pantau koleksi, kelola peminjaman, dan jelajahi pengetahuan tanpa hambatan.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-flex justify-center items-center px-8 py-4 bg-black text-white font-bold rounded-lg hover:bg-gray-900 transition-all group">
                                Buka Dashboard
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-flex justify-center items-center px-8 py-4 bg-black text-white font-bold rounded-lg hover:bg-gray-900 transition-all group shadow-lg hover:shadow-xl hover:-translate-y-1">
                                Akses Perpustakaan
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                            </a>
                            <a href="#" class="inline-flex justify-center items-center px-8 py-4 border border-gray-200 text-black font-bold rounded-lg hover:bg-gray-50 transition-all">
                                Pelajari Fitur
                            </a>
                        @endauth
                    </div>

                    <div class="flex items-center gap-8 pt-8 border-t border-gray-100">
                        <div>
                            <span class="block text-2xl font-bold text-black">{{ \App\Models\Book::count() }}+</span>
                            <span class="text-xs font-mono uppercase text-gray-400">Koleksi Buku</span>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold text-black">{{ \App\Models\User::count() }}+</span>
                            <span class="text-xs font-mono uppercase text-gray-400">Anggota Aktif</span>
                        </div>
                    </div>
                </div>

                <div class="relative hidden lg:block">
                    <div class="absolute -top-20 -right-20 w-96 h-96 bg-gray-100 rounded-full filter blur-3xl opacity-50 animate-pulse"></div>
                    
                    <div class="relative z-10">
                        <div class="absolute top-8 left-8 w-full h-[500px] bg-gray-100 rounded-2xl border border-gray-200 transform rotate-6"></div>
                        <div class="absolute top-4 left-4 w-full h-[500px] bg-white rounded-2xl border border-gray-200 shadow-sm transform rotate-3"></div>
                        <div class="relative w-full h-[500px] bg-white rounded-2xl border border-gray-200 shadow-2xl p-8 flex flex-col justify-between overflow-hidden">
                            <div>
                                <div class="flex items-center justify-between mb-8">
                                    <div class="w-12 h-12 bg-black rounded-lg"></div>
                                    <div class="w-8 h-2 bg-gray-200 rounded"></div>
                                </div>
                                <div class="space-y-4">
                                    <div class="h-4 bg-gray-100 rounded w-3/4"></div>
                                    <div class="h-4 bg-gray-100 rounded w-1/2"></div>
                                    <div class="h-32 bg-gray-50 rounded-xl mt-6 border border-gray-100"></div>
                                    <div class="grid grid-cols-2 gap-4 mt-4">
                                        <div class="h-20 bg-gray-50 rounded-xl border border-gray-100"></div>
                                        <div class="h-20 bg-gray-50 rounded-xl border border-gray-100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8 flex items-center justify-between pt-6 border-t border-gray-100">
                                <div class="h-3 w-24 bg-gray-200 rounded"></div>
                                <div class="h-8 w-24 bg-black rounded"></div>
                            </div>
                            
                            <div class="absolute bottom-8 right-8 bg-red-600 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg animate-bounce">
                                Live System v2.0
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <footer class="w-full py-6 px-6 lg:px-12 border-t border-gray-100 bg-white text-center sm:text-left flex flex-col sm:flex-row justify-between items-center gap-4">
            <p class="text-xs text-gray-400 font-mono">
                &copy; {{ date('Y') }} Lib_OS System. Hak Cipta Dilindungi.
            </p>
            <div class="flex gap-4">
                <a href="#" class="text-xs text-gray-400 hover:text-black transition-colors">Privasi</a>
                <a href="#" class="text-xs text-gray-400 hover:text-black transition-colors">Syarat & Ketentuan</a>
                <a href="#" class="text-xs text-gray-400 hover:text-black transition-colors">Kontak</a>
            </div>
        </footer>

    </body>
</html>