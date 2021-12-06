@isset($recommended_books)
    @foreach($recommended_books as $book)
        <div id="container" class="relative w-1/2 lg:w-1/5">
            <div id="wrapper" class="absolute top-0 w-full h-full bg-gray-800 rounded-lg opacity-50 hidden"></div>
            <img src="{{$book['large-thumbnail'] ?? $book['thumbnail']}}" class="rounded-lg w-full h-full">
            <a id="read_link" class="view absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
        text-white py-2 px-4 text-sm rounded-lg border-2 border-white hover:bg-blue-500 hidden"
               href="resource/book/{{urlencode($book['title'])}}?volume_id={{$book['volume_id']}}">View</a>
        </div>
    @endforeach
@endisset

