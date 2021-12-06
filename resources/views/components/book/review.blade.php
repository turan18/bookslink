<section class="bg-indigo-800 mt-36 pb-48">
    <div class="flex justify-center">
        <p class="text-white font-salsa text-3xl pt-4">
            Read this book already? Write a review!</p>
    </div>
    <div class="flex justify-center mt-16">
        <div class="w-2/6 rounded-lg bg-indigo-300 py-2">
            <div class="p-7">
                <form class="max-h-full" method="POST" action="/review">
                    @csrf
                    <input type="hidden" name="volume_id" value="{{$item['volume_id']}}">
                    <input type="hidden" name="title" value="{{urldecode($item['title']) ?? null}}">
                    <input type="hidden" name="authors" value="{{$item['authors'] ?? null}}">
                    <input type="hidden" name="categories" value="{{$item['categories'] ?? null}}">
                    <input type="hidden" name="isbn_13" value="{{$item['isbn_13'] ?? null}}">
                    <input type="hidden" name="publisher" value="{{$item['publisher'] ?? null}}">
                    <input type="hidden" name="publication_date" value="{{$item['publication_date'] ?? null}}">
                    <input type="hidden" name="page_count" value="{{$item['page_count'] ?? null}}">
                    <input type="hidden" name="description" value="{{$item['description'] ?? null}}">
                    <input type="hidden" name="thumbnail" value="{{$item['large-thumbnail'] ?? $item['thumbnail']}}">
                    <input type="hidden" name="link" value="{{$item['link']}}">


                    <div class="w-full h-3/5">
                        <textarea class="rounded-lg py-1 px-1 font-salsa w-full h-full " placeholder="Say something.." name="review"></textarea>
                    </div>
                    <div class="flex justify-between pr-2 pt-2 mt-2">
                        <div class="rating">

                            <input id="r5" name="rating" type="radio" value="5" class="btn hidden" required />
                            <label for="r5" ><i class="fa fa-star"></i></label>
                            <input id="r4" name="rating" type="radio" value="4" class="btn hidden" />
                            <label for="r4" ><i class="fa fa-star"></i></label>
                            <input id="r3" name="rating" type="radio" value="3" class="btn hidden" />
                            <label for="r3" ><i class="fa fa-star"></i></label>
                            <input id="r2" name="rating" type="radio" value="2" class="btn hidden" />
                            <label for="r2" ><i class="fa fa-star"></i></label>
                            <input id="r1" name="rating" type="radio" value="1" class="btn hidden" />
                            <label for="r1" ><i class="fa fa-star"></i></label>
                        </div>

                        <button type="submit" class="bg-light-purple p-1 font-salsa rounded-lg text-white">Publish</button>
                    </div>

                </form>
            </div>

        </div>
    </div>



    @if(isset($reviews) && $reviews->count() > 0)
        <div class="mt-12">
            <p class="text-4xl text-white pl-10 font-salsa underline">
                @if($reviews->count() == 1)
                    {{$reviews->count()}} Review

                @else
                    {{$reviews->count()}} Review(s)
                @endif

            </p>


        </div>
        <div class="flex flex-col text-lg w-review gap-y-12 mt-12 ml-10">
            @foreach ($reviews as $review)
                <div class="flex gap-x-2 w-full pl-2 pr-4 py-2 bg-gray-200 rounded-lg">
                    <div class="flex flex-col w-1/5 self-center py-2 h-full">
                        <div class="flex h-screen/8 self-center">
                            @isset($review->user->avatar)
                                <img id="avatar_pic" src="{{asset('storage/' . $review->user->avatar)}}" class="bg-cover max-w-full w-full h-full rounded-lg">
                            @else
                                <img id="avatar_pic" src='images/default-user.png' class="bg-cover max-w-full w-full h-full rounded-lg">

                            @endisset

                        </div>
                        <div class="flex justify-center mt-2">
                            @auth()
                                @unless(auth()->user()->id == $review->user->id)
                                    @if($review->user->followers->contains('id',auth()->user()->id))
                                        <button id="unfollow_button-{{$loop->index}}" class="p-1 bg-red-500 text-white text-sm rounded-lg" onclick="unfollowUser({{$review->user->id}},{{$loop->index}})">Unfollow</button>
                                    @else
                                        <button id="follow_button-{{$loop->index}}" class="p-1 bg-blue-500 text-white text-sm rounded-lg" onclick="followUser({{$review->user->id}},{{$loop->index}})">Follow</button>
                                    @endif
                                @endunless
                            @endauth
                        </div>
                    </div>
                    <div class="w-4/5 flex flex-col pb-2">
                        <div class="flex pb-2 justify-between">
                            <div>
                                <p class="font-bold text-xl font-salsa">
                                    {{$review->user->username}}
                                    <span class="text-xs font-aleg">● {{$review->created_at->diffForHumans()}}</span>
                                </p>
                            </div>
                            <div class="flex gap-x-4">
                                <button>
                                    <span class="text-xs">23 likes</span>
                                    <i class="far fa-thumbs-up"></i>

                                </button>
                                <button>
                                    <span class="text-xs">4 dislikes</span>
                                    <i class="far fa-thumbs-down"></i>
                                </button>

                            </div>
                        </div>

                        <div class="flex justify-start pb-2">
                            <div class="flex stars-container">
                                <x-main.stars :rating="$review->rating"></x-main.stars>
                            </div>
                        </div>
                        <div class="w-full text-sm bg-gray-300 rounded-lg max-h-full h-full">
                            <p class="break-words px-2 py-1">{{$review->review_body}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$reviews->links()}}


            @else
                <div class="mt-24 pl-10">
                    <p class="text-4xl text-white font-salsa">
                        No reviews yet.
                    </p>
                </div>
            @endif


        </div>

</section>
