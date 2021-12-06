<div class="flex flex-col mt-2 py-12 w-full">
    <div class="pb-12 text-center">
        <p class="text-2xl bg-light-purple p-4 rounded-lg font-salsa inline">
            Followers
        </p>
    </div>
    <div class="flex justify-center w-full mt-12">
        @if($user->followers->count() > 0)
            <div class="flex justify-between gap-12 flex-wrap w-5/6 lg:w-3/4 md:w-3/4 px-2 lg:px-12 md:px-12 bg-dash py-12 rounded-lg">
                @foreach($user->followers as $following_you)
                    <div class="w-full lg:w-follow-lg md:w-5/12 p-2">
                        <div class="flex bg-light-purple py-4 pl-4 rounded-lg gap-x-4">
                            <div class="w-1/2 flex flex-col self-center font-salsa">
                                <div class="flex justify-center w-full">
                                    @isset($following_you->avatar)
                                        <img id="avatar_pic" src="{{asset('storage/' . $following_you->avatar)}}" class="bg-cover w-3/4 h-screen/8 rounded-lg">
                                    @else
                                        <img id="avatar_pic" src='images/default-user.png' class="bg-cover w-3/4 h-screen/8 rounded-lg">

                                    @endisset
                                </div>
                                <div class="flex justify-center mt-2">
                                    @if($user->following->contains('id',$following_you->id))
                                        <button id="unfollow_button-{{$loop->index}}" class="p-1 bg-red-500 text-white text-sm rounded-lg" onclick="unfollowUser({{$following_you->id}},{{$loop->index}})">Unfollow</button>
                                    @else
                                        <button id="follow_button-{{$loop->index}}" class="p-1 bg-blue-500 text-white text-sm rounded-lg" onclick="followUser({{$following_you->id}},{{$loop->index}})">Follow</button>
                                    @endif

                                </div>
                            </div>
                            <div class="flex flex-col w-3/4 pr-2">
                                <div class="flex justify-between pb-2 font-salsa">
                                    <div class="pb-2 text-lg font-bold">{{$following_you->username}}</div>
                                    <div>
                                        <button class="p-1 bg-blue-500 text-white text-xs lg:text-sm md:text-sm rounded-lg">View Profile</button>
                                    </div>
                                </div>
                                <div class="pr-1">
                                    @isset($following_you->about_me)

                                        <p class="p-2 pb-6 bg-background-1 rounded-lg font-aleg h-full">{{$following_you->about_me}}</p>
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
