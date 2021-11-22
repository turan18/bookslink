@if($users->count()>0)

    @foreach($users as $user)

        <div class="flex p-2">
            <div class="w-1/2 flex justify-end">
                <button>{{$user->username}}</button>
            </div>
            <div class="w-1/2 flex justify-end pr-1">
                <input type="radio">
            </div>
        </div>
    @endforeach


@else
    <p class="text-center p-5">No results found...</p>
@endif
