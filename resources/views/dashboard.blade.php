<!doctype html>
<html lang="en">
<head>
    <x-main.head></x-main.head>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <title>{{$user->username}}'s Dashboard</title>
</head>
<body>

<div class="flex">
    <div id="sidebar" class="h-screen w-sidebar lg:w-big-sidebar md:w-big-sidebar sticky z-10 top-0 left-0 bottom-0 bg-light-purple flex flex-col justify-between p-8 flex-5">
        <div class="flex justify-center">
            <a class="text-white font-salsa text-5xl" href="/">Bookslink</a>
        </div>
        <div class="flex flex-col gap-6 lg:px-4 md:px-2">
            <div class="lg:px-2 md:px-2 py-4 rounded-lg hover:bg-indigo-800 cursor-pointer">
                <a href="/dashboard" class=" flex justify-center items-center lg:justify-start ">
                    <i class="fas fa-home fa-lg lg:w-1/4 text-white"></i>
                    <span class="hidden lg:inline text-white font-salsa ">Dashboard</span>
                </a>
            </div>
            <div class="lg:px-2 md:px-2 py-4 rounded-lg hover:bg-indigo-800 flex justify-center items-center lg:justify-start cursor-pointer" onclick="getProfile()">
                <i class="fas fa-user fa-lg lg:w-1/4 text-white"></i>
                <span class="hidden lg:inline text-white font-salsa ">My Profile</span>
            </div>

            <div class="lg:px-2 md:px-2 py-4 rounded-lg hover:bg-indigo-800 flex justify-center items-center lg:justify-start cursor-pointer" onclick="getFavorites()">
                <i class="fab fa-gratipay fa-lg lg:w-1/4 text-white"></i>
                <span class="hidden lg:inline text-white font-salsa ">My favorites</span>
            </div>

            <div class="lg:px-2 md:px-2 py-4 rounded-lg hover:bg-indigo-800 flex justify-center items-center lg:justify-start cursor-pointer" onclick="getShared()">
                <i class="fas fa-book fa-lg lg:w-1/4 text-white"></i>
                <span class="hidden lg:inline text-white font-salsa ">Shared with you
                </span>
            </div>

            <div class="lg:px-2 md:px-2 py-4 rounded-lg hover:bg-indigo-800 flex justify-center items-center lg:justify-start cursor-pointer" onclick="getFollowers()">
                <i class="fas fa-user-friends fa-lg lg:w-1/4 text-white"></i>
                <span class="hidden lg:inline text-white font-salsa ">Followers</span>
            </div>
            <div class="lg:px-2 md:px-2 py-4 rounded-lg hover:bg-indigo-800 flex justify-center items-center lg:justify-start cursor-pointer" onclick="getFollowing()">
                <i class="fas fa-user-friends fa-lg lg:w-1/4 text-white"></i>
                <span class="hidden lg:inline text-white font-salsa ">Following</span>
            </div>

        </div>
        <div class="flex flex-col gap-4 lg:px-4 md:px-2">
{{--            <div class="lg:p-4 md:px-2 py-4 rounded-lg hover:bg-indigo-800 flex justify-center items-center lg:justify-start cursor-pointer">--}}
{{--                <i class="fas fa-cog fa-lg lg:w-1/4 text-white"></i>--}}
{{--                <span class="hidden lg:inline text-white font-salsa ">Settings</span>--}}
{{--            </div>--}}
            <div>
                <form action="/logout" method="POST" class="lg:px-2 md:px-2 py-4 rounded-lg hover:bg-indigo-800 flex justify-center items-center lg:justify-start cursor-pointer">
                    @csrf
                    <i class="fas fa-sign-out-alt fa-lg lg:w-1/4 text-white"></i>
                    <button type="submit">

                        <span class="hidden lg:inline text-white font-salsa">Log out</span>
                    </button>

                </form>
            </div>
        </div>
    </div>


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
                                    <button id="read_link" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white py-2 px-4 text-sm rounded-sm border-2 border-white hover:bg-indigo-500 hidden">Read</button>
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

                    @foreach($user->followers->sortByDesc('followed_at')->take(5)->values()  as $followers)
                        @unless($followers->id == $user->id)
                            <div class="flex flex-col justify-center items-center">
                               <div class="flex">
                                   <img src="https://picsum.photos/seed/picsum/100/100" class="rounded-lg">
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
</div>
<script>
    const recommended_container = document.querySelector('#recommended-container');
    window.onload = ()=>{
        fetch('partials/recommend')
        .then((res)=>res.text())
        .then((html)=>{
            if(recommended_container){
                recommended_container.innerHTML = html;
            }
        });
    }
    function getProfile(){
        fetch('profile')
        .then((res)=>res.text())
        .then((html) => document.querySelector('#main-content').innerHTML = html)
    }
    function getFavorites(){
        fetch('favorites')
            .then((res)=>res.text())
            .then((html) => document.querySelector('#main-content').innerHTML = html)
    }
    function getShared(){
        fetch('shared')
            .then((res)=>res.text())
            .then((html) => document.querySelector('#main-content').innerHTML = html)
    }
    function getFollowers(){
        fetch('followers')
            .then((res)=>res.text())
            .then((html) => document.querySelector('#main-content').innerHTML = html)
    }
    function getFollowing(){
        fetch('following')
            .then((res)=>res.text())
            .then((html) => document.querySelector('#main-content').innerHTML = html)
    }
    function followUser(user,button_index){
        const follow_button = document.querySelector(`#follow_button-${button_index}`);
        follow_button.textContent = 'Unfollow';
        follow_button.classList.remove('bg-blue-500');
        follow_button.classList.add('bg-red-500');
        follow_button.setAttribute('onclick',`unfollowUser(${user},${button_index})`);
        follow_button.id = `unfollow_button-${button_index}`;


        fetch('/follow',{
            method: "post",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                user_id: user

            })
        }).then((response) => response.json()).then((data) => {console.log('Success',data)})


    }


    function unfollowUser(user,button_index){
        const unfollow_button = document.querySelector(`#unfollow_button-${button_index}`);
        unfollow_button.textContent = 'Follow';
        unfollow_button.classList.remove('bg-red-500');
        unfollow_button.classList.add('bg-blue-500');
        unfollow_button.setAttribute('onclick',`followUser(${user},${button_index})`);
        unfollow_button.id = `follow_button-${button_index}`;


        fetch('/unfollow',{
            method: "post",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                user_id: user

            })
        }).then((response) => response.json()).then((data) => {console.log('Success',data)})
    }
    function removeFromFavorites(book_id,id){
        const item = document.querySelector(`#${id}`);
        item.parentNode.parentNode.style.transition = "opacity 0.5s ease-in";

        item.parentNode.parentNode.style.opacity = 0;
        setTimeout(function() {
            item.parentNode.parentNode.remove();
        }, 500);

        fetch('/unfavorite-item',{
            method: "post",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                book_id: book_id

            })
        }).then((response) => response.json()).then((data) => {console.log('Item removed from favorites',data)})
    }
</script>
</body>
</html>
