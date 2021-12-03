<div class="flex flex-col mt-2 py-12 w-full">
    <div class="pb-12 text-center">
        <p class="text-2xl bg-light-purple p-4 rounded-lg font-salsa inline">
            Following
        </p>
    </div>
    <div class="flex justify-center w-full mt-12">
        @if($user->following->count() > 0)
            <div class="flex justify-between gap-12 flex-wrap w-5/6 lg:w-3/4 md:w-3/4 px-2 lg:px-12 md:px-12 bg-dash py-12 rounded-lg">
                @foreach($user->following as $following)
                    <div class="w-full lg:w-follow-lg md:w-5/12 p-2">
                        <div class="flex bg-light-purple py-4 pl-4 rounded-lg gap-x-4">
                            <div class="1/2 flex flex-col self-center font-salsa">
                                <img src="https://picsum.photos/seed/picsum/100/100" class="rounded-lg">
                                <div class="flex justify-center mt-2">
                                    <button id="unfollow_button-{{$loop->index}}" class="p-1 bg-red-500 text-white text-sm rounded-lg" onclick="unfollowUser({{$following->id}},{{$loop->index}})">Unfollow</button>
                                </div>
                            </div>
                            <div class="flex flex-col w-3/4 pr-2">
                                <div class="flex justify-between pb-2 font-salsa">
                                    <div class="pb-2 text-lg font-bold">{{$following->username}}</div>
                                    <div>
                                        <button class="p-1 bg-blue-500 text-white text-xs lg:text-sm md:text-sm rounded-lg">View Profile</button>
                                    </div>
                                </div>
                                <div class="pr-1 h-full">
                                    @isset($following->about_me)

                                        <p class="p-2 bg-background-1 rounded-lg font-aleg h-full">{{$following->about_me}}</p>
                                    @else
                                        <p class="p-2 bg-background-1 rounded-lg font-aleg h-full">N/A</p>
                                    @endisset

                                </div>

                            </div>

                        </div>
                    </div>

                @endforeach
            </div>
        @else
            <div class="flex justify-center font-salsa"><p class="text-lg">Sorry. No users found.</p></div>
        @endif

    </div>
</div>


