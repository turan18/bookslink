<section class="flex justify-center w-full mt-8 mb-12">
    <div id="all-items" class="bg-search-bg bg-opacity-70 w-full lg:w-2/3 md:w-3/4 px-3 rounded-xl">
        <div id="items-container" class="py-10 flex flex-col gap-y-16 text-white">
            @if(count($items) > 0)

                @foreach($items as $item)
                    <div class="flex flex-col lg:flex-row md:flex-row">
                        <div class="w-full lg:w-1/3 md:w-1/3 flex justify-center">
                            <img class="h-sm-book-h w-sm-book-w rounded-lg" src="{{$item['large-thumbnail'] ?? $item['thumbnail']}}">
                        </div>
                        <div class="w-full mt-4 lg:w-2/3 lg:mt-0 md:mt-0 md:w-2/3 bg-light-purple rounded-xl flex flex-col px-4 py-2">
                            <div class="flex border-b border-black pb-2">
                                <div class="flex flex-col w-3/4">
                                    <p class="font-extrabold font-aleg text-lg pb-1">{{$item['title']}}</p>
                                    <div class="flex justify-start pb-2">
                                        <div class="flex stars-container">
                                            @isset($item['full_rating'])
                                                <x-main.stars :rating="$item['full_rating']"></x-main.stars>
                                            @else
                                                <x-main.stars :rating="0"></x-main.stars>
                                            @endisset
                                        </div>
                                    </div>
                                    <p class="text-sm font-aleg">By:
                                        @if(isset($item['authors']))
                                            @if(! $item['multiple_authors'])
                                                {{$item['authors'][0]}}
                                            @else
                                                @foreach($item['authors'] as $key=>$value)
                                                    @unless($loop->last)
                                                        {{$value}},
                                                    @else
                                                        {{$value}}
                                                    @endunless

                                                @endforeach
                                            @endif
                                        @else
                                            <b>Author could not be retrieved.</b>
                                        @endif
                                    </p>

                                </div>
                                <div class="w-1/4 flex flex-col items-end">
                                    <form method="GET" class="w-1/2" action="resource/book/{{urlencode($item['title'])}}">
                                        <input type="hidden" name="volume_id" value="{{$item['volume_id']}}">
                                        <button class="bg-indigo-500 rounded-lg py-2 w-full" type="submit">View</button>
                                    </form>
                                </div>
                            </div>

                            <div class="mt-4 mb-2">
                                <p class="font-salsa break-words">
                                    @if(isset($item['description']))
                                        {!! $item['snippet'] !!}
                                    @else
                                        <b>Snippet could not be retrieved.</b>
                                    @endif
                                </p>
                            </div>

                        </div>
                    </div>

                @endforeach
            @else
                <p>No results found.</p>
            @endif
        </div>
        <div id='load' class="text-white flex justify-center pb-6">
            <button class="bg-light-purple p-3 rounded-lg" onclick="loadBooks()">Load more..</button>
        </div>
    </div>


</section>
