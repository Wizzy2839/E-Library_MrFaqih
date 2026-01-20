<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            
            <div class="flex items-center gap-10">
                <div class="shrink-0 flex items-center gap-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                        <x-application-logo class="block h-9 w-auto fill-current text-black group-hover:text-gray-700 transition-colors duration-200" />
                        
                        <div class="hidden md:flex flex-col">
                            <span class="font-bold text-sm tracking-tight leading-none text-black">Lib_OS</span>
                            <span class="font-mono text-[9px] text-gray-400 uppercase tracking-widest leading-none mt-0.5">System</span>
                        </div>
                    </a>
                </div>

                <div class="hidden sm:flex items-center gap-1">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                        class="px-3 py-2 text-xs font-bold uppercase tracking-wide transition-all duration-200 rounded-md
                        {{ request()->routeIs('dashboard') 
                            ? 'text-black bg-gray-100' 
                            : 'text-gray-400 hover:text-black hover:bg-gray-50' }}">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if(auth()->user()->role === 'admin')
                        <span class="text-gray-200 text-xs font-mono mx-2">/</span>
                        
                        <x-nav-link :href="route('books.index')" :active="request()->routeIs('books.*')" 
                            class="px-3 py-2 text-xs font-bold uppercase tracking-wide transition-all duration-200 rounded-md
                            {{ request()->routeIs('books.*') 
                                ? 'text-black bg-gray-100' 
                                : 'text-gray-400 hover:text-black hover:bg-gray-50' }}">
                            {{ __('Library') }}
                        </x-nav-link>

                        <x-nav-link :href="route('transactions.index')" :active="request()->routeIs('transactions.*')" 
                            class="px-3 py-2 text-xs font-bold uppercase tracking-wide transition-all duration-200 rounded-md
                            {{ request()->routeIs('transactions.*') 
                                ? 'text-black bg-gray-100' 
                                : 'text-gray-400 hover:text-black hover:bg-gray-50' }}">
                            {{ __('Circulation') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-3 pl-4 pr-1 py-1 border border-gray-200 rounded-full hover:border-gray-300 transition-all duration-200 group bg-white">
                            <div class="text-right flex flex-col items-end leading-none">
                                <span class="font-bold text-xs text-black">{{ Auth::user()->nama_lengkap }}</span>
                                <span class="font-mono text-[9px] text-gray-400 uppercase tracking-widest mt-0.5 group-hover:text-black transition-colors">
                                    {{ Auth::user()->role === 'admin' ? 'Admin' : 'Student' }}
                                </span>
                            </div>
                            <div class="h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center font-bold text-xs text-black border border-gray-200 group-hover:bg-black group-hover:text-white transition-colors">
                                {{ substr(Auth::user()->nama_lengkap, 0, 1) }}
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                            <p class="font-mono text-[9px] text-gray-400 uppercase tracking-widest mb-1">Signed in as</p>
                            <p class="text-xs font-bold text-black truncate font-mono">{{ Auth::user()->email }}</p>
                        </div>

                        <div class="p-1">
                            <x-dropdown-link :href="route('profile.edit')" class="rounded-md group flex items-center gap-3 px-4 py-2 text-xs font-bold uppercase tracking-wide text-gray-500 hover:bg-gray-100 hover:text-black transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 group-hover:text-black transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                {{ __('Settings') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();" 
                                        class="rounded-md group flex items-center gap-3 px-4 py-2 text-xs font-bold uppercase tracking-wide text-red-500 hover:bg-red-50 hover:text-red-600 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-400 group-hover:text-red-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-black hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-gray-100 bg-white">
        <div class="pt-2 pb-3 space-y-1 px-3">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-md font-bold text-xs uppercase">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if(auth()->user()->role === 'admin')
                <x-responsive-nav-link :href="route('books.index')" :active="request()->routeIs('books.*')" class="rounded-md font-bold text-xs uppercase">
                    {{ __('Library') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('transactions.index')" :active="request()->routeIs('transactions.*')" class="rounded-md font-bold text-xs uppercase">
                    {{ __('Circulation') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <div class="pt-4 pb-1 border-t border-gray-100 bg-gray-50">
            <div class="px-4 flex items-center gap-3">
                 <div class="h-10 w-10 rounded-full bg-black text-white flex items-center justify-center font-bold text-xs">
                    {{ substr(Auth::user()->nama_lengkap, 0, 1) }}
                </div>
                <div>
                    <div class="font-bold text-sm text-black">{{ Auth::user()->nama_lengkap }}</div>
                    <div class="font-mono text-xs text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1 px-2">
                <x-responsive-nav-link :href="route('profile.edit')" class="rounded-md flex items-center gap-2 text-xs font-bold uppercase tracking-wide">
                    {{ __('Profile Settings') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600 rounded-md flex items-center gap-2 text-xs font-bold uppercase tracking-wide">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>