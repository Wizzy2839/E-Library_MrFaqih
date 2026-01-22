<aside class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-100 transition-transform duration-300 ease-in-out transform lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    @click.away="sidebarOpen = false">
    
    <div class="flex items-center justify-center h-20 border-b border-gray-100">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
            <x-application-logo class="block h-8 w-auto fill-current text-black" />
            <div class="flex flex-col">
                <span class="font-bold text-lg tracking-tight leading-none text-black">Lib_OS</span>
                <span class="font-mono text-[10px] text-gray-400 uppercase tracking-widest leading-none mt-0.5">Admin Panel</span>
            </div>
        </a>
    </div>

    <nav class="p-4 space-y-1 overflow-y-auto">
        
        <p class="px-4 pt-4 pb-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Main Menu</p>

        <a href="{{ route('dashboard') }}" 
           class="flex items-center gap-3 px-4 py-3 text-xs font-bold uppercase tracking-wide rounded-lg transition-colors
           {{ request()->routeIs('dashboard') ? 'bg-black text-white shadow-md' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
            Dashboard
        </a>

        <a href="{{ route('books.index') }}" 
           class="flex items-center gap-3 px-4 py-3 text-xs font-bold uppercase tracking-wide rounded-lg transition-colors
           {{ request()->routeIs('books.*') ? 'bg-black text-white shadow-md' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
            Manage Books
        </a>

        <a href="{{ route('transactions.index') }}" 
           class="flex items-center gap-3 px-4 py-3 text-xs font-bold uppercase tracking-wide rounded-lg transition-colors
           {{ request()->routeIs('transactions.*') ? 'bg-black text-white shadow-md' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>
            Circulation
        </a>

    </nav>

    <div class="absolute bottom-0 w-full p-4 border-t border-gray-100 bg-gray-50">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-3 w-full px-4 py-2 text-xs font-bold uppercase tracking-wide text-red-500 hover:text-red-700 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                Sign Out
            </button>
        </form>
    </div>
</aside>