@if ($paginator->onFirstPage())
<span class="disabled">&lt;</span>
@else
<a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a>
@endif

@foreach ($elements as $element)
@if (is_string($element))
<span class="disabled">{{ $element }}</span>
@endif

@if (is_array($element))
@foreach ($element as $page => $url)
@if ($page == $paginator->currentPage())
<span class="active">{{ $page }}</span>
@else
<a href="{{ $url }}">{{ $page }}</a>
@endif
@endforeach
@endif
@endforeach

{{-- Next Page Link --}}
@if ($paginator->hasMorePages())
<a href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a>
@else
<span class="disabled">&gt;</span>
@endif