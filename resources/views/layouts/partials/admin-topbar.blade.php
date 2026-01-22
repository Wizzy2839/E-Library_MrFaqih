<header class="h-20 bg-white border-b border-gray-100 flex items-center justify-between px-6 lg:px-10 sticky top-0 z-40">
    
    <button @click="sidebarOpen = !sidebarOpen" class="p-2 -ml-2 mr-2 lg:hidden text-gray-500 hover:text-black">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <div class="hidden md:block">
        <span class="font-mono text-xs text-gray-400 uppercase tracking-widest">Administrator Area</span>
    </div>

    <div class="flex items-center gap-4">
        <div class="text-right hidden md:block">
            <div class="font-bold text-sm text-black">{{ Auth::user()->nama_lengkap }}</div>
            <div class="font-mono text-[10px] text-gray-400 uppercase tracking-widest">{{ Auth::user()->email }}</div>
        </div>
        <div class="h-10 w-10 rounded-full bg-black text-white flex items-center justify-center font-bold text-sm shadow-md border-2 border-gray-100">
            {{ substr(Auth::user()->nama_lengkap, 0, 1) }}
        </div>
    </div>
</header>