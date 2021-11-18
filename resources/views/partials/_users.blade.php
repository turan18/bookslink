@if(count($users) > 0)
    <div class="flex">
        @foreach($users as $user)
            <li>{{$user->username}}</li>
            <li>{{$user->email}}</li>
        @endforeach
    </div>
@else
    <div class="flex justify-center font-salsa"><p class="text-lg">Sorry. No users found.</p></div>
@endif

