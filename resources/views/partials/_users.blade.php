@if(count($users) > 0)
        <div class="flex flex-col items-center lg:flex-rox md:flex-row md:justify-between lg:justify-between lg:flex-wrap md:flex-wrap lg:px-12 md:px-12 gap-12 ">
            @foreach($users as $user)
                <div class="w-5/6 lg:w-5/12 md:w-5/12">
                    <div class="flex bg-light-purple py-4 pl-4 rounded-lg gap-x-4">
                        <div class="w-1/2 flex flex-col self-center">
                            <div class="flex justify-center w-full">
                                @isset($user->avatar)
                                    <img id="avatar_pic" src="{{asset('storage/' . $user->avatar)}}" class="bg-cover w-3/4 h-screen/8 rounded-lg">
                                @else
                                    <img id="avatar_pic" src='images/default-user.png' class="bg-cover w-3/4 h-screen/8 rounded-lg">

                                @endisset
                            </div>

                            <div class="flex justify-center mt-2">
                                @auth()
                                    @unless(auth()->user()->id == $user->id)

                                        @if($user->followers->contains('id',auth()->user()->id))
                                            <button id="unfollow_button-{{$loop->index}}" class="p-1 bg-red-500 text-white text-sm rounded-lg" onclick="unfollowUser({{$user->id}},{{$loop->index}})">Unfollow</button>
                                        @else
                                            <button id="follow_button-{{$loop->index}}" class="p-1 bg-blue-500 text-white text-sm rounded-lg" onclick="followUser({{$user->id}},{{$loop->index}})">Follow</button>
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
                            <div class="pr-1">
                            @isset($user->about_me)
                                <p class="p-2 pb-6 bg-background-1 rounded-lg font-aleg h-full">{{$user->about_me}}</p>
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

