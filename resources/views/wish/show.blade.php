@extends('layouts.web')

@section('content')

<header>
    @include('wish.title', $wish)
</header>

<main class="grid-x">
    <p class="cell">
        {!! $wish->description !!}
    </p>

    <p class="cell text-right">
        {{ $wish->user->name }} wished for this on <span data-controller="date">{{ $wish->created_at }}</span>
    </p>

    <section class="cell grid-x">
        @can('delete', $wish)
            <form action="{{ route('wish.destroy', $wish) }}" method="post" class="cell">
                @csrf 
                @method('delete')

                <button class="button alert">
                    I don't need this anymore. Cancel it.
                </button>
            </form>
        @endcan

        @guest
            <a href="{{ route('login') }}" class="button cell shrink">
                I may be able to help {{ $wish->user->name }} with this
            </a>
        @else
            @can('fulfill', $wish)
                <a href="{{ route('wish.fulfillment.create', $wish) }}" class="button cell shrink">
                    I may be able to help {{ $wish->user->name }} with this
                </a>
            @endcan
        @endguest
    </section>

    <section class="cell">
        @isset($wish->fulfillments)
            <div class="callout">
                @include('wish.fulfillment.list', ['fulfillments' => $wish->fulfillments])
            </div>
        @endisset
    </section>
</main>

@endsection