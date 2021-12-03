{{--@if($users->count()>0)--}}

    @foreach($users as $user)

        <div class="relative flex flex-col rounded-md cursor-pointer">
            <div id="user-{{$loop->index}}" class="relative hover:bg-indigo-200 flex w-full p-2" onclick="share(this.id);">
                <div class="w-full flex justify-center">
                    <p>{{$user->username}}</p>
                </div>
                <div class="absolute right-0 pr-4 h-3/4 flex justify-center">
                    <input name="share[{{$loop->index}}][person]" type="checkbox" value="{{$user->id}}" class="rounded-xl w-5">
                </div>
            </div>
            <div class="flex rounded-lg justify-center h-0 overflow-hidden">
                <div class="w-full border-t-2 border-b-2 border-light-purple rounded-lg flex justify-evenly p-2">
                    <div class="flex w-2/3 justify-center items-center p-2">
                        <textarea name="share[{{$loop->index}}][message]" class="h-full rounded-lg w-full p-2 border-2 border-light-purple" placeholder="Add a custom message if you like..."></textarea>
                    </div>
                </div>

            </div>

        </div>
    @endforeach







{{--@else--}}
{{--    <p class="text-center p-5">No results found...</p>--}}
{{--@endif--}}
