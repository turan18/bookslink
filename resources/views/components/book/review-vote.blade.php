@auth
    {{--                                The current user has voted and their vote was an upvote--}}
    @if($review->user_votes->contains('user_id',auth()->user()->id) && $review->user_votes()->where('user_id',auth()->user()->id)->first()->upvote)
        <button id="like-{{$loop->index}}" onclick="likeReview({{$review->id}},this,{{$loop->index}},true,false)">
            <span class="text-xs">{{$review->upvote}}</span>
            <span class="text-xs">likes</span>
            <i class="far fa-thumbs-up hover:text-blue-500 text-blue-500"></i>
        </button>
        <button id="dislike-{{$loop->index}}" onclick="dislikeReview({{$review->id}},this,{{$loop->index}},true,false);">
            <span class="text-xs">{{$review->downvote}}</span>
            <span class="text-xs">dislikes</span>
            <i class="far fa-thumbs-down hover:text-red-500"></i>
        </button>
        {{--                                The current user has voted and their vote was a downvote--}}
    @elseif($review->user_votes->contains('user_id',auth()->user()->id) && $review->user_votes()->where('user_id',auth()->user()->id)->first()->downvote)
        <button id="like-{{$loop->index}}" onclick="likeReview({{$review->id}},this,{{$loop->index}},false,true)">
            <span class="text-xs">{{$review->upvote}}</span>
            <span class="text-xs">likes</span>
            <i class="far fa-thumbs-up hover:text-blue-500"></i>
        </button>
        <button id="dislike-{{$loop->index}}" onclick="dislikeReview({{$review->id}},this,{{$loop->index}},false,true)">
            <span class="text-xs">{{$review->downvote}}</span>
            <span class="text-xs">dislikes</span>
            <i class="far fa-thumbs-down hover:text-red-500 text-red-500"></i>
        </button>
        {{--                                    The current user has not voted at all--}}
    @else
        <button id="like-{{$loop->index}}" onclick="likeReview({{$review->id}},this,{{$loop->index}})">
            <span class="text-xs">{{$review->upvote}}</span>
            <span class="text-xs">likes</span>
            <i class="far fa-thumbs-up hover:text-blue-500"></i>

        </button>
        <button id="dislike-{{$loop->index}}" onclick="dislikeReview({{$review->id}},this,{{$loop->index}})">
            <span class="text-xs">{{$review->downvote}}</span>
            <span class="text-xs">dislikes</span>
            <i class="far fa-thumbs-down hover:text-red-500"></i>
        </button>
    @endif
@else
    <button>
        <span class="text-xs">{{$review->upvote}}</span>
        <span class="text-xs">likes</span>
        <i class="far fa-thumbs-up hover:text-blue-500"></i>

    </button>
    <button>
        <span class="text-xs">{{$review->downvote}}</span>
        <span class="text-xs">dislikes</span>
        <i class="far fa-thumbs-down hover:text-red-500"></i>
    </button>
@endauth
