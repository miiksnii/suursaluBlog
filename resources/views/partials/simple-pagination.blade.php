{{-- Nüüd on õige fail ka... --}}
@if ($paginator->hasPages())
    <nav class="flex justify-center my-6">
        <div class="join">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <button class="btn join-item btn-disabled">
                    « Previous
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="btn join-item">
                    « Previous
                </a>
            @endif

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="btn join-item">
                    Next »
                </a>
            @else
                <button class="btn join-item btn-disabled">
                    Next »
                </button>
            @endif

        </div>
    </nav>
@endif
