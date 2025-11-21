@if ($paginator->hasPages())
    <nav class="my-10 flex justify-center">
        <ul class="flex items-center gap-2 bg-base-200 px-4 py-3 rounded-full shadow">

            {{-- Previous --}}
            <li>
                @if ($paginator->onFirstPage())
                    <button
                        class="btn btn-sm btn-circle btn-ghost text-base-content/40 cursor-not-allowed"
                        disabled
                    >
                        <i class="la la-arrow-left text-lg"></i>
                    </button>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="btn btn-sm btn-circle btn-ghost text-base-content hover:bg-base-300"
                       aria-label="@lang('pagination.previous')"
                    >
                        <i class="la la-arrow-left text-lg"></i>
                    </a>
                @endif
            </li>

            {{-- Page Numbers --}}
            @foreach ($elements as $element)

                {{-- Dots --}}
                @if (is_string($element))
                    <li>
                        <span class="px-3 text-sm text-base-content/50">{{ $element }}</span>
                    </li>
                @endif

                {{-- Page Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li>
                            @if ($page == $paginator->currentPage())
                                <span
                                    class="btn btn-sm rounded-full bg-primary text-primary-content font-semibold shadow"
                                >
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                   class="btn btn-sm rounded-full btn-ghost hover:bg-base-300"
                                >
                                    {{ $page }}
                                </a>
                            @endif
                        </li>
                    @endforeach
                @endif

            @endforeach

            {{-- Next --}}
            <li>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="btn btn-sm btn-circle btn-ghost text-base-content hover:bg-base-300"
                       aria-label="@lang('pagination.next')"
                    >
                        <i class="la la-arrow-right text-lg"></i>
                    </a>
                @else
                    <button
                        class="btn btn-sm btn-circle btn-ghost text-base-content/40 cursor-not-allowed"
                        disabled
                    >
                        <i class="la la-arrow-right text-lg"></i>
                    </button>
                @endif
            </li>

        </ul>
    </nav>
@endif
