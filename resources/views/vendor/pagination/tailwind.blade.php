@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between text-xs">
        {{-- Mobile View --}}
        <div class="flex items-center justify-between w-full sm:hidden gap-2">
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center px-3.5 py-1.5 font-medium text-gray-300 bg-white border border-gray-200/80 rounded-xl cursor-not-allowed">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-3.5 py-1.5 font-medium text-gray-700 bg-white border border-gray-200/80 rounded-xl hover:bg-gray-50 transition shadow-2xs">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-3.5 py-1.5 font-medium text-gray-700 bg-white border border-gray-200/80 rounded-xl hover:bg-gray-50 transition shadow-2xs">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="inline-flex items-center px-3.5 py-1.5 font-medium text-gray-300 bg-white border border-gray-200/80 rounded-xl cursor-not-allowed">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        {{-- Desktop View --}}
        <div class="hidden sm:flex sm:items-center sm:justify-between w-full">
            <div>
                <p class="text-xs text-gray-500">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-semibold text-gray-900">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-semibold text-gray-900">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-semibold text-gray-900">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <div class="inline-flex items-center gap-1">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}" class="w-8 h-8 rounded-xl border border-gray-200/80 bg-white text-gray-300 flex items-center justify-center cursor-not-allowed">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <polyline points="15 18 9 12 15 6"/>
                            </svg>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}" class="w-8 h-8 rounded-xl border border-gray-200/80 bg-white text-gray-600 hover:text-gray-900 hover:bg-gray-50 flex items-center justify-center transition shadow-2xs">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <polyline points="15 18 9 12 15 6"/>
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span class="w-8 h-8 flex items-center justify-center text-gray-400 font-medium text-xs">
                                {{ $element }}
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page" class="w-8 h-8 rounded-xl bg-gray-950 text-white font-semibold text-xs flex items-center justify-center shadow-2xs">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="w-8 h-8 rounded-xl border border-gray-200/80 bg-white text-gray-700 hover:text-gray-900 hover:bg-gray-50 font-medium text-xs flex items-center justify-center transition shadow-2xs" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('pagination.next') }}" class="w-8 h-8 rounded-xl border border-gray-200/80 bg-white text-gray-600 hover:text-gray-900 hover:bg-gray-50 flex items-center justify-center transition shadow-2xs">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <polyline points="9 18 15 12 9 6"/>
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}" class="w-8 h-8 rounded-xl border border-gray-200/80 bg-white text-gray-300 flex items-center justify-center cursor-not-allowed">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <polyline points="9 18 15 12 9 6"/>
                            </svg>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </nav>
@endif
