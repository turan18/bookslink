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
