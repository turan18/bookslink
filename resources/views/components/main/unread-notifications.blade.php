@foreach(auth()->user()->unreadNotifications as $notification)
    @if(str_contains($notification->type,'Followed'))
        <div id="notification-{{$loop->index}}" class="relative flex p-2 text-black border-b-2 border-gray-300 pb-6 p-3 rounded-lg bg-blue-100">
                    <div class="w-3/4 flex gap-x-4">
                        <div class="w-sidebar flex flex-col flex-start">
                            @isset($notification->data['user']['avatar'])
                                <img src="{{asset('storage/' . $notification->data['user']['avatar'])}}" class="w-full h-14 rounded-lg">
                            @else
                                <img id="avatar_pic" src='/images/default-user.png' class="w-full h-14 rounded-lg">

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
                    <div class="absolute top-0 right-2 flex flex-col w-screen/10 z-40">
                        <button onclick="showOptions(this.nextElementSibling.id)" class="flex justify-end"><i class="fas fa-ellipsis-h"></i></button>
                        <div id="show-more-{{$loop->index}}" class="hidden flex flex-col p-2 bg-gray-200 rounded-lg text-base">
                            <div class="p-2 hover:bg-blue-100 cursor-pointer" onclick="markRead('{{$notification->id}}',{{$loop->index}})">
                                <button><span><i class="fas fa-check-square"></i></span>
                                    Mark as read</button>
                            </div>
                            <div class="p-2 hover:bg-blue-100 cursor-pointer" onclick="removeNotification('{{$notification->id}}',{{$loop->index}})">
                                <button ><span><i class="fas fa-trash-alt"></i></span>
                                    Remove</button>
                            </div>
                        </div>
                    </div>

                        <div id="unread-indicator-{{$loop->index}}" class="absolute top-40% right-2">
                            <i class="fas fa-dot-circle text-red-500"></i>
                        </div>
                </div>

    @elseif(str_contains($notification->type,'Shared'))
        <div id="notification-{{$loop->index}}" class="relative flex p-2 text-black border-b-2 border-gray-300 pb-6 p-3 rounded-lg bg-blue-100">
                    <div class="w-3/4 flex gap-x-4">
                        <div class="w-sidebar flex flex-col flex-start">
                            @isset($notification->data['user']['avatar'])
                                <img src="{{asset('storage/' . $notification->data['user']['avatar'])}}" class="w-full h-14 rounded-lg">
                            @else
                                <img id="avatar_pic" src='/images/default-user.png' class="w-full h-14 rounded-lg">
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
                    <div class="absolute top-0 right-2 flex flex-col w-screen/10 z-40">
                        <button onclick="showOptions(this.nextElementSibling.id)" class="flex justify-end"><i class="fas fa-ellipsis-h"></i></button>
                        <div id="show-more-{{$loop->index}}" class="hidden flex flex-col p-2 bg-gray-200 rounded-lg text-base">
                            <div class="p-2 hover:bg-blue-100 cursor-pointer" onclick="markRead('{{$notification->id}}',{{$loop->index}})">

                                <button ><span><i class="fas fa-check-square"></i></span>
                                    Mark as read</button>
                            </div>
                            <div class="p-2 hover:bg-blue-100 cursor-pointer"  onclick="removeNotification('{{$notification->id}}',{{$loop->index}})">
                                <button><span><i class="fas fa-trash-alt"></i></span>
                                    Remove</button>
                            </div>
                        </div>
                    </div>
                        <div id="unread-indicator-{{$loop->index}}" class="absolute top-40% right-2">
                            <i class="fas fa-dot-circle text-red-500"></i>
                        </div>
                </div>
        @endif

@endforeach

