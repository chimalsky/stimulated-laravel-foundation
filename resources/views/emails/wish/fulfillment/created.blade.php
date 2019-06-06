<div class="grid-x">
    <p class="cell">
        Hi, {{ $fulfillment->recipient->name }}, it looks like someone's reaching out to help you.
    </p>

    <p class="cell">
        {{ $fulfillment->giver->name }} said:

        {!! $fulfillment->introduction->body !!}
    </p>

    <a class="button" href="{{ route('wish.fulfillment.show', $fulfillment) }}">
        Respond to {{ $fulfillment->giver->name }}
    </a>

    <p class="text-right">
        {{ $fulfillment->created_at }}
    </p>
</div>
