<x-app-layout>
    <div class="min-h-screen bg-white font-sans text-slate-900" 
         x-data="{ 
            photoName: null, 
            photoPreview: null,
            updatePreview() {
                const file = this.$refs.photo.files[0];
                if (!file) return;
                this.photoName = file.name;
                const reader = new FileReader();
                reader.onload = (e) => { this.photoPreview = e.target.result; };
                reader.readAsDataURL(file);
            }
         }">
         
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            
            <div class="flex flex-col md:flex-row items-end justify-between mb-12 border-b border-gray-100 pb-6">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-2 h-2 bg-black rounded-full animate-pulse"></span>
                        <span class="font-mono text-xs font-medium text-gray-500 uppercase tracking-widest">Database Editor</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold tracking-tighter text-black">
                        Edit Buku.
                    </h1>
                </div>
                
                <div class="flex items-center gap-4 mt-4 md:mt-0">
                    <a href="{{ route('books.index') }}" class="group flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-black transition-colors">
                        <span class="group-hover:-translate-x-1 transition-transform">←</span>
                        <span>Cancel & Return</span>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-24">
                
                <div class="lg:col-span-2">
                    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg text-sm">
                                <strong class="font-bold block mb-1">Ada yang salah:</strong>
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="space-y-6">
                            <h3 class="font-mono text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 pb-2">01 — Information</h3>
                            
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-2">Judul Buku</label>
                                    <input type="text" name="title" value="{{ old('title', $book->title) }}" 
                                        class="w-full bg-transparent border-0 border-b border-gray-200 px-0 py-3 text-xl font-medium text-gray-900 focus:ring-0 focus:border-black transition-colors placeholder-gray-300" 
                                        required>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-2">Penulis</label>
                                    <input type="text" name="writer" value="{{ old('writer', $book->writer) }}" 
                                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-2">Penerbit</label>
                                    <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}" 
                                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all" required>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6 pt-4">
                            <h3 class="font-mono text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 pb-2">02 — Inventory</h3>
                            
                            <div class="grid grid-cols-2 gap-8">
                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-2">Tahun Terbit</label>
                                    <input type="number" name="publication_year" value="{{ old('publication_year', $book->publication_year) }}" 
                                        class="w-full bg-white border border-gray-200 rounded-lg px-4 py-3 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-900 mb-2">Stok Tersedia</label>
                                    <div class="relative">
                                        <input type="number" name="stock" value="{{ old('stock', $book->stock) }}" 
                                            class="w-full bg-white border border-gray-200 rounded-lg px-4 py-3 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all" required>
                                        <div class="absolute right-3 top-3 text-xs text-gray-400 font-bold pointer-events-none">PCS</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6 pt-4">
                            <h3 class="font-mono text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 pb-2">03 — Assets</h3>
                            
                            <div>
                                <label class="block w-full group cursor-pointer">
                                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg group-hover:border-black group-hover:bg-gray-50 transition-all">
                                        <div class="flex items-center gap-4">
                                            <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 group-hover:bg-black group-hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-gray-900">Upload New Cover</p>
                                                <p class="text-xs text-gray-500">JPG, PNG, WEBP, or AVIF (Max 2MB)</p>
                                                <p x-show="photoName" x-text="photoName" class="text-xs text-green-600 font-bold mt-1"></p>
                                            </div>
                                        </div>
                                        <span class="text-xs font-mono border border-gray-200 px-2 py-1 rounded group-hover:border-black transition-colors">Select File</span>
                                    </div>
                                    
                                    <input type="file" name="cover" class="hidden" accept="image/*" x-ref="photo" x-on:change="updatePreview()" />
                                </label>
                            </div>
                        </div>

                        <div class="pt-6">
                            <button type="submit" class="w-full bg-black text-white rounded-lg py-4 font-bold text-sm hover:bg-gray-800 transition-all flex items-center justify-center gap-2 group">
                                <span>Save Changes</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs font-bold text-gray-400 uppercase tracking-widest">Live Preview</span>
                            @if($book->stock > 0)
                                <span class="flex items-center gap-1.5 px-2 py-1 bg-green-50 border border-green-200 rounded text-[10px] font-bold text-green-700 uppercase">
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Available
                                </span>
                            @else
                                <span class="flex items-center gap-1.5 px-2 py-1 bg-red-50 border border-red-200 rounded text-[10px] font-bold text-red-700 uppercase">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span> Out of Stock
                                </span>
                            @endif
                        </div>

                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                            <div class="aspect-[3/4] bg-gray-100 relative border-b border-gray-100">
                                
                                <div x-show="photoPreview" style="display: none;" class="w-full h-full">
                                    <img :src="photoPreview" class="object-cover w-full h-full">
                                </div>

                                <div x-show="!photoPreview" class="w-full h-full">
                                    @if($book->cover)
                                        <img src="{{ asset('storage/' . $book->cover) }}" class="object-cover w-full h-full grayscale hover:grayscale-0 transition-all duration-500">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                            <span class="font-mono text-[10px] uppercase">No Asset</span>
                                        </div>
                                    @endif
                                </div>

                            </div>
                            
                            <div class="p-5">
                                <h2 class="text-xl font-bold text-gray-900 leading-tight mb-1">{{ $book->title }}</h2>
                                <p class="text-sm text-gray-500 mb-4">{{ $book->writer }}</p>
                                
                                <div class="grid grid-cols-2 gap-2 border-t border-gray-100 pt-4">
                                    <div>
                                        <span class="block text-[10px] text-gray-400 font-mono uppercase">Publisher</span>
                                        <span class="text-xs font-bold text-gray-900 truncate block">{{ $book->publisher }}</span>
                                    </div>
                                    <div>
                                        <span class="block text-[10px] text-gray-400 font-mono uppercase">Year</span>
                                        <span class="text-xs font-bold text-gray-900">{{ $book->publication_year }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="text-xs text-gray-400 text-center font-mono mt-4">
                            ID: #BOOK-{{ str_pad($book->id, 4, '0', STR_PAD_LEFT) }}
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>