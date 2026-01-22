@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between w-full">
        
        <div class="flex flex-1 justify-between items-center sm:hidden">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-xs font-bold text-slate-400 bg-slate-50 border border-slate-200 rounded-lg cursor-not-allowed">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Prev
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-xs font-bold text-slate-700 bg-white border border-slate-200 rounded-lg hover:bg-black hover:text-white hover:border-black transition-all duration-200 shadow-sm">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Prev
                </a>
            @endif

            {{-- Page Counter --}}
            <div class="text-xs font-mono text-slate-500">
                Page <span class="font-bold text-black">{{ $paginator->currentPage() }}</span> / {{ $paginator->lastPage() }}
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-xs font-bold text-slate-700 bg-white border border-slate-200 rounded-lg hover:bg-black hover:text-white hover:border-black transition-all duration-200 shadow-sm">
                    Next
                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 text-xs font-bold text-slate-400 bg-slate-50 border border-slate-200 rounded-lg cursor-not-allowed">
                    Next
                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            
            {{-- Info Text (Showing X to Y of Z) --}}
            <div>
                <p class="text-xs text-slate-500 font-medium">
                    Showing
                    <span class="font-bold text-black">{{ $paginator->firstItem() }}</span>
                    to
                    <span class="font-bold text-black">{{ $paginator->lastItem() }}</span>
                    of
                    <span class="font-bold text-black">{{ $paginator->total() }}</span>
                    results
                </p>
            </div>

            {{-- Numbered Pagination --}}
            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-xl bg-white p-1 border border-slate-200 gap-1">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-slate-300 bg-transparent rounded-lg cursor-default leading-5" aria-hidden="true">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-slate-500 bg-transparent rounded-lg hover:bg-slate-50 hover:text-black transition-colors focus:z-10 focus:outline-none" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-3 py-2 text-xs font-medium text-slate-400 bg-transparent cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center justify-center w-8 h-8 text-xs font-bold text-white bg-black rounded-lg cursor-default shadow-md transform scale-105">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center justify-center w-8 h-8 text-xs font-medium text-slate-500 bg-transparent rounded-lg hover:bg-slate-100 hover:text-black transition-all duration-200 focus:z-10 focus:outline-none">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-slate-500 bg-transparent rounded-lg hover:bg-slate-50 hover:text-black transition-colors focus:z-10 focus:outline-none" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-slate-300 bg-transparent rounded-lg cursor-default leading-5" aria-hidden="true">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif