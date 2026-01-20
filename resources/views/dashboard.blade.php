<x-app-layout>
    <style>
        .grid-bg {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(0,0,0,0.03) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(0,0,0,0.03) 1px, transparent 1px);
        }
    </style>

    <div class="min-h-screen bg-white font-sans text-slate-900 grid-bg">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" class="fixed bottom-6 right-6 z-50 bg-black text-white px-6 py-4 rounded-lg shadow-2xl flex items-center gap-4 animate-bounce-in">
                    <div class="text-green-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                    </div>
                    <div>
                        <p class="font-mono text-xs font-bold uppercase tracking-widest text-gray-400">System Message</p>
                        <p class="text-sm font-bold">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="ml-4 text-gray-500 hover:text-white"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                </div>
            @endif

            {{-- =========================== --}}
            {{--      TAMPILAN ADMIN         --}}
            {{-- =========================== --}}
            @if(auth()->user()->role == 'admin')
                
                <div class="flex flex-col md:flex-row justify-between items-end mb-10 pb-8 border-b border-gray-100">
                    <div class="space-y-4">
                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-gray-50 border border-gray-200 rounded-full">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                            <span class="font-mono text-[10px] uppercase tracking-widest text-gray-500">System Operational</span>
                        </div>
                        <h1 class="text-5xl md:text-6xl font-bold tracking-tighter leading-[0.9] text-black">
                            Dashboard <br>
                            <span class="text-gray-300">Overview.</span>
                        </h1>
                    </div>
                    <div class="text-right mt-6 md:mt-0">
                        <p class="font-mono text-xs text-gray-400 uppercase tracking-widest mb-1">Current Date</p>
                        <p class="text-xl font-bold text-black">{{ now()->format('l, d F Y') }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div class="relative overflow-hidden p-6 bg-white border border-gray-200 rounded-xl group hover:border-black transition-colors duration-300">
                        <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                        </div>
                        <span class="font-mono text-xs font-bold text-gray-400 uppercase tracking-widest">Total Assets</span>
                        <h3 class="text-5xl font-bold text-black mt-2 tracking-tighter">{{ \App\Models\Book::count() }}</h3>
                        <p class="text-sm text-gray-500 mt-2 font-medium">Books in database</p>
                    </div>

                    <div class="relative overflow-hidden p-6 bg-white border border-gray-200 rounded-xl group hover:border-black transition-colors duration-300">
                        <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>
                        </div>
                        <span class="font-mono text-xs font-bold text-gray-400 uppercase tracking-widest text-amber-600">Active Circulation</span>
                        <h3 class="text-5xl font-bold text-black mt-2 tracking-tighter">{{ \App\Models\Loan::where('status', 'borrowed')->count() }}</h3>
                        <p class="text-sm text-gray-500 mt-2 font-medium">Items currently borrowed</p>
                    </div>

                    <div class="relative overflow-hidden p-6 bg-white border border-gray-200 rounded-xl group hover:border-black transition-colors duration-300">
                        <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        </div>
                        <span class="font-mono text-xs font-bold text-gray-400 uppercase tracking-widest">Community</span>
                        <h3 class="text-5xl font-bold text-black mt-2 tracking-tighter">{{ \App\Models\User::where('role', 'user')->count() }}</h3>
                        <p class="text-sm text-gray-500 mt-2 font-medium">Registered students</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    <div class="lg:col-span-2 space-y-6">
                        <div class="flex items-center justify-between">
                            <h3 class="font-bold text-xl text-black">Recent Activity Log</h3>
                            <a href="{{ route('transactions.index') }}" class="text-xs font-bold uppercase tracking-wide text-gray-400 hover:text-black hover:underline underline-offset-4">View All</a>
                        </div>

                        <div class="border border-gray-200 rounded-xl overflow-hidden bg-white shadow-sm">
                            <table class="w-full text-left">
                                <thead class="bg-gray-50 border-b border-gray-100">
                                    <tr>
                                        <th class="px-5 py-3 font-mono text-[10px] font-bold text-gray-400 uppercase tracking-widest">Student</th>
                                        <th class="px-5 py-3 font-mono text-[10px] font-bold text-gray-400 uppercase tracking-widest">Book</th>
                                        <th class="px-5 py-3 font-mono text-[10px] font-bold text-gray-400 uppercase tracking-widest">Status</th>
                                        <th class="px-5 py-3 font-mono text-[10px] font-bold text-gray-400 uppercase tracking-widest text-right">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @php
                                        $recentLoans = \App\Models\Loan::with(['user', 'book'])->latest()->take(5)->get();
                                    @endphp
                                    
                                    @forelse($recentLoans as $loan)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-5 py-3">
                                            <span class="font-bold text-xs text-black">{{ $loan->user->nama_lengkap }}</span>
                                        </td>
                                        <td class="px-5 py-3">
                                            <span class="text-xs text-gray-600 truncate max-w-[150px] block">{{ $loan->book->title }}</span>
                                        </td>
                                        <td class="px-5 py-3">
                                            @if($loan->status == 'borrowed')
                                                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded text-[9px] font-bold bg-amber-50 text-amber-700 border border-amber-100 uppercase tracking-wide">
                                                    <span class="w-1 h-1 bg-amber-500 rounded-full"></span> Active
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded text-[9px] font-bold bg-gray-50 text-gray-500 border border-gray-200 uppercase tracking-wide">
                                                    Done
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-3 text-right">
                                            <span class="font-mono text-[10px] text-gray-400">{{ \Carbon\Carbon::parse($loan->loan_date)->diffForHumans() }}</span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="px-5 py-8 text-center text-xs text-gray-400">No recent activity.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h3 class="font-bold text-xl text-black">Quick Actions</h3>
                        
                        <div class="grid grid-cols-1 gap-4">
                            <a href="{{ route('books.create') }}" class="group flex items-center justify-between p-5 bg-black text-white rounded-xl hover:bg-gray-800 transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                <div>
                                    <h4 class="font-bold text-sm uppercase tracking-wide">Add New Book</h4>
                                    <p class="text-[10px] text-gray-400 mt-0.5 group-hover:text-gray-300">Update inventory database</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                            </a>

                            <a href="{{ route('transactions.index') }}" class="group flex items-center justify-between p-5 bg-white border border-gray-200 rounded-xl hover:border-black transition-all">
                                <div>
                                    <h4 class="font-bold text-sm uppercase tracking-wide text-black">Manage Loans</h4>
                                    <p class="text-[10px] text-gray-400 mt-0.5">Process returns & status</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300 group-hover:text-black transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                            </a>
                        </div>
                    </div>

                </div>

            {{-- =========================== --}}
            {{--      TAMPILAN SISWA         --}}
            {{-- =========================== --}}
            @else

                @php
                    $myActiveLoans = \App\Models\Loan::where('user_id', auth()->id())
                                        ->where('status', 'borrowed')
                                        ->with('book')
                                        ->get();
                    $totalHistory = \App\Models\Loan::where('user_id', auth()->id())->count();
                @endphp

                <div class="flex flex-col md:flex-row items-end justify-between mb-10 border-b border-gray-100 pb-8">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="w-2 h-2 bg-black rounded-full"></span>
                            <span class="font-mono text-xs font-medium text-gray-500 uppercase tracking-widest">Student Access</span>
                        </div>
                        <h1 class="text-4xl md:text-5xl font-bold tracking-tighter text-black mb-2">
                            Selamat Datang, <br class="hidden md:block">
                            <span class="text-gray-400">{{ explode(' ', auth()->user()->nama_lengkap)[0] }}</span>.
                        </h1>
                    </div>

                    <div class="flex gap-4 mt-6 md:mt-0">
                        <div class="text-right px-4 py-2 border-r border-gray-100 last:border-0">
                            <span class="block font-mono text-[10px] text-gray-400 uppercase tracking-widest">Pinjaman Aktif</span>
                            <span class="text-2xl font-bold {{ $myActiveLoans->count() > 0 ? 'text-black' : 'text-gray-300' }}">{{ $myActiveLoans->count() }}</span>
                        </div>
                        <div class="text-right px-4 py-2">
                            <span class="block font-mono text-[10px] text-gray-400 uppercase tracking-widest">Riwayat Baca</span>
                            <span class="text-2xl font-bold text-black">{{ $totalHistory }}</span>
                        </div>
                    </div>
                </div>

                @if($myActiveLoans->count() > 0)
                <div class="mb-12">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="w-1.5 h-1.5 bg-amber-500 rounded-full animate-pulse"></span>
                        <h3 class="font-bold text-lg text-black uppercase tracking-tight">Your Current Session</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($myActiveLoans as $loan)
                        <div class="flex items-start gap-4 p-4 border border-black bg-gray-50 rounded-lg shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-transform hover:-translate-y-1">
                            <div class="w-16 h-20 bg-gray-200 rounded border border-gray-300 overflow-hidden flex-shrink-0">
                                @if($loan->book->cover)
                                    <img src="{{ asset('storage/' . $loan->book->cover) }}" class="w-full h-full object-cover grayscale">
                                @else
                                    <div class="flex items-center justify-center h-full text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="flex-grow">
                                <h4 class="font-bold text-sm text-black leading-tight mb-1">{{ $loan->book->title }}</h4>
                                <p class="text-xs text-gray-500 mb-2">{{ $loan->book->writer }}</p>
                                
                                <div class="flex items-center gap-2">
                                    <span class="font-mono text-[10px] uppercase tracking-wide text-gray-400">Borrowed:</span>
                                    <span class="font-mono text-[10px] font-bold text-black bg-white px-2 py-0.5 border border-gray-200 rounded">
                                        {{ \Carbon\Carbon::parse($loan->loan_date)->format('d M Y') }}
                                    </span>
                                </div>
                                <div class="mt-2 text-[10px] text-amber-700 font-bold">
                                    * Hubungi Admin untuk pengembalian
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4 pt-4 border-t border-gray-100">
                    <form method="GET" action="{{ route('dashboard') }}" class="relative w-full md:w-96 group">
                        @if(request('filter'))
                            <input type="hidden" name="filter" value="{{ request('filter') }}">
                        @endif
                        
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400 group-focus-within:text-black transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul, penulis, atau penerbit..." 
                            class="block w-full p-3 pl-10 text-sm font-medium text-gray-900 bg-gray-50 border-transparent rounded-lg focus:ring-2 focus:ring-black focus:bg-gray-50 placeholder-gray-400 transition-all"
                            onchange="this.form.submit()">
                    </form>
                    
                    <div class="flex gap-2">
                        <a href="{{ route('dashboard', ['search' => request('search')]) }}" 
                           class="px-4 py-2 text-xs font-bold uppercase tracking-wide rounded-md border border-transparent transition-all
                           {{ !request('filter') ? 'bg-black text-white shadow-md' : 'bg-white text-gray-400 hover:bg-gray-50' }}">
                           All Books
                        </a>
                        
                        <a href="{{ route('dashboard', ['filter' => 'available', 'search' => request('search')]) }}" 
                           class="px-4 py-2 text-xs font-bold uppercase tracking-wide rounded-md border border-transparent transition-all
                           {{ request('filter') == 'available' ? 'bg-black text-white shadow-md' : 'bg-white text-gray-400 hover:bg-gray-50' }}">
                           Available Only
                        </a>
                    </div>
                </div>

                @if($books->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-12">
                        @foreach($books as $book)
                        <div class="group flex flex-col h-full">
                            
                            <div class="relative aspect-[3/4] mb-5 bg-gray-100 rounded-lg overflow-hidden border border-gray-100 shadow-sm transition-all duration-300 group-hover:shadow-lg group-hover:-translate-y-1">
                                @if($book->cover)
                                    <img src="{{ asset('storage/' . $book->cover) }}" class="object-cover w-full h-full grayscale group-hover:grayscale-0 transition-all duration-500 ease-in-out transform group-hover:scale-105">
                                @else
                                    <div class="flex flex-col items-center justify-center h-full text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                                        <span class="font-mono text-[10px] uppercase tracking-widest border border-gray-200 px-2 py-1 rounded">No Cover</span>
                                    </div>
                                @endif

                                <div class="absolute top-3 right-3 flex flex-col items-end gap-1">
                                    @if($book->stock > 0)
                                        <span class="bg-white/90 backdrop-blur border border-green-100 text-[9px] font-bold px-2 py-1 uppercase tracking-wider rounded text-green-800 shadow-sm">
                                            In Stock ({{ $book->stock }})
                                        </span>
                                    @else
                                        <span class="bg-black text-[9px] font-bold px-2 py-1 uppercase tracking-wider rounded text-white shadow-sm">
                                            Out of Stock
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="flex-grow flex flex-col">
                                <div class="flex justify-between items-start gap-2 mb-1">
                                    <h3 class="font-bold text-base leading-snug text-black group-hover:underline decoration-1 underline-offset-4 line-clamp-2" title="{{ $book->title }}">
                                        {{ $book->title }}
                                    </h3>
                                </div>
                                
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="font-mono text-[10px] text-gray-400 uppercase tracking-wide truncate max-w-[120px]">
                                        {{ $book->writer }}
                                    </span>
                                    <span class="w-px h-3 bg-gray-200"></span>
                                    <span class="font-mono text-[10px] text-gray-300 uppercase">
                                        {{ $book->publication_year }}
                                    </span>
                                </div>
                            </div>

                            <div class="mt-auto border-t border-gray-100 pt-4">
                                @php
                                    $alreadyBorrowed = $myActiveLoans->contains('book_id', $book->id);
                                @endphp

                                <form action="{{ route('loans.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    
                                    @if($alreadyBorrowed)
                                        <button disabled class="w-full flex items-center justify-center px-4 py-3 bg-amber-50 border border-amber-200 rounded-lg text-amber-700 cursor-not-allowed">
                                            <span class="text-xs font-bold uppercase tracking-widest">Sedang Dipinjam</span>
                                        </button>
                                    @elseif($book->stock > 0)
                                        <button class="w-full group/btn flex items-center justify-between px-4 py-3 bg-white border border-black rounded-lg hover:bg-black hover:text-white transition-all duration-300 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px]">
                                            <span class="text-xs font-bold uppercase tracking-widest">Pinjam Buku</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 transform group-hover/btn:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                        </button>
                                    @else
                                        <button disabled class="w-full flex items-center justify-center px-4 py-3 bg-gray-50 border border-gray-100 rounded-lg text-gray-400 cursor-not-allowed">
                                            <span class="text-xs font-bold uppercase tracking-widest line-through">Tidak Tersedia</span>
                                        </button>
                                    @endif
                                </form>
                            </div>

                        </div>
                        @endforeach
                    </div>

                    <div class="mt-16 flex justify-center">
                        <div class="bg-white p-2 rounded-xl border border-gray-100 shadow-sm">
                            {{ $books->links() }}
                        </div>
                    </div>

                @else
                    <div class="flex flex-col items-center justify-center py-20 text-center">
                        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <h3 class="font-bold text-lg text-slate-900">Tidak ada buku ditemukan</h3>
                        <p class="text-slate-500 text-sm mt-1">Coba kata kunci lain atau hapus filter.</p>
                        <a href="{{ route('dashboard') }}" class="mt-4 px-4 py-2 bg-black text-white text-xs font-bold rounded uppercase tracking-wider">Reset Filter</a>
                    </div>
                @endif

            @endif

        </div>
    </div>
</x-app-layout>