<section>
    <form action="{{ route('wish.fulfillment.comment.store', $fulfillment) }}" method="post"
        class="grid-x grid-margin-y">
        @csrf

        @if ($errors->any())
            <div class="callout alert cell">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="cell">
            <trix-editor input="comment">
            </trix-editor>
            <input id="comment" type="hidden" name="comment" />
        </div>

        <button class=" cell shrink button">
            Send
        </button>
    </form>
</section>