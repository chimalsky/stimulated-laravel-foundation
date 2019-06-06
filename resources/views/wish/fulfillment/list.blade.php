@foreach ($fulfillments as $fulfillment)
    <article>
        <a href="{{ route('wish.fulfillment.show', $fulfillment) }}">
        <header>
            {{ $fulfillment->giver->name }} offered their help on {{ $fulfillment->created_at }}
        </header>
        </a>
    </article>
@endforeach