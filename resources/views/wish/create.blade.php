@extends('layouts.web')

@section('content')
<main class="grid-container grid-x grid-padding-y align-center">
    <form action="{{ route('wish.store') }}" method="post"
        class="cell medium-10 large-8 grid-x grid-margin-y">
        @csrf 

        
        @if ($errors->any())
            <div class="callout alert cell">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="cell">
            <input type="text" name="title" placeholder="Short description of what you need" />
        </div>

        <div class="cell">
            <label>
                Extra Information that would be helpful:
            </label>
            <trix-editor input="description">
            </trix-editor>
            <input id="description" type="hidden" name="description" />
        </div>

        <div class="cell align-center">
            <button class="button cell shrink">
                Wish It
            </button>
        </div>
    </form>
</main> 
@endsection