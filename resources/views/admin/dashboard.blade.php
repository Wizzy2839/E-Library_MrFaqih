<x-admin-layout>
    
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" class="fixed bottom-6 right-6 z-50 bg-slate-900 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-4 animate-bounce-in border border-slate-700">
            <div class="text-green-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
            </div>
            <div>
                <p class="font-mono text-[10px] font-bold uppercase tracking-widest text-slate-400">System Notification</p>
                <p class="text-sm font-bold">{{ session('success') }}</p>
            </div>
            <button @click="show = false" class="ml-4 text-slate-500 hover:text-white"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
        </div>
    @endif

    <div class="bg-white border border-slate-200 rounded-2xl p-6 mb-8 shadow-sm relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-64 h-64 bg-slate-50 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col md:flex-row justify-between items-end gap-4">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-slate-50 border border-slate-200 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                    <span class="font-mono text-[10px] uppercase tracking-widest text-slate-500">System Operational</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-slate-900 leading-tight">
                    Dashboard <span class="text-slate-300">Overview.</span>
                </h1>
            </div>
            <div class="text-right">
                <p class="font-mono text-xs text-slate-400 uppercase tracking-widest mb-1">Today's Date</p>
                <p class="text-xl font-bold text-slate-900">{{ now()->format('l, d F Y') }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="relative overflow-hidden p-6 bg-white border border-slate-200 rounded-2xl hover:border-slate-300 transition-all duration-300 shadow-sm group">
            <div class="flex justify-between items-start">
                <div>
                    <span class="font-mono text-xs font-bold text-slate-400 uppercase tracking-widest">Total Books</span>
                    <h3 class="text-4xl font-bold text-slate-900 mt-2 tracking-tight">{{ \App\Models\Book::count() }}</h3>
                    <p class="text-sm text-slate-500 mt-1">Titles in inventory</p>
                </div>
                <div class="p-3 bg-slate-50 rounded-xl group-hover:bg-slate-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-400 group-hover:text-slate-900" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                </div>
            </div>
        </div>

        <div class="relative overflow-hidden p-6 bg-white border border-slate-200 rounded-2xl hover:border-slate-300 transition-all duration-300 shadow-sm group">
            <div class="flex justify-between items-start">
                <div>
                    <span class="font-mono text-xs font-bold text-amber-600 uppercase tracking-widest">Active Loans</span>
                    <h3 class="text-4xl font-bold text-slate-900 mt-2 tracking-tight">{{ \App\Models\Loan::where('status', 'borrowed')->count() }}</h3>
                    <p class="text-sm text-slate-500 mt-1">Books currently out</p>
                </div>
                <div class="p-3 bg-amber-50 rounded-xl group-hover:bg-amber-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
            </div>
        </div>

        <div class="relative overflow-hidden p-6 bg-white border border-slate-200 rounded-2xl hover:border-slate-300 transition-all duration-300 shadow-sm group">
            <div class="flex justify-between items-start">
                <div>
                    <span class="font-mono text-xs font-bold text-slate-400 uppercase tracking-widest">Students</span>
                    <h3 class="text-4xl font-bold text-slate-900 mt-2 tracking-tight">{{ \App\Models\User::where('role', 'user')->count() }}</h3>
                    <p class="text-sm text-slate-500 mt-1">Registered accounts</p>
                </div>
                <div class="p-3 bg-slate-50 rounded-xl group-hover:bg-slate-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-400 group-hover:text-slate-900" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 space-y-6">
            <div class="flex items-center justify-between px-1">
                <h3 class="font-bold text-lg text-slate-900">Recent Activity Log</h3>
                <a href="{{ route('transactions.index') }}" class="text-xs font-bold uppercase tracking-wide text-slate-400 hover:text-slate-900 hover:underline underline-offset-4 transition-colors">View All</a>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest">Student</th>
                            <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest">Book</th>
                            <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest">Status</th>
                            <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest text-right">Time</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @php
                            $recentLoans = \App\Models\Loan::with(['user', 'book'])->latest()->take(5)->get();
                        @endphp
                        
                        @forelse($recentLoans as $loan)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-8 w-8 rounded-full bg-slate-900 text-white flex items-center justify-center font-bold text-[10px]">
                                        {{ substr($loan->user->nama_lengkap, 0, 1) }}
                                    </div>
                                    <span class="font-bold text-xs text-slate-900">{{ $loan->user->nama_lengkap }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs text-slate-600 font-medium truncate max-w-[150px] block" title="{{ $loan->book->title }}">
                                    {{ $loan->book->title }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($loan->status == 'borrowed')
                                    <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-100 uppercase tracking-wide">
                                        <span class="w-1.5 h-1.5 bg-amber-500 rounded-full animate-pulse"></span> Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md text-[10px] font-bold bg-slate-50 text-slate-500 border border-slate-200 uppercase tracking-wide">
                                        Done
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="font-mono text-[10px] text-slate-400">{{ \Carbon\Carbon::parse($loan->loan_date)->diffForHumans() }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-slate-400 flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <span class="text-xs">No recent activity found.</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-6">
            <h3 class="font-bold text-lg text-slate-900 px-1">Quick Actions</h3>
            <div class="flex flex-col gap-4">
                
                <a href="{{ route('books.create') }}" class="group relative overflow-hidden p-6 bg-slate-900 rounded-2xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    </div>
                    <div class="relative z-10">
                        <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center mb-4 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                        </div>
                        <h4 class="font-bold text-white text-lg">Add Book</h4>
                        <p class="text-slate-400 text-xs mt-1">Input new inventory item</p>
                    </div>
                </a>

                <a href="{{ route('transactions.index') }}" class="group relative overflow-hidden p-6 bg-white border border-slate-200 rounded-2xl shadow-sm hover:border-slate-300 hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                    <div class="relative z-10">
                        <div class="w-10 h-10 bg-slate-50 rounded-lg flex items-center justify-center mb-4 text-slate-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </div>
                        <h4 class="font-bold text-slate-900 text-lg">Manage Loans</h4>
                        <p class="text-slate-500 text-xs mt-1">Check in/out books</p>
                    </div>
                </a>

            </div>
        </div>
    </div>

</x-admin-layout>