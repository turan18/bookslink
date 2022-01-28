<section class="mt-16 bg-background-1 flex justify-center">

    <div class="flex flex-col lg:flex-row md:flex-row w-full lg:w-5/6 md:w-5/6 gap-x-12">

        <div class="flex flex-col mt-8 w-1/2 lg:w-1/5 md:w-1/5 text-white self-center lg:self-start md:self-start">
            <div class="flex justify-center pb-2">
                <img src="{{$item['large-thumbnail'] ?? $item['thumbnail'] }}}}" class="w-full h-full rounded-lg bg-cover" alt="Thumbnail">
            </div>
            <div class="flex justify-center pb-2">
                <div class="flex stars-container">
                    @isset($item['full_rating'])
                        <x-main.stars :rating="$item['full_rating']"></x-main.stars>
                    @else
                        <x-main.stars :rating="0"></x-main.stars>
                    @endisset
                </div>
            </div>
            <div class="flex justify-center">
                <form method="POST" action="{{route('add_to_favorites')}}" class="flex flex-col justify-center">
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
                    <input type="hidden" name="link" value="{{$item['link']}}">



                    @auth
                        @if(is_object($item) && auth()->user()->favorite_books->where('book_id',$item->id)->count() > 0)
                            <div class="font-salsa">Add to Favorites</div>
                            <button class="p-1 rounded-lg text-red-500" type="submit">
                                <i class="fas fa-heart fa-2x"></i>
                            </button>
                        @else
                            <div class="font-salsa">Add to Favorites</div>
                            <button class="fav-btn p-1 rounded-lg" type="submit">
                                <i class="fas fa-heart fa-2x"></i>
                            </button>
                        @endif
                    @else
                        <div class="font-salsa">Add to Favorites</div>
                        <button class="text-gray-500 p-1 rounded-lg" type="submit" disabled>
                            <i class="fas fa-heart fa-2x"></i>
                        </button>
                    @endauth


                </form>
            </div>
        </div>
        <div class="flex flex-col w-full flex flex-col">
            <div class="text-white text-4xl font-salsa">
                <p class="text-3xl lg:text-3xl md:text-3xl font-extrabold text-center">
                    {{$item['title']}}
                </p>
            </div>

            <div class="flex flex-col lg:flex-row md:flex-row p-5 lg:p-10 md:p-10 text-lg lg:h-1/2 md:h-1/2 gap-y-4">
                <div class="flex flex-col text-white w-full lg:w-1/2 md-1/2 justify-around pr-5 lg:border-r-2 md:border-r-2 lg:border-white md:border-white gap-y-4">
                    <div class="flex flex-col lg:flex-row md:flex-row justify-between">
                        <p class="text-indigo-300 font-aleg font-extrabold">Author(s)-</p>
                        <p class="text-white font-aleg font-bold">
                            @isset($item['authors'])
                                {{$item['authors']}}
                            @else
                                N/A
                            @endisset
                        </p>
                    </div>
                    <div class="flex flex-col lg:flex-row md:flex-row  justify-between">
                        <p class="text-indigo-300 font-aleg  font-extrabold">Publisher-</p>
                        <p class="text-white font-aleg  font-bold">
                            @if(isset($item['publisher']) && strlen($item['publisher']) > 1)
                                {{$item['publisher']}}
                            @else
                                N/A
                            @endif

                        </p>
                    </div>
                    <div class="flex flex-col lg:flex-row md:flex-row  justify-between">
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
                <div class="flex flex-col w-full justify-around  lg:pl-5 md:pl-5 lg:w-1/2 md:w-1/2 text-lg gap-y-4">
                    <div class="flex flex-col lg:flex-row md:flex-row justify-between text-white">
                        <p class="text-indigo-300 font-aleg  font-extrabold">Category-</p>
                        <p class="text-white font-aleg  font-bold">
                            @isset($item['categories'])
                                {{$item['categories']}}
                            @else
                                N/A
                            @endisset
                        </p>
                    </div>
                    <div class="flex flex-col lg:flex-row md:flex-row justify-between text-white">
                        <p class="text-indigo-300  font-aleg font-extrabold">ISBN-13-</p>
                        <p class="text-white font-aleg  font-bold">
                            @isset($item['isbn_13'])
                                {{$item['isbn_13']}}
                            @else
                                N/A
                            @endisset
                        </p>
                    </div>
                    <div class="flex flex-col lg:flex-row md:flex-row justify-between text-white">
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

            <div class="px-2 w-full">
                <div class="rounded-lg bg-indigo-900 mt-8 p-3 w-full flex justify-center">
                    <p class="text-white font-aleg leading-loose text-md break-all ">
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

            <div class="flex justify-center lg:justify-end md:justify-end mt-8">
                <div class="flex w-3/4 justify-center lg:w-1/4 md:w-1/4 lg:justify-end md:justify-end text-white gap-x-4">
                    @auth()
                        <button id="readButton" class="bg-blue-800 hover:bg-blue-500 font-salsa rounded-lg p-2 w-1/3 disabled:opacity-10" onclick="loadBook('{{$item['isbn_13']}}')">Read</button>
                        <button class="bg-blue-800 hover:bg-blue-500 font-salsa rounded-lg p-2 w-1/3" onclick="shareSearch()">Share</button>
                    @else
                        <button class="bg-gray-600 font-salsa rounded-lg p-2 w-1/3 cursor-not-allowed" disabled>Read</button>
                        <button class="bg-gray-600 font-salsa rounded-lg p-2 w-1/3 cursor-not-allowed" disabled>Share</button>
                    @endauth


                    <a class="bg-blue-800 hover:bg-blue-500 font-salsa rounded-lg p-2 w-1/3 text-center" href="{{$item['link']}}">Preview</a>
                </div>
            </div>

        </div>
    </div>
</section>
