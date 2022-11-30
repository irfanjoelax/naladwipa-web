@if ($paginator->hasPages())
    <div class="custom-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="#" class="prev">Prevous</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="prev">Prevous</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            {{-- @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span
                            class="page-link">{{ $element }}</span></li>
                @endif --}}

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="{{ $url }}" class="active">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="next">Next</a>
        @else
            <a href="#" class="next">Next</a>
        @endif

    </div>
@endif
