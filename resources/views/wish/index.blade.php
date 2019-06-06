@extends('layouts.web')

@section('content')

    @isset($user)
        <h1>
            @if (request()->query('fulfilled'))
                <span>
                    Fulfilled
                </span>
            @endif
            Wishes for {{ $user->name }}
        </h1>
    @endisset

    
    @include('wish.list', $wishes)

    <footer class="cell grid-x grid-margin-y align-right">
        @if (request()->query('fulfilled'))
            <a class="cell button hollow shrink" href="{{ route('wish.index', [
                'user' => $user->id ?? null
            ]) }}">
                See only unfulfilled Wishes 
            </a>
        @else
            <a class="cell button hollow shrink" href="{{ route('wish.index', [
                'fulfilled' => true,
                'user' => $user->id ?? null
                ]) }}">
                See a list of Fulfilled Wishes 
            </a>
        @endif
    </footer>

@endsection