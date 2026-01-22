<x-admin-layout>

    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" class="fixed bottom-6 right-6 z-50 bg-slate-900 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-4 animate-bounce-in border border-slate-700">
            <div class="text-green-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
            </div>
            <div>
                <p class="font-mono text-[10px] font-bold uppercase tracking-widest text-slate-400">Success</p>
                <p class="text-sm font-bold">{{ session('success') }}</p>
            </div>
            <button @click="show = false" class="ml-4 text-slate-500 hover:text-white"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
        </div>
    @endif

    <div class="bg-white border border-slate-200 rounded-2xl p-6 mb-8 shadow-sm relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-64 h-64 bg-slate-50 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-end justify-between gap-6">
            <div class="flex-1">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-2 h-2 bg-slate-900 rounded-full animate-pulse"></span>
                    <span class="font-mono text-xs font-bold text-slate-500 uppercase tracking-widest">Inventory Management</span>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-slate-900">
                    Database Buku
                </h1>
                <p class="text-slate-500 text-sm mt-1">Kelola koleksi perpustakaan, stok, dan kategori.</p>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <form method="GET" action="{{ route('books.index') }}" class="relative group w-full sm:w-64">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-slate-400 group-focus-within:text-slate-900 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari buku..." 
                           class="block w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:border-slate-900 focus:ring-slate-900 transition-all hover:bg-white"
                           onchange="this.form.submit()">
                </form>

                <a href="{{ route('books.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-slate-900 text-white text-xs font-bold uppercase tracking-widest rounded-xl hover:bg-black transition-all shadow-lg shadow-slate-900/20 hover:shadow-slate-900/40 hover:-translate-y-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                    <span>Tambah</span>
                </a>
            </div>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest">Cover</th>
                        <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest">Detail Buku</th>
                        <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest">Kategori</th>
                        <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest">Penerbit</th>
                        <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest">Stok</th>
                        <th class="px-6 py-4 font-mono text-[10px] font-bold text-slate-500 uppercase tracking-widest text-right">Opsi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse($books as $book)
                    <tr class="group hover:bg-slate-50/80 transition-colors">
                        
                        <td class="px-6 py-4 w-24 align-middle">
                            <div class="w-12 h-16 bg-slate-100 rounded-lg border border-slate-200 overflow-hidden relative shadow-sm group-hover:shadow-md transition-all">
                                @if($book->cover)
                                    <img src="{{ asset('storage/' . $book->cover) }}" 
                                            alt="{{ $book->title }}"
                                            class="w-full h-full object-cover">
                                @else
                                    <div class="flex items-center justify-center h-full text-slate-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </td>

                        <td class="px-6 py-4 align-middle">
                            <div class="font-bold text-sm text-slate-900 mb-1 line-clamp-1">{{ $book->title }}</div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs text-slate-500">{{ $book->writer }}</span>
                            </div>
                        </td>

                        <td class="px-6 py-4 align-middle">
                            @if($book->category)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                    {{ $book->category->name }}
                                </span>
                            @else
                                <span class="text-[10px] text-slate-400 italic">-</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 align-middle">
                            <div class="text-xs font-medium text-slate-700">{{ $book->publisher }}</div>
                            <div class="text-[10px] text-slate-400 mt-0.5">{{ $book->publication_year }}</div>
                        </td>

                        <td class="px-6 py-4 align-middle">
                            @if($book->stock > 0)
                                <div class="flex items-center gap-2">
                                    <div class="flex gap-0.5">
                                        @for($i=0; $i<min($book->stock, 3); $i++)
                                            <div class="w-1 h-3 bg-slate-900 rounded-full"></div>
                                        @endfor
                                        @if($book->stock > 3) <span class="text-[10px] text-slate-400">+</span> @endif
                                    </div>
                                    <span class="text-xs font-bold text-slate-700">{{ $book->stock }}</span>
                                </div>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[10px] font-bold bg-red-50 text-red-600 border border-red-100">
                                    Habis
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-right align-middle">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('books.edit', $book->id) }}" class="p-2 text-slate-400 hover:text-slate-900 hover:bg-slate-100 rounded-lg transition-colors" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                </a>
                                
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                                </div>
                                <p class="font-bold text-slate-900">Belum ada buku</p>
                                <p class="text-xs text-slate-500 mt-1">Mulai dengan menambahkan buku baru.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($books->hasPages())
        <div class="px-6 py-4 border-t border-slate-100 bg-slate-50">
            {{ $books->links() }}
        </div>
        @endif
    </div>

</x-admin-layout>