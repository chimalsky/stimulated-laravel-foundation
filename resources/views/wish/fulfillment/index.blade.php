@extends ('layouts.web')

@section ('content')

<main class="grid-x">
    @isset($user)   
        <h1 class="cell">
            Wish Fulfillments for {{ $user->name }} 
        </h1>
    @endisset

    @foreach ($fulfillments as $fulfillment)
        <article class="cell">
            <a href="{{ route('wish.fulfillment.show', $fulfillment) }}">
            <header>
                {{ $user->name }} offered their help to {{ $fulfillment->recipient->name }} -- {{ $fulfillment->wish->title }}
                
                on {{ $fulfillment->created_at }}
            </header>
            </a>
        </article>
    @endforeach
</main>

@endsection