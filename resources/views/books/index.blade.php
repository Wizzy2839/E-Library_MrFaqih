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

            <div class="flex flex-col md:flex-row items-end justify-between mb-10 pb-6 border-b border-gray-100">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-2 h-2 bg-black rounded-full animate-pulse"></span>
                        <span class="font-mono text-xs font-bold text-gray-400 uppercase tracking-widest">Inventory System</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold tracking-tighter text-black">
                        Manajemen Buku.
                    </h1>
                </div>
                
                <a href="{{ route('books.create') }}" class="group flex items-center gap-3 px-6 py-3 bg-black text-white text-xs font-bold uppercase tracking-widest rounded-lg hover:bg-gray-800 transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                    <span>+ New Entry</span>
                </a>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 font-mono text-[10px] font-bold text-gray-400 uppercase tracking-widest">Asset Preview</th>
                                <th class="px-6 py-4 font-mono text-[10px] font-bold text-gray-400 uppercase tracking-widest">Title & Author</th>
                                <th class="px-6 py-4 font-mono text-[10px] font-bold text-gray-400 uppercase tracking-widest">Publisher Info</th>
                                <th class="px-6 py-4 font-mono text-[10px] font-bold text-gray-400 uppercase tracking-widest">Availability</th>
                                <th class="px-6 py-4 font-mono text-[10px] font-bold text-gray-400 uppercase tracking-widest text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse($books as $book)
                            <tr class="group hover:bg-gray-50 transition-colors">
                                
                                <td class="px-6 py-4 w-24">
                                    <div class="w-12 h-16 bg-gray-100 rounded border border-gray-200 overflow-hidden relative shadow-sm">
                                        @if($book->cover)
                                            <img src="{{ asset('storage/' . $book->cover) }}" 
                                                 alt="{{ $book->title }}"
                                                 class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-300">
                                        @else
                                            <div class="flex items-center justify-center h-full text-gray-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="font-bold text-sm text-black mb-1 group-hover:underline decoration-1 underline-offset-2 line-clamp-1">{{ $book->title }}</div>
                                    <div class="flex items-center gap-2">
                                        <span class="font-mono text-[10px] text-gray-400 uppercase bg-gray-100 px-1 rounded">By</span>
                                        <span class="font-mono text-xs text-gray-600 font-medium">{{ $book->writer }}</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $book->publisher }}</div>
                                    <div class="font-mono text-[10px] text-gray-400 mt-0.5">Year: {{ $book->publication_year }}</div>
                                </td>

                                <td class="px-6 py-4">
                                    @if($book->stock > 0)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[10px] font-bold bg-green-50 text-green-700 border border-green-200 uppercase tracking-wide">
                                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                            {{ $book->stock }} Available
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[10px] font-bold bg-gray-50 text-gray-500 border border-gray-200 uppercase tracking-wide">
                                            <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span>
                                            Out of Stock
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <a href="{{ route('books.edit', $book->id) }}" class="text-xs font-bold text-black hover:underline underline-offset-4">
                                            EDIT
                                        </a>
                                        <span class="text-gray-300">/</span>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this item?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs font-bold text-red-500 hover:text-red-700 hover:underline underline-offset-4">
                                                REMOVE
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
                                        </div>
                                        <p class="font-bold text-sm text-gray-900">Database Empty</p>
                                        <p class="font-mono text-xs text-gray-400 mt-1">Start by adding a new book above.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($books->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                    {{ $books->links() }}
                </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>