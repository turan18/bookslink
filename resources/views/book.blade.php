<html lang="en">
<head>
    <x-main.head></x-main.head>
    <link href="{{asset('css/rating.css')}}" rel="stylesheet" type="text/css">
    <title>{{$item['title']}}</title>
</head>

<body class="bg-background-1">



<x-main.navbar></x-main.navbar>



<section class="mt-16 bg-background-1">

    <div class="flex mx-48 gap-x-12">

        <div class="flex flex-col mt-8 w-1/5 text-white self-start">

            <div class="flex justify-center h-5/6 max-h-5/6">
                <img src="{{$item['large-thumbnail'] ?? $item['thumbnail'] }}}}" class="max-h-full rounded-lg bg-cover" alt="Thumbnail">
            </div>
            <div class="text-center">5 stars</div>
            <div class="flex justify-center">
                <form method="POST" action="{{route('add_to_favorites')}}">
                    @csrf
                    <input type="hidden" name="volume_id" value="{{$item['volume_id']}}">
                    <input type="hidden" name="title" value="{{urldecode($item['title'] ?? null)}}">
                    <input type="hidden" name="authors" value="{{$item['authors'] ?? null}}">
                    <input type="hidden" name="categories" value="{{$item['categories'] ?? null}}">
                    <input type="hidden" name="description" value="{{$item['description'] ?? null}}">
                    <input type="hidden" name="isbn_13" value="{{$item['isbn_13'] ?? null}}">
                    <input type="hidden" name="publisher" value="{{$item['publisher'] ?? null}}">
                    <input type="hidden" name="publication_date" value="{{$item['publication_date'] ?? null}}">
                    <input type="hidden" name="page_count" value="{{$item['page_count'] ?? null}}">
                    <input type="hidden" name="thumbnail" value="{{(($item['large-thumbnail']) ?? $item['thumbnail'])}}">



                    @auth
                        @if(is_object($item) && auth()->user()->favorite_books->where('book_id',$item->id)->count() > 0)
                        <button class="p-1 rounded-lg text-red-500" type="submit">
                            <i class="fas fa-heart fa-2x"></i>
                        </button>
                        @else
                            <button class="fav-btn p-1 rounded-lg" type="submit">
                                <i class="fas fa-heart fa-2x"></i>
                            </button>
                        @endif
                    @else
                        <button class="text-gray-500 p-1 rounded-lg" type="submit" disabled>
                            <i class="fas fa-heart fa-2x"></i>
                        </button>
                    @endauth


                </form>
            </div>
        </div>
        <div class="flex flex-col w-full flex flex-col">
            <div class="text-white text-4xl font-salsa pl-10">
                <p class="text-3xl font-extrabold text-center">
                    {{$item['title']}}
                </p>
            </div>

            <div class="flex p-10 text-lg h-1/2">
                <div class="flex flex-col text-white w-1/2 justify-around pr-5 border-r-2 border-white">
                    <div class="flex justify-between">
                        <p class="text-indigo-300 font-aleg font-extrabold">Author(s)-</p>
                        <p class="text-white font-aleg font-bold">
                            @isset($item['authors'])
                                {{$item['authors']}}
                            @else
                                N/A
                            @endisset
                        </p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-indigo-300 font-aleg  font-extrabold">Publisher-</p>
                        <p class="text-white font-aleg  font-bold">
                            @if(isset($item['publisher']) && strlen($item['publisher']) > 1)
                                {{$item['publisher']}}
                            @else
                                N/A
                            @endif

                        </p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-indigo-300 font-aleg  font-extrabold">Publication Date-</p>
                        <p class="text-white font-aleg  font-bold">
                            @isset($item['publication_date'])
                                {{$item['publication_date']}}
                            @else
                                N/A
                            @endisset
                        </p>
                    </div>
                </div>

{{--                The two columns--}}
                <div class="flex flex-col w-1/2 justify-around pl-5 text-lg">
                    <div class="flex justify-between text-white">
                        <p class="text-indigo-300 font-aleg  font-extrabold">Category-</p>
                        <p class="text-white font-aleg  font-bold">
                            @isset($item['categories'])
                                    {{$item['categories']}}
                            @else
                                N/A
                            @endisset
                        </p>
                    </div>
                    <div class="flex justify-between text-white">
                        <p class="text-indigo-300  font-aleg font-extrabold">ISBN-13-</p>
                        <p class="text-white font-aleg  font-bold">
                            @isset($item['isbn_13'])
                                {{$item['isbn_13']}}
                            @else
                                N/A
                            @endisset
                        </p>
                    </div>
                    <div class="flex justify-between text-white">
                        <p class="text-indigo-300 font-aleg  font-extrabold">Page Count-</p>
                        <p class="text-white font-aleg font-bold">
                            @isset($item['page_count'])
                                {{$item['page_count']}} pages
                            @else
                                N/A
                            @endisset
                        </p>
                    </div>
                </div>
            </div>
            <div class="rounded-lg bg-indigo-900 mt-8 mx-12 p-3 w-full flex justify-center">
                <p class="text-white font-aleg leading-loose text-md">
                    @if(isset($item['description']) && strlen($item['description']) > 0)
                        @if(str_word_count($item['description']) > 80)
                            {{implode(' ', array_slice(explode(' ', $item['description']), 0, 80))}}
                            <span id="ellipses">...</span>
                            <span id="show-more">
                                        <button id="show_more_button" class="text-yellow-800" onclick="showMore()">Show more</button>
                                        <span id="more-content" class="hidden">{{implode(' ', array_slice(explode(' ', $item['description']), 80, strlen($item['description'])))}}</span>
                                    </span>

                            <span id="less-content" class="hidden">
                                         <button id="show_less_button" class="text-yellow-800" onclick="showLess()">Show less</button>
                                    </span>
                        @else
                            {{$item['description']}}
                        @endif

                    @else
                        No description.
                    @endif
                </p>
            </div>
        </div>
    </div>
</section>


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



    @isset($reviews)
{{--        <div class="mt-12">--}}
{{--            <p class="text-4xl text-white pl-10 font-salsa underline">--}}
{{--                {{$reviews->count()}} Review(s)--}}
{{--            </p>--}}
{{--        </div>--}}
        <div class="flex flex-col text-lg w-2/6 gap-y-12 mt-12 ml-10">
            @foreach ($reviews as $review)
                <div class="flex gap-x-2 w-full pl-2 pr-4 py-2 bg-gray-200 rounded-lg">
                    <div class="w-1/5 self-center py-4">
                        <div class="flex justify-center" >
                            <img src="https://picsum.photos/seed/picsum/100/100" class="rounded-lg">
                        </div>
                        <div class="flex justify-center mt-2">
                            <button class="p-1 bg-blue-500 text-white text-sm rounded-lg">Follow</button>
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
        <div class="mt-12">
            <p class="text-4xl text-white pl-10 font-salsa underline">
                No reviews yet.
            </p>
        </div>
    @endisset


    </div>

</section>



<x-main.flash></x-main.flash>


<script>
    const ellipses = document.querySelector('#ellipses');
    const show_more_button = document.querySelector('#show_more_button');
    const show_less_button = document.querySelector('#show_less_button');
    const show_more = document.querySelector('#more-content');
    const show_less = document.querySelector('#less-content');


    function showMore(){

        ellipses.classList.add('hidden');
        show_more_button.classList.add('hidden');
        show_more.classList.remove('hidden');
        show_less.classList.remove('hidden');
        show_less_button.classList.remove('hidden');

    }
    function showLess(){
        ellipses.classList.remove('hidden');
        show_more_button.classList.remove('hidden');
        show_more.classList.add('hidden');
        show_less.classList.add('hidden');
        show_less_button.classList.add('hidden');

    }

</script>
</body>
</html>
