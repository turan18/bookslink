@if(count($items) > 0)

    @foreach($items as $item)
        <div class="flex">
            <div class="w-1/3 flex pl-12">
                <img class="h-sm-book-h w-sm-book-w rounded-lg" src="{{$item['large-thumbnail'] ?? $item['thumbnail']}}">
            </div>
            <div class="w-2/3 bg-light-purple rounded-xl flex flex-col px-4 py-2">

                <div class="flex border-b border-black pb-2">
                    <div class="flex flex-col w-3/4">
                        <p class="font-extrabold font-aleg text-lg pb-2">{{$item['title']}}</p>
                        <div class="flex justify-start pb-2">
                            <div class="flex stars-container">
                                @isset($item['full_rating'])
                                    <x-main.stars :rating="$item['full_rating']"></x-main.stars>
                                @else
                                    <x-main.stars :rating="0"></x-main.stars>
                                @endisset
                            </div>
                        </div>
                        <p class="text-sm">By:
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
                    <p class="font-salsa">
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
    <p>No more results.</p>
@endif
