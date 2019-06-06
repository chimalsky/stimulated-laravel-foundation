@foreach($wishes as $wish)

<article class="cell grid-x grid-margin-x align-justify">
    <a class="cell auto" href="{{ route('wish.show', $wish) }}">
        <h1>
            {{ $wish->title }}

            @if ($wish->fulfilled)
                -- fulfilled
            @endif
        </h1>
    </a>
     
    <p data-controller="date" class="cell shrink text-right">
        {{ $wish->created_at }}
    </p>
</article>

@endforeach
