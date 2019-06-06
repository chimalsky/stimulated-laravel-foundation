@extends ('layouts.web')

@section ('content')

<main class="grid-x grid-margin-y">
    @isset($user)   
        <h1 class="cell">
            @if (request()->query('fulfilled'))
                <span>
                    Completed
                </span>
            @endif

            Wish Fulfillments                
            
            for {{ $user->name }}
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

    <footer class="cell grid-x grid-margin-y align-right">
        @if (request()->query('fulfilled'))
            <a class="cell button hollow shrink" href="{{ route('wish.fulfillment.index', [
                'user' => $user->id ?? null
            ]) }}">
                See only incomplete Fulfillments 
            </a>
        @else
            <a class="cell button hollow shrink" href="{{ route('wish.fulfillment.index', [
                'fulfilled' => true,
                'user' => $user->id ?? null
                ]) }}">
                See only completed Wish Fulfillments 
            </a>
        @endif
    </footer>
</main>

@endsection