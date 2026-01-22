<x-admin-layout>
    <div x-data="{ 
            photoName: null, 
            photoPreview: null,
            bookTitle: '',
            bookWriter: '',
            bookPublisher: '',
            bookYear: '',
            bookCategory: '',
            updatePreview() {
                const file = this.$refs.photo.files[0];
                if (!file) return;
                this.photoName = file.name;
                const reader = new FileReader();
                reader.onload = (e) => { this.photoPreview = e.target.result; };
                reader.readAsDataURL(file);
            }
         }">
         
        <div class="bg-white border border-slate-200 rounded-2xl p-6 mb-8 shadow-sm relative overflow-hidden">
            <div class="absolute -right-10 -top-10 w-64 h-64 bg-slate-50 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row items-end justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-2 h-2 bg-slate-900 rounded-full animate-pulse"></span>
                        <span class="font-mono text-xs font-bold text-slate-500 uppercase tracking-widest">New Entry</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-slate-900">
                        Tambah Buku Baru.
                    </h1>
                </div>
                
                <div class="flex gap-3">
                    <a href="{{ route('books.index') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-xs font-bold text-slate-600 uppercase tracking-widest rounded-xl hover:border-slate-300 hover:text-slate-900 transition-all shadow-sm">
                        <span>Cancel</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2">
                <div class="bg-white border border-slate-200 rounded-2xl p-6 md:p-8 shadow-sm">
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        @if ($errors->any())
                            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-xl">
                                <div class="flex">
                                    <div class="ml-3">
                                        <h3 class="text-sm font-bold text-red-800">Terdapat kesalahan input:</h3>
                                        <ul class="mt-1 list-disc list-inside text-sm text-red-700">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="space-y-6">
                            <h3 class="font-mono text-xs font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 pb-2">01 — Information</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Judul Buku</label>
                                    <input type="text" name="title" x-model="bookTitle" 
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-base font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent transition-all placeholder-slate-400" 
                                        placeholder="Masukkan judul buku..." required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Kategori</label>
                                    <div class="relative">
                                        <select name="category_id" x-model="bookCategory" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-slate-900 focus:border-transparent transition-all appearance-none cursor-pointer text-slate-900" required>
                                            <option value="" disabled selected>Pilih...</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Penulis</label>
                                    <input type="text" name="writer" x-model="bookWriter"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900 transition-all placeholder-slate-400" 
                                        placeholder="Nama Penulis" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Penerbit</label>
                                    <input type="text" name="publisher" x-model="bookPublisher"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900 transition-all placeholder-slate-400" 
                                        placeholder="Nama Penerbit" required>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6 pt-4">
                            <h3 class="font-mono text-xs font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 pb-2">02 — Inventory</h3>
                            
                            <div class="grid grid-cols-2 gap-8">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Tahun</label>
                                    <input type="number" name="publication_year" x-model="bookYear"
                                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-mono text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900 transition-all placeholder-slate-400" 
                                        placeholder="2024" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Stok Awal</label>
                                    <div class="relative">
                                        <input type="number" name="stock" 
                                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-mono text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900 transition-all placeholder-slate-400" 
                                            placeholder="0" required>
                                        <div class="absolute right-3 top-3 text-xs text-slate-400 font-bold pointer-events-none">PCS</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6 pt-4">
                            <h3 class="font-mono text-xs font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 pb-2">03 — Assets</h3>
                            
                            <div>
                                <label class="block w-full group cursor-pointer">
                                    <div class="flex items-center justify-between p-4 border border-dashed border-slate-300 rounded-2xl group-hover:border-slate-900 group-hover:bg-slate-50 transition-all">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center text-slate-400 group-hover:bg-slate-900 group-hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-slate-900">Upload Cover</p>
                                                <p class="text-xs text-slate-500">JPG, PNG, WEBP, AVIF (Max 2MB)</p>
                                                <p x-show="photoName" x-text="photoName" class="text-xs text-green-600 font-bold mt-1 bg-green-50 px-2 py-0.5 rounded inline-block"></p>
                                            </div>
                                        </div>
                                        <span class="text-xs font-bold bg-white border border-slate-200 px-3 py-2 rounded-lg shadow-sm group-hover:shadow-md transition-all">Select File</span>
                                    </div>
                                    <input type="file" name="cover" class="hidden" accept="image/*" x-ref="photo" x-on:change="updatePreview()" />
                                </label>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100">
                            <button type="submit" class="w-full inline-flex justify-center items-center gap-2 rounded-xl bg-slate-900 py-3.5 px-4 text-sm font-bold text-white shadow-lg shadow-slate-900/20 hover:bg-black hover:shadow-slate-900/40 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2 transition-all duration-200">
                                <span>Publish to Database</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-4">
                    <div class="flex items-center justify-between px-1">
                        <span class="font-mono text-xs font-bold text-slate-400 uppercase tracking-widest">Entry Preview</span>
                        <template x-if="bookCategory">
                            <span class="px-2 py-1 bg-slate-900 text-white text-[10px] font-bold uppercase rounded tracking-wider">
                                Selected
                            </span>
                        </template>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-lg transition-all duration-500 hover:shadow-xl">
                        <div class="aspect-[3/4] bg-slate-100 relative border-b border-slate-100 overflow-hidden">
                            <template x-if="photoPreview">
                                <img :src="photoPreview" class="w-full h-full object-cover">
                            </template>
                            <template x-if="!photoPreview">
                                <div class="w-full h-full flex flex-col items-center justify-center text-slate-300 bg-slate-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    <span class="font-mono text-[10px] uppercase tracking-widest opacity-50">Cover Preview</span>
                                </div>
                            </template>
                        </div>
                        
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-slate-900 leading-tight mb-1" x-text="bookTitle || 'Untitled Book'"></h2>
                            <p class="text-sm text-slate-500 mb-4" x-text="bookWriter || 'Unknown Author'"></p>
                            
                            <div class="grid grid-cols-2 gap-4 border-t border-slate-100 pt-4">
                                <div>
                                    <span class="block text-[10px] text-slate-400 font-mono uppercase tracking-wide">Publisher</span>
                                    <span class="text-xs font-bold text-slate-900 truncate block" x-text="bookPublisher || '-'"></span>
                                </div>
                                <div>
                                    <span class="block text-[10px] text-slate-400 font-mono uppercase tracking-wide">Year</span>
                                    <span class="text-xs font-bold text-slate-900" x-text="bookYear || '-'"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="text-xs text-slate-400 text-center font-mono mt-4">
                        ID: #AUTO-GEN
                    </p>

                </div>
            </div>

        </div>
    </div>
</x-admin-layout>