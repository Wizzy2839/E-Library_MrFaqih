<x-app-layout>
    <style>
        /* Background Dot Pattern (Sama dengan Admin) */
        .bg-dots {
            background-color: #f8fafc;
            background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
            background-size: 24px 24px;
        }
        /* Hide Scrollbar */
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    <div class="min-h-screen font-sans text-slate-900 bg-dots">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
            
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" class="fixed bottom-6 right-6 left-6 md:left-auto z-50 bg-slate-900 text-white px-5 py-4 rounded-xl shadow-2xl flex items-center gap-4 animate-bounce-in border border-slate-700">
                    <div class="text-green-400 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                    </div>
                    <div class="flex-grow">
                        <p class="font-mono text-[10px] font-bold uppercase tracking-widest text-slate-400">System Message</p>
                        <p class="text-sm font-bold">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="text-slate-500 hover:text-white"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                </div>
            @endif

            <div class="bg-white border border-slate-200 rounded-2xl p-6 md:p-8 mb-10 shadow-sm relative overflow-hidden">
                <div class="absolute -right-10 -top-10 w-64 h-64 bg-slate-50 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-end justify-between gap-8">
                    <div class="w-full lg:w-auto">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="w-2 h-2 bg-slate-900 rounded-full animate-pulse"></span>
                            <span class="font-mono text-[10px] md:text-xs font-bold text-slate-500 uppercase tracking-widest">Student Access</span>
                        </div>
                        <h1 class="text-3xl md:text-5xl font-bold tracking-tight text-slate-900 leading-tight">
                            Selamat Pagi, <br class="hidden md:block">
                            <span class="text-slate-400">{{ explode(' ', auth()->user()->nama_lengkap)[0] }}</span>.
                        </h1>
                    </div>

                    <div class="grid grid-cols-2 w-full lg:w-auto gap-4">
                        <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl group hover:border-slate-300 transition-all">
                            <span class="block font-mono text-[9px] font-bold text-slate-400 uppercase tracking-widest mb-1 group-hover:text-amber-600 transition-colors">Pinjaman Aktif</span>
                            <span class="text-2xl md:text-3xl font-bold text-slate-900">{{ $myActiveLoans->count() }}</span>
                        </div>
                        <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl group hover:border-slate-300 transition-all">
                            <span class="block font-mono text-[9px] font-bold text-slate-400 uppercase tracking-widest mb-1">Riwayat Baca</span>
                            <span class="text-2xl md:text-3xl font-bold text-slate-900">{{ $totalHistory }}</span>
                        </div>
                    </div>
                </div>
            </div>

            @if($myActiveLoans->count() > 0)
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-5 px-1">
                    <span class="relative flex h-3 w-3">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-500"></span>
                    </span>
                    <h3 class="font-bold text-lg text-slate-900 uppercase tracking-tight">Sedang Dipinjam</h3>
                </div>
                
                <div class="flex flex-nowrap overflow-x-auto md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 pb-6 md:pb-0 -mx-4 px-4 md:mx-0 md:px-0 snap-x snap-mandatory scroll-smooth hide-scrollbar">
                    @foreach($myActiveLoans as $loan)
                    <div class="flex-none w-[85vw] md:w-auto snap-center flex items-start gap-4 p-5 bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-md hover:border-slate-300 transition-all relative group">
                        
                        <div class="absolute -right-2 -bottom-6 text-9xl font-bold text-slate-50 opacity-50 pointer-events-none select-none z-0 group-hover:text-slate-100 transition-colors">
                            {{ $loop->iteration }}
                        </div>

                        <div class="relative z-10 w-16 h-24 md:w-20 md:h-28 bg-slate-100 rounded-lg border border-slate-200 overflow-hidden flex-shrink-0 shadow-sm">
                            @if($loan->book->cover)
                                <img src="{{ asset('storage/' . $loan->book->cover) }}" class="w-full h-full object-cover">
                            @else
                                <div class="flex items-center justify-center h-full text-slate-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                                </div>
                            @endif
                        </div>

                        <div class="flex-grow min-w-0 relative z-10 flex flex-col h-full justify-between">
                            <div>
                                <h4 class="font-bold text-sm md:text-base text-slate-900 leading-snug mb-1 line-clamp-2">{{ $loan->book->title }}</h4>
                                <p class="text-xs text-slate-500 line-clamp-1">{{ $loan->book->writer }}</p>
                            </div>
                            
                            <div class="mt-3">
                                <div class="inline-flex items-center gap-2 px-2 py-1 bg-slate-50 border border-slate-200 rounded text-[10px] font-mono text-slate-500 mb-2">
                                    <span>Dipinjam:</span>
                                    <span class="font-bold text-slate-900">{{ \Carbon\Carbon::parse($loan->loan_date)->format('d M') }}</span>
                                </div>
                                <div class="flex items-center gap-1.5 text-amber-600">
                                    <span class="text-[10px] font-bold uppercase tracking-wide bg-amber-50 px-2 py-0.5 rounded border border-amber-100">Wajib Kembali</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="sticky top-16 md:top-20 z-30 -mx-4 px-4 md:mx-0 md:px-0 mb-8">
                <div class="bg-white/80 backdrop-blur-md border border-slate-200/60 p-4 rounded-2xl shadow-sm flex flex-col md:flex-row gap-4 justify-between items-center">
                    
                    <form method="GET" action="{{ route('dashboard') }}" class="relative w-full md:w-80 group">
                        @if(request('category')) 
                            <input type="hidden" name="category" value="{{ request('category') }}"> 
                        @endif
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-slate-400 group-focus-within:text-slate-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul buku..." 
                               class="block w-full p-2.5 pl-10 text-sm bg-slate-50 border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-slate-900 focus:border-transparent transition-all placeholder-slate-400" 
                               onchange="this.form.submit()">
                    </form>

                    <div class="w-full md:w-auto overflow-x-auto pb-1 hide-scrollbar">
                        <div class="flex gap-2">
                            <a href="{{ route('dashboard', ['search' => request('search')]) }}" 
                               class="flex-shrink-0 px-4 py-2 text-[11px] font-bold uppercase tracking-wider rounded-xl border transition-all whitespace-nowrap
                               {{ !request('category') ? 'bg-slate-900 text-white border-slate-900 shadow-md' : 'bg-white text-slate-500 border-slate-200 hover:border-slate-400 hover:text-slate-900' }}">
                               All
                            </a>
                            
                            @foreach($categories as $cat)
                                <a href="{{ route('dashboard', ['category' => $cat->slug, 'search' => request('search')]) }}" 
                                   class="flex-shrink-0 px-4 py-2 text-[11px] font-bold uppercase tracking-wider rounded-xl border transition-all whitespace-nowrap
                                   {{ request('category') == $cat->slug ? 'bg-slate-900 text-white border-slate-900 shadow-md' : 'bg-white text-slate-500 border-slate-200 hover:border-slate-400 hover:text-slate-900' }}">
                                   {{ $cat->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            @if($books->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-8 md:gap-x-6 md:gap-y-10">
                    @foreach($books as $book)
                    <div class="group flex flex-col h-full bg-white border border-slate-200 rounded-2xl p-3 hover:border-slate-300 hover:shadow-md transition-all duration-300">
                        
                        <div class="relative aspect-[3/4] mb-3 bg-slate-100 rounded-xl overflow-hidden shadow-inner">
                            @if($book->cover)
                                <img src="{{ asset('storage/' . $book->cover) }}" class="object-cover w-full h-full grayscale group-hover:grayscale-0 transition-all duration-500">
                            @else
                                <div class="flex flex-col items-center justify-center h-full text-slate-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                                </div>
                            @endif
                            
                            <div class="absolute top-2 right-2">
                                @if($book->stock > 0)
                                    <span class="bg-white/90 backdrop-blur border border-green-200 text-[9px] font-bold px-2 py-1 uppercase tracking-wide rounded-lg text-green-700 shadow-sm">
                                        Stock: {{ $book->stock }}
                                    </span>
                                @else
                                    <span class="bg-slate-900/90 backdrop-blur text-[9px] font-bold px-2 py-1 uppercase tracking-wide rounded-lg text-white shadow-sm">Empty</span>
                                @endif
                            </div>
                        </div>

                        <div class="flex-grow flex flex-col px-1">
                            <h3 class="font-bold text-sm md:text-base text-slate-900 leading-snug mb-1 line-clamp-2 group-hover:text-blue-600 transition-colors" title="{{ $book->title }}">{{ $book->title }}</h3>
                            <div class="flex items-center gap-2 text-xs text-slate-500 mb-4">
                                <span class="truncate max-w-[100px]">{{ $book->writer }}</span>
                                <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                <span class="font-mono text-slate-400">{{ $book->publication_year }}</span>
                            </div>
                        </div>

                        <div class="mt-auto">
                            <form action="{{ route('loans.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                @if($myActiveLoans->contains('book_id', $book->id))
                                    <button disabled class="w-full flex items-center justify-center gap-2 px-3 py-2.5 bg-amber-50 border border-amber-200 rounded-xl text-amber-700 cursor-not-allowed">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        <span class="text-xs font-bold uppercase tracking-widest">Dipinjam</span>
                                    </button>
                                @elseif($book->stock > 0)
                                    <button class="w-full group/btn flex items-center justify-between px-4 py-2.5 bg-slate-900 text-white rounded-xl hover:bg-black transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5">
                                        <span class="text-xs font-bold uppercase tracking-widest">Pinjam</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover/btn:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                    </button>
                                @else
                                    <button disabled class="w-full flex items-center justify-center px-4 py-2.5 bg-slate-100 border border-slate-200 rounded-xl text-slate-400 cursor-not-allowed">
                                        <span class="text-xs font-bold uppercase tracking-widest">Habis</span>
                                    </button>
                                @endif
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="mt-12 md:mt-16 flex justify-center">
                    <div class="bg-white p-2 rounded-xl border border-slate-200 shadow-sm w-full md:w-auto overflow-x-auto">
                        {{ $books->links() }}
                    </div>
                </div>
            @else
                <div class="flex flex-col items-center justify-center py-20 text-center border-2 border-dashed border-slate-200 rounded-3xl bg-white">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4 shadow-sm border border-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="font-bold text-lg text-slate-900">Buku tidak ditemukan</h3>
                    <p class="text-slate-500 text-sm mt-1 mb-6">Coba kata kunci lain atau pilih kategori berbeda.</p>
                    <a href="{{ route('dashboard') }}" class="px-6 py-2.5 bg-slate-900 text-white text-xs font-bold rounded-xl uppercase tracking-wider hover:bg-black transition-colors shadow-lg shadow-slate-900/20">
                        Reset Filter
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>