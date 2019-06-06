<section>

    <form action="{{ route('wish.fulfillment.comment.store', $fulfillment) }}" method="post">
        @csrf

        <div class="cell">
            <trix-editor input="comment">
            </trix-editor>
            <input id="comment" type="hidden" name="comment" />
        </div>

        <button class="button">
            Send
        </button>
    </form>
</section>