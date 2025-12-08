
{{-- Convertisin DaisiUIsse --}}
@if ($paginator->hasPages())
    <nav class="my-4 flex justify-center">
        <div class="join">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <button class="btn join-item btn-disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    «
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="btn join-item"
                   rel="prev"
                   aria-label="@lang('pagination.previous')">
                    «
                </a>
            @endif

            {{-- Page numbers --}}
            @foreach ($elements as $element)
                {{-- Dots --}}
                @if (is_string($element))
                    <button class="btn join-item btn-disabled" aria-disabled="true">
                        {{ $element }}
                    </button>
                @endif

                {{-- Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page === $paginator->currentPage())
                            <button class="btn join-item btn-active" aria-current="page">
                                {{ $page }}
                            </button>
                        @else
                            <a href="{{ $url }}" class="btn join-item">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="btn join-item"
                   rel="next"
                   aria-label="@lang('pagination.next')">
                    »
                </a>
            @else
                <button class="btn join-item btn-disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    »
                </button>
            @endif

        </div>
    </nav>
@endif
