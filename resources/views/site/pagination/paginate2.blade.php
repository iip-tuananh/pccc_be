
@if ($paginator->hasPages())
<div class="pronation_widget text-start">
    <ul class="list-unstyled justify-content-start">
        @if (!$paginator->onFirstPage())
            <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-angle-left"></i></a></li>
        @endif

            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())

                            <li><a href="#" class="active">{{ $page }}</a></li>

                        @else

                            <li><a href="{{ $url }}">{{ $page }}</a></li>

                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())

                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a></li>
            @endif

    </ul>
</div>
@endif

