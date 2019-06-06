@extends('layouts.web')

@section('content')
<section class="grid-container grid-x grid-margin-x grid-margin-y">

    <header class="cell grid-x align-justify">
        <p class="cell shrink">
            {{ $fulfillment->giver->name }} 

            helping 
            
            {{ $fulfillment->recipient->name }} finding 
            <a href="{{ route('wish.show', $fulfillment->wish) }}">
                {{ $wish->title }}
            </a>
        </p>

        @if ($fulfillment->wish->fulfilled)
            @if ($fulfillment->fulfilled)
             <p class="cell shrink callout success">
                    This wish has been fulfilled, but the conversation can continue
                </p>
            @else
                <p class="cell shrink callout success">
                    This wish has been fulfilled by someone else, but conversations can continue
                </p>
            @endif
        @endif
    </header>

    <section class="cell">
        @foreach ($fulfillment->comments as $comment)
            <div class="grid-x cell">
                @include('comment.item', ['comments' => $comment, 'alignRight' => ($comment->creator->id == $fulfillment->recipient->id)])
            </div>
        @endforeach

        @can('attachComment', $fulfillment)
            @include('wish.fulfillment.comment-form', $fulfillment)
        @endcan
    </section>

    @unless ($fulfillment->wish->fulfilled)
        <footer class="cell grid-x align-right">
            @can('update', $fulfillment)
                <form action="{{ route('wish.fulfillment.update', $fulfillment) }}" method="post">
                    @csrf 
                    @method('put')

                    <input type="hidden" name="status" value=2 />
                
                    <button class="button cell shrink hollow">
                        {{ $fulfillment->giver->name }} helped me and now I've gotten my wish!
                    </button>
                </form>
            @endcan
        </footer>
    @endunless

</section>
@endsection