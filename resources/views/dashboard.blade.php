<!doctype html>
<html lang="en">
<head>
    <x-main.head></x-main.head>
    <title>{{$user->username}}'s Dashboard</title>
</head>
<body>

<div id="sidebar" class="h-full w-1/12 fixed z-10 top-0 left-0 bg-light-purple">
    <div class="mt-24 flex flex-col gap-y-6">

        <div class="flex justify-center items-center hover:bg-indigo-900 rounded-lg py-4 px-2">

            <div class="w-1/4 flex justify-center">
                <i class="fab fa-gratipay fa-lg w-1/4 text-white"></i>
            </div>
            <span class="w-3/4 flex justify-center text-white font-aleg text-lg ">Favorite Books</span>


        </div>
        <div class="flex justify-center items-center hover:bg-indigo-900 rounded-lg py-4 px-2">
            <div class="w-1/4 flex justify-center">
                <i class="fas fa-book fa-lg w-1/4 text-white"></i>
            </div>
            <span class="w-3/4 flex justify-center text-white font-aleg text-lg ">Shared Books</span>



        </div>
        <div class="flex justify-center items-center hover:bg-indigo-900 rounded-lg py-4 px-2">
            <div class="w-1/4 flex justify-center">
                <i class="fas fa-user-friends fa-lg w-1/4 text-white"></i>
            </div>
            <span class="w-3/4 flex justify-center text-white font-aleg text-lg ">Followers</span>




        </div>
        <div class="flex justify-center items-center hover:bg-indigo-900 rounded-lg py-4 px-2">
            <div class="w-1/4 flex justify-center">
                <i class="fas fa-users fa-lg w-1/4 text-white"></i>
            </div>
            <span class="w-3/4 flex justify-center text-white font-aleg text-lg ">Following</span>
        </div>
    </div>
</div>
<div class="content ml-1/12 w-full h-full bg-background-1">
asd
</div>
</body>
</html>
