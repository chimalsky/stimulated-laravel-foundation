@foreach ($fulfillments as $fulfillment)
    <article class="cell">
        <a href="{{ route('wish.fulfillment.show', $fulfillment) }}">
        <header>
            {{ $fulfillment->giver->name }} offered their help on {{ $fulfillment->created_at }}
        </header>
        </a>
    </article>
@endforeach