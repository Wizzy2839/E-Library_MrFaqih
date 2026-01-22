<x-admin-layout>

    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" class="fixed bottom-6 right-6 z-50 bg-slate-900 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-4 animate-bounce-in border border-slate-700">
            <div class="text-green-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
            </div>
            <div>
                <p class="font-mono text-[10px] font-bold uppercase tracking-widest text-slate-400">Transaction Status</p>
                <p class="text-sm font-bold">{{ session('success') }}</p>
            </div>
            <button @click="show = false" class="ml-4 text-slate-500 hover:text-white"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
        </div>
    @endif

    <div class="bg-white border border-slate-200 rounded-2xl p-6 mb-8 shadow-sm relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-64 h-64 bg-slate-50 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col md:flex-row justify-between items-end gap-6">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-slate-50 border border-slate-200 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                    <span class="font-mono text-[10px] uppercase tracking-widest text-slate-500">Live Transactions</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold tracking-tight text-slate-900 leading-tight">
                    Circulation <span class="text-slate-300">Manager.</span>
                </h1>
            </div>
            
            <div class="flex gap-3">
                <div class="hidden md:flex items-center gap-2 px-3 py-2 border border-slate-200 rounded-xl bg-white shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                    <span class="text-[10px] font-bold text-slate-600 uppercase tracking-wide">Active</span>
                </div>
                <div class="hidden md:flex items-center gap-2 px-3 py-2 border border-slate-200 rounded-xl bg-white shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    <span class="text-[10px] font-bold text-slate-600 uppercase tracking-wide">Returned</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest">Borrower Profile</th>
                        <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest">Book Details</th>
                        <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest">Loan Date</th>
                        <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest">Current Status</th>
                        <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse($loans as $loan)
                    <tr class="group hover:bg-slate-50/80 transition-colors">
                        
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-full bg-slate-900 text-white flex items-center justify-center font-bold text-xs border-2 border-slate-100 shadow-sm">
                                    {{ substr($loan->user->nama_lengkap, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-bold text-sm text-slate-900">{{ $loan->user->nama_lengkap }}</div>
                                    <div class="font-mono text-[10px] text-slate-400 uppercase tracking-wide">{{ $loan->user->email }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="font-bold text-sm text-slate-900 mb-0.5 line-clamp-1">{{ $loan->book->title }}</div>
                            <div class="flex items-center gap-1.5">
                                <span class="font-mono text-[10px] text-slate-400 uppercase bg-slate-100 px-1.5 py-0.5 rounded">By</span>
                                <span class="font-mono text-xs text-slate-500">{{ $loan->book->writer }}</span>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="font-mono text-xs font-medium text-slate-600 bg-slate-50 px-2.5 py-1.5 rounded-lg border border-slate-100">
                                {{ \Carbon\Carbon::parse($loan->loan_date)->format('d M Y') }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            @if($loan->status == 'borrowed')
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-100 uppercase tracking-wide">
                                    <span class="w-1.5 h-1.5 bg-amber-500 rounded-full animate-pulse"></span>
                                    Active Loan
                                </span>
                            @else
                                <div class="flex flex-col items-start gap-1">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-green-50 text-green-700 border border-green-100 uppercase tracking-wide">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                        Returned
                                    </span>
                                    <span class="font-mono text-[9px] text-slate-400 pl-1 mt-0.5">
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
                                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-900 text-white text-[10px] font-bold uppercase tracking-widest rounded-lg hover:bg-black transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 group/btn">
                                        <span>Mark Return</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 group-hover/btn:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </button>
                                </form>
                            @else
                                <span class="font-mono text-[10px] font-bold text-slate-300 uppercase tracking-widest cursor-not-allowed flex items-center justify-end gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                    Completed
                                </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4 border border-slate-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                </div>
                                <p class="font-bold text-sm text-slate-900">No Transactions Found</p>
                                <p class="font-mono text-xs text-slate-400 mt-1">Transaction history is empty.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($loans->hasPages())
        <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50">
            {{ $loans->links('vendor.pagination.custom') }}
        </div>
        @endif
    </div>

</x-admin-layout>