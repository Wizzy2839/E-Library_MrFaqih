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
                        <p class="font-mono text-xs font-bold uppercase tracking-widest text-gray-400">Transaction Status</p>
                        <p class="text-sm font-bold">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="ml-4 text-gray-500 hover:text-white"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                </div>
            @endif

            <div class="flex flex-col md:flex-row items-end justify-between mb-10 pb-6 border-b border-gray-100">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-2 h-2 bg-black rounded-full animate-pulse"></span>
                        <span class="font-mono text-xs font-bold text-gray-400 uppercase tracking-widest">Live Transactions</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold tracking-tighter text-black">
                        Sirkulasi Peminjaman.
                    </h1>
                </div>
                
                <div class="flex gap-3 mt-4 md:mt-0">
                    <div class="hidden md:flex items-center gap-2 px-3 py-1.5 border border-gray-200 rounded-md bg-white">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                        <span class="text-[10px] font-bold text-gray-500 uppercase tracking-wide">Active</span>
                    </div>
                    <div class="hidden md:flex items-center gap-2 px-3 py-1.5 border border-gray-200 rounded-md bg-white">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                        <span class="text-[10px] font-bold text-gray-500 uppercase tracking-wide">Returned</span>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 font-mono text-[10px] font-bold text-gray-400 uppercase tracking-widest">Borrower Profile</th>
                                <th class="px-6 py-4 font-mono text-[10px] font-bold text-gray-400 uppercase tracking-widest">Book Details</th>
                                <th class="px-6 py-4 font-mono text-[10px] font-bold text-gray-400 uppercase tracking-widest">Loan Date</th>
                                <th class="px-6 py-4 font-mono text-[10px] font-bold text-gray-400 uppercase tracking-widest">Current Status</th>
                                <th class="px-6 py-4 font-mono text-[10px] font-bold text-gray-400 uppercase tracking-widest text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse($loans as $loan)
                            <tr class="group hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-9 w-9 rounded-full bg-black text-white flex items-center justify-center font-bold text-xs border-2 border-white shadow-sm">
                                            {{ substr($loan->user->nama_lengkap, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-sm text-black">{{ $loan->user->nama_lengkap }}</div>
                                            <div class="font-mono text-[10px] text-gray-400 uppercase">{{ $loan->user->email }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="font-bold text-sm text-black mb-0.5">{{ $loan->book->title }}</div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="font-mono text-[10px] text-gray-400 uppercase bg-gray-100 px-1 rounded">By</span>
                                        <span class="font-mono text-xs text-gray-500">{{ $loan->book->writer }}</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <span class="font-mono text-xs font-medium text-gray-600 bg-gray-100 px-2 py-1 rounded border border-gray-200">
                                            {{ \Carbon\Carbon::parse($loan->loan_date)->format('d M Y') }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    @if($loan->status == 'borrowed')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200 uppercase tracking-wide">
                                            <span class="w-1.5 h-1.5 bg-amber-500 rounded-full animate-pulse"></span>
                                            Active Loan
                                        </span>
                                    @else
                                        <div class="flex flex-col items-start gap-1">
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[10px] font-bold bg-gray-50 text-gray-500 border border-gray-200 uppercase tracking-wide">
                                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                                Returned
                                            </span>
                                            <span class="font-mono text-[9px] text-gray-400 pl-1">
                                                {{ \Carbon\Carbon::parse($loan->return_date)->format('d/m/Y') }}
                                            </span>
                                        </div>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right">
                                    @if($loan->status == 'borrowed')
                                    <form action="{{ route('transactions.return', $loan->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-black text-white text-[10px] font-bold uppercase tracking-widest rounded hover:bg-gray-800 transition-all shadow-sm group/btn">
                                            <span>Mark Return</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                        </button>
                                    </form>
                                    @else
                                        <span class="font-mono text-[10px] font-bold text-gray-300 uppercase tracking-widest cursor-not-allowed">
                                            Completed
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                        </div>
                                        <p class="font-bold text-sm text-gray-900">No Logs Found</p>
                                        <p class="font-mono text-xs text-gray-400 mt-1">Transaction history is empty.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>