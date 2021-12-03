<div class="flex flex-col w-full items-center mt-4 py-12">
        <div class="pb-12">
            <p class="text-2xl bg-light-purple p-4 rounded-lg font-salsa inline">
                Shared With You
            </p>
        </div>
    @foreach($user->shared_with as $item)

        <div class="flex flex-col bg-dash w-3/4 p-12 items-center gap-y-6 font-salsa rounded-lg">
            <div>
                <div class="font-bold">{{$item->user_info->username}}, has shared this with you.</div>
                <div class="text-center">Message: {{$item->message}}</div>
            </div>

            <div class="flex flex-col items-center">
                <div class="text-center text-xl">{{$item->book_info->title}}</div>
                <img src="{{$item->book_info->thumbnail}}" class="rounded-lg w-64 h-96">
            </div>
            <div>
                <button class="p-1 bg-blue-500 rounded-lg text-lg">Read</button>
            </div>
        </div>

    @endforeach
</div>
