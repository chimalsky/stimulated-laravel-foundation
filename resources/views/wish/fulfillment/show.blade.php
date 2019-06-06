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
</header>

<section class="cell">
    @foreach ($fulfillment->comments as $comment)
        <div class="grid-x cell
            @if ($comment->creator->id == $fulfillment->recipient->id)
                align-right text-right
            @endif
            ">
            @include('comment.item', ['comments' => $comment])
        </div>
    @endforeach

    @can('update', $fulfillment)
        @include('wish.fulfillment.comment-form', $fulfillment)
    @endcan
</section>

</section>
@endsection