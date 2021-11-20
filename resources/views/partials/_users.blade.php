@if(count($users) > 0)
        <div class="flex justify-between gap-12 flex-wrap px-12">
            @foreach($users as $user)
                <div class="w-5/12">
                    <div class="flex bg-light-purple py-4 pl-4 rounded-lg gap-x-4">
                        <div class="1/2 flex flex-col self-center">
                            <img src="https://picsum.photos/seed/picsum/100/100" class="rounded-lg">
                            <div class="flex justify-center mt-2">
                                @auth()
                                    @unless(auth()->user()->id == $user->id)
                                        @if(auth()->user()->following->contains('user_id',$user->id))
                                            <button id="unfollow_button" class="p-1 bg-red-500 text-white text-sm rounded-lg" onclick="unfollowUser({{auth()->user()->id}},{{$user->id}})">Unfollow</button>
                                        @else
                                            <button id="follow_button" class="p-1 bg-blue-500 text-white text-sm rounded-lg" onclick="followUser({{auth()->user()->id}},{{$user->id}})">Follow</button>
                                        @endif
                                    @endunless
                                @else
                                    <button id="follow_button" class="p-1 bg-gray-500 text-white text-sm rounded-lg disabled">Follow</button>

                                @endauth
                            </div>
                        </div>
                        <div class="flex flex-col w-3/4 pr-2">
                            <div class="flex justify-between pb-2">
                                <div class="text-salsa pb-2 text-lg font-salsa font-bold">{{$user->username}}</div>
                                <div>
                                    <button class="p-1 bg-blue-500 text-white text-sm rounded-lg">View Profile</button>
                                </div>
                            </div>
                            <div class="pr-1 h-full">
                            @isset($user->about_me)

                                <p class="p-2 bg-background-1 rounded-lg font-aleg h-full">{{$user->about_me}}</p>
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

