<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 md:h-20 items-center">
            
            <div class="flex items-center gap-4 md:gap-10">
                <div class="shrink-0 flex items-center gap-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 md:gap-3 group">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        
                        <div class="flex flex-col">
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

            <div class="hidden sm:flex sm:items-center sm:gap-3">
                
                <x-dropdown align="right" width="80">
                    <x-slot name="trigger">
                        <button class="relative p-2 rounded-full text-gray-400 hover:text-black hover:bg-gray-50 transition-colors focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white animate-pulse"></span>
                            @endif
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="w-80">
                            <div class="px-4 py-3 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                                <span class="font-bold text-xs uppercase tracking-wider text-black">Notifications</span>
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                    <span class="text-[10px] bg-red-100 text-red-600 px-2 py-0.5 rounded-full font-bold">{{ auth()->user()->unreadNotifications->count() }} new</span>
                                @endif
                            </div>
                            
                            <div class="max-h-64 overflow-y-auto">
                                @forelse(auth()->user()->notifications as $notification)
                                    <div class="px-4 py-3 border-b border-gray-50 hover:bg-gray-50 transition-colors {{ $notification->read_at ? 'opacity-60' : 'bg-white' }}">
                                        <div class="flex gap-3">
                                            <div class="mt-0.5">
                                                <div class="w-2 h-2 rounded-full {{ str_contains($notification->data['message'] ?? '', 'mengembalikan') ? 'bg-green-500' : 'bg-amber-500' }} mt-1.5"></div>
                                            </div>
                                            <div>
                                                <p class="text-xs text-black font-medium leading-snug">{{ $notification->data['message'] ?? 'New Notification' }}</p>
                                                <p class="text-[10px] text-gray-400 mt-1 font-mono">{{ $notification->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @php $notification->markAsRead(); @endphp
                                @empty
                                    <div class="px-4 py-8 text-center text-gray-400 flex flex-col items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                                        <span class="text-xs">No notifications yet.</span>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </x-slot>
                </x-dropdown>

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

            <div class="-me-2 flex items-center gap-3 sm:hidden">
                <div class="relative p-2 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border border-white"></span>
                    @endif
                </div>

                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-black hover:bg-gray-100 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-gray-100 bg-white shadow-lg absolute w-full left-0 z-40">
        <div class="pt-4 pb-4 space-y-2 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-lg font-bold text-sm uppercase py-3 border-l-4 pl-3 {{ request()->routeIs('dashboard') ? 'border-black bg-gray-50' : 'border-transparent text-gray-500' }}">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if(auth()->user()->role === 'admin')
                <x-responsive-nav-link :href="route('books.index')" :active="request()->routeIs('books.*')" class="rounded-lg font-bold text-sm uppercase py-3 border-l-4 pl-3 {{ request()->routeIs('books.*') ? 'border-black bg-gray-50' : 'border-transparent text-gray-500' }}">
                    {{ __('Library') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('transactions.index')" :active="request()->routeIs('transactions.*')" class="rounded-lg font-bold text-sm uppercase py-3 border-l-4 pl-3 {{ request()->routeIs('transactions.*') ? 'border-black bg-gray-50' : 'border-transparent text-gray-500' }}">
                    {{ __('Circulation') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <div class="pt-4 pb-6 border-t border-gray-100 bg-gray-50/50">
            <div class="px-6 flex items-center gap-4 mb-4">
                 <div class="h-12 w-12 rounded-full bg-black text-white flex items-center justify-center font-bold text-lg shadow-sm">
                    {{ substr(Auth::user()->nama_lengkap, 0, 1) }}
                </div>
                <div>
                    <div class="font-bold text-base text-black">{{ Auth::user()->nama_lengkap }}</div>
                    <div class="font-mono text-xs text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-1 px-4">
                @if(auth()->user()->unreadNotifications->count() > 0)
                    <div class="mb-3 p-3 bg-white border border-gray-200 rounded-lg">
                        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">New Notifications</p>
                        @foreach(auth()->user()->unreadNotifications->take(3) as $notification)
                            <div class="text-xs text-black border-b border-gray-100 py-1 last:border-0 truncate">
                                {{ $notification->data['message'] }}
                            </div>
                            @php $notification->markAsRead(); @endphp
                        @endforeach
                    </div>
                @endif

                <x-responsive-nav-link :href="route('profile.edit')" class="rounded-lg flex items-center gap-3 py-3 text-xs font-bold uppercase tracking-wide text-gray-600 hover:bg-white hover:shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    {{ __('Profile Settings') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600 rounded-lg flex items-center gap-3 py-3 text-xs font-bold uppercase tracking-wide hover:bg-red-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>