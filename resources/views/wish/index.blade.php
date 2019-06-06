@extends('layouts.web')

@section('content')

    @isset($user)
        <h1>
            Wishes for {{ $user->name }}
        </h1>
    @endisset

    
    @include('wish.list', $wishes)

@endsection