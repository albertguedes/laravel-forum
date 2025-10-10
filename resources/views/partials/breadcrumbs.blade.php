@unless($breadcrumbs->isEmpty())
<nav aria-label="breadcrumb" class="mb-3 fs-6">
    <ol class="breadcrumb">
    @foreach ($breadcrumbs as $breadcrumb)

        @if ($loop->first)
        <li class="breadcrumb-item d-flex align-items-center justify-content-center">
            @if($loop->first == $loop->last)
            <span>&nbsp;</span>
            @else
            <a href="{{ $breadcrumb->url }}">
                {{ customTitle($breadcrumb) }}
            </a>
            @endif
        </li>
        @elseif($loop->last)
        <li class="breadcrumb-item d-flex align-items-center justify-content-center">
            {{ customTitle($breadcrumb) }}
        </li>
        @else
        <li class="breadcrumb-item d-flex align-items-center justify-content-center">
            @if($breadcrumb->url)
            <a href="{{ $breadcrumb->url }}">
                {{ customTitle($breadcrumb) }}</a>
            @else
                {{ customTitle($breadcrumb) }}
            @endif
        </li>
        @endif

    @endforeach
    </ol>
</nav>
@endunless
