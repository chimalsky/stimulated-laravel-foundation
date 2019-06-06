@extends('layouts.web')

@section('content')

<main class="grid-container grid-x align-center">


    <header class="cell medium-9 large-7">
        <h1>
            You might be able to help {{ $wish->user->name }} with their wish?
        </h1>
        <p>
            {{ $wish->title }}
        </p>
    </header>

    <form action="{{ route('wish.fulfillment.store', $wish) }}"
        method="post"
        class="cell medium-9 large-7 grid-x grid-margin-y">

        @csrf

        <input name="recipient" value="{{ $wish->user_id }}" type="hidden" />

        <div class="cell">
            <trix-editor input="introduction">
            </trix-editor>
            <input id="introduction" type="hidden" name="introduction" />
        </div>

        <button class="button">
            Introduce yourself and begin the conversation
        </button>
    </form>

</main>

@endsection