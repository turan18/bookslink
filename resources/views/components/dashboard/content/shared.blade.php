<div class="flex flex-col w-full items-center mt-4 py-12">
        <div class="pb-12">
            <p class="text-2xl bg-light-purple p-4 rounded-lg font-salsa inline">
                Shared With You
            </p>
        </div>
    @foreach($user->shared_with->sortByDesc('created_at')->values() as $item)

        <div class="flex flex-col bg-dash w-5/6 lg:w-3/4 md:w-3/4 p-12 items-center gap-y-4 font-salsa rounded-lg">
            <div>
                <div class="text-center"><span class="font-extrabold">{{$item->user_info->username}}</span>, has shared this with you.</div>
                @if(isset($item->message))
                    <div class="text-center italic">
                            <p>"{{$item->message}}"</p>
                    </div>
                @endif

            </div>
            <div class="flex flex-col items-center gap-y-6">
                <div class="text-center text-xl">{{$item->book_info->title}}</div>
                <img src="{{$item->book_info->thumbnail}}" class="rounded-lg w-full lg:w-1/3 md:w-1/3">
            </div>
            <div>
                <a href="resource/book/{{urlencode($item->book_info->title)}}?volume_id={{$item->book_info->volume_id}}" class="p-1 bg-blue-500 rounded-lg text-lg">View</a>
            </div>
        </div>

    @endforeach
</div>
