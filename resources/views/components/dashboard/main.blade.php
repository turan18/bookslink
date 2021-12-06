<div class="w-full p-2 lg:p-16 md:p-6 bg-dash">
    <div id="main-content" class="bg-background-1  relative pb-48 rounded-lg flex flex-col lg:flex-row md:flex-row text-white">
        <div class="flex flex-col w-full lg:w-5/6 md:5/6 pl-4">
            <div class="pt-4">
                <p class="text-3xl lg:text-5xl md:text-5xl font-salsa text-center">Nice to see you, {{$user->username}}.</p>
            </div>
            <div class="flex flex-col gap-6 justify-evenly flex-1 p-4">
                <div class="bg-dash rounded-lg">
                    <p class="text-2xl font-salsa pl-2 text-center lg:text-left underline">Your recent favorites...</p>
                    <div class="flex flex-col items-center lg:flex-row lg:items-stretch md:flex-row md:items-stretch gap-4 mt-2 w-full lg:w-3/4 p-6">
                        @foreach($user->favorite_books->sortByDesc('created_at')->take(5)->values() as $book)
                            <div id="container" class="relative w-1/2 lg:w-1/5">
                                <div id="wrapper" class="absolute top-0 w-full h-full bg-gray-500 rounded-lg opacity-75 hidden"></div>
                                <img src="{{$book->info->thumbnail}}" class="rounded-lg w-full h-full">
                                <button id="readButton" class="view absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white py-2 px-4 text-sm rounded-sm border-2 border-white hover:bg-indigo-500 hidden" onclick="loadBook('{{$book->info->isbn_13}}')">Read</button>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="bg-dash rounded-lg">
                    <p class="text-2xl font-salsa pl-2 text-center lg:text-left underline">
                        Other books you may like...
                    </p>
                    <div id="recommended-container" class="flex flex-col items-center lg:flex-row lg:items-stretch md:flex-row md:items-stretch gap-4 mt-2 w-full p-6">

                    </div>
                </div>
            </div>
        </div>
        <div class="flex-1 p-12 lg:p-6 md:p-6">
            <p class="mt-8 text-center text-3xl font-salsa font-bold">Recent Followers</p>
            <div class="bg-dash 0 flex flex-col justify-center mt-4 gap-4 rounded-lg p-4">

                @foreach($user->followers->sortByDesc('followed_at')->take(5)->values()->reverse()  as $followers)
                    @unless($followers->id == $user->id)
                        <div class="flex flex-col justify-center items-center">
                            <div class="flex w-full justify-center">
                                @isset($followers->avatar)
                                    <img id="avatar_pic" src="{{asset('storage/' . $followers->avatar)}}" class="bg-cover w-3/4 h-screen/8 rounded-lg">
                                @else
                                    <img id="avatar_pic" src='images/default-user.png' class="bg-cover w-3/4 h-screen/8 rounded-lg">

                                @endisset
                            </div>
                            <div>
                                {{$followers->username}}
                            </div>
                            <div>
                                @if($user->following->contains('id',$followers->id))
                                    <button id="unfollow_button-{{$loop->index}}" class="p-1 bg-red-500 text-white text-sm rounded-lg" onclick="unfollowUser({{$followers->id}},{{$loop->index}})">Unfollow</button>
                                @else
                                    <button id="follow_button-{{$loop->index}}" class="p-1 bg-blue-500 text-white text-sm rounded-lg" onclick="followUser({{$followers->id}},{{$loop->index}})">Follow</button>
                                @endif
                            </div>
                        </div>
                    @endunless

                @endforeach
            </div>
        </div>


    </div>
</div>
