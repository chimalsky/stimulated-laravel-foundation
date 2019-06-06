<article class="cell grid-x
    @if ($alignRight)
        align-right text-right
    @endif
">
    <p class="cell">
        {!! $comment->body !!}
    </p>

    <footer class="cell grid-x">
        <p class="cell secondary">
            <i>
            {{ $comment->creator->name }}
            | 
            {{ $comment->created_at }}
            </i>
        </p>
    </footer>
</article>
