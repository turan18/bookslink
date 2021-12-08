

@guest
    <div class="flex justify-between items-center mt-2 mx-48 p-7 bg-background-1">
        <a href="/" class="text-white text-5xl font-salsa">Bookslink</a>
        <div class="flex">
            <nav class="flex font-aleg text-md space-x-16 px-12 py-3 rounded-xl bg-light-purple text-white text-lg">
                <a href="/">Home</a>
                <button id="login" onclick="activateLoginModal()">Login</button>
                <button id="register" onclick="activateRegisterModal()">Register</button>
            </nav>
        </div>
    </div>
        <x-main.forms.register-modal></x-main.forms.register-modal>

        <x-main.forms.login-modal></x-main.forms.login-modal>
@endguest

@auth
    <div class="flex justify-between items-center mt-2 mx-48 p-7 bg-background-1">
        <a href="/" class="text-white text-5xl font-salsa">Bookslink</a>
        <div class="flex relative">
            <nav class="flex font-aleg text-md space-x-16 px-12 py-3 rounded-xl bg-light-purple text-white text-lg">
                <div class="flex items-center relative">
                    <div class="relative p-3 hover:bg-blue-500 rounded-lg p-3 relative cursor-pointer" onclick="showNotifications();">
                        <i class="fas fa-bell fa-1x"></i>
                        @if(auth()->user()->notifications->count() > 0)
                            <div class="absolute -top-1 right-0 text-white font-salsa">
                                <div class="bg-red-500 rounded-lg">
                                    <div class="h-full text-center leading-5 text-lg px-1">
                                        {{auth()->user()->notifications->count()}}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div id="toggleNotifications" class="absolute top-20 -right-48 bg-gray-100 rounded-lg z-20 w-screen/4 h-screen/2-half overflow-y-scroll hidden">
                        <div class="flex flex-col gap-y-4 p-4">
                            <div class="text-center text-black text-xl font-salsa">
                                Notifications ({{auth()->user()->notifications->count()}})
                            </div>
                            @foreach(auth()->user()->notifications as $notification)

                                @if(str_contains($notification->type,'Followed'))
                                    <div class="relative flex p-2 text-black border-b-2 border-gray-300 pb-6">
                                        <div class="w-3/4 flex gap-x-4">
                                            <div class="w-sidebar flex flex-col flex-start">
                                                @isset($notification->data['user']['avatar'])
                                                    <img src="{{asset('storage/' . $notification->data['user']['avatar'])}}" class="w-full h-14 rounded-lg">
                                                @else
                                                    <img id="avatar_pic" src='images/default-user.png' class="w-full h-14 rounded-lg">

                                                @endisset
                                            </div>
                                            <div class="w-3/4">
                                                <div class="flex flex-col items-between">
                                                    <div>
                                                        {{$notification->data['user']['username']}}, has followed you
                                                    </div>
                                                    <div class="absolute bottom-2 text-sm">
                                                        {{$notification->created_at->diffForHumans()}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="absolute top-0 right-0 flex flex-col  w-screen/10">
                                            <button onclick="showOptions(this.nextElementSibling.id)" class="flex justify-end"><i class="fas fa-ellipsis-h"></i></button>
                                            <div id="show-more-{{$loop->index}}" class="hidden flex flex-col p-2 bg-gray-200 rounded-lg text-base">
                                                <div class="p-2 hover:bg-blue-100 cursor-pointer">
                                                    <p><span><i class="fas fa-check-square"></i></span>
                                                        Mark as read
                                                    </p>
                                                </div>
                                                <div class="p-2 hover:bg-blue-100 cursor-pointer">
                                                    <p><span><i class="fas fa-trash-alt"></i></span>
                                                        Remove
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @elseif(str_contains($notification->type,'Shared'))


                                    <div class="relative flex p-2 text-black border-b-2 border-gray-300 pb-6">
                                        <div class="w-3/4 flex gap-x-4">
                                            <div class="w-sidebar flex flex-col flex-start">
                                                @isset($notification->data['user']['avatar'])
                                                    <img src="{{asset('storage/' . $notification->data['user']['avatar'])}}" class="w-full h-14 rounded-lg">
                                                @else
                                                    <img id="avatar_pic" src='images/default-user.png' class="w-full h-14 rounded-lg">
                                                @endisset
                                            </div>
                                            <div class="flex flex-col w-3/4">
                                                <div>
                                                    {{$notification->data['user']['username']}}, has shared a <a href="resource/book/{{urlencode($notification->data['user']['title'])}}/?volume_id={{$notification->data['user']['volume_id']}}" class="text-blue-400 hover:underline">book</a> with you
                                                </div>
                                                @isset($notification->data['user']['message'])
                                                    <div class="text-base italic bg-gray-200 p-1 rounded-xl">"{{$notification->data['user']['message']}}"</div>
                                                @endisset

                                                <div class="absolute bottom-2 text-sm">
                                                    {{$notification->created_at->diffForHumans()}}
                                                </div>
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                        <div class="w-1/4 flex justify-start">
                                            <div class="w-1/2">
                                                    <img src="{{$notification->data['user']['thumbnail']}}" class="rounded-lg">
                                            </div>
                                        </div>
                                        <div class="absolute top-0 right-0 flex flex-col w-screen/10">
                                            <button onclick="showOptions(this.nextElementSibling.id)" class="flex justify-end"><i class="fas fa-ellipsis-h"></i></button>
                                            <div id="show-more-{{$loop->index}}" class="hidden flex flex-col p-2 bg-gray-200 rounded-lg text-base">
                                                <div class="p-2 hover:bg-blue-100 cursor-pointer">
                                                    <p><span><i class="fas fa-check-square"></i></span>
                                                        Mark as read</p>
                                                </div>
                                                <div class="p-2 hover:bg-blue-100 cursor-pointer">
                                                    <p><span><i class="fas fa-trash-alt"></i></span>
                                                        Remove</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="/dashboard">Dashboard</a>

                </div>
                <div>
                    <form method="POST" action="/logout" class="h-full flex">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>

            </nav>
        </div>
    </div>

@endauth
