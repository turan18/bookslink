<div class="flex flex-col mt-2 py-6 w-full">
<div class="pb-12 text-center">
    <p class="text-2xl bg-light-purple p-4 rounded-lg font-salsa inline">
        My Profile
    </p>
</div>
<div class="font-salsa w-full mt-12 flex justify-center rounded-lg h-2/3">
        <div class="flex flex-col gap-6 rounded-lg w-5/6 lg:w-2/3 md:w-2/3 pt-4 pb-20 border-4 border-light-purple">
            <div class="flex justify-center">
                <div class="w-1/2 flex flex-col lg:flex-row md:-row justify-evenly">
                        <div class="flex flex-col items-center gap-2">
                            <div class="text-3xl">{{$user->username}}</div>
                            <div class="bg-gray-300 p-4 rounded-lg">
                                <i class="fas fa-user fa-10x"></i>
                            </div>
                            <button class="p-1 bg-blue-500 rounded-lg text-md">Upload Photo</button>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <div class="">
                                <ul>
                                    <li class="py-2">Email: {{$user->email}}</li>
                                    <li class="py-2">Followers: {{$user->followers->count()}}</li>
                                    <li class="py-2">Following: {{$user->following->count()}}</li>
                                </ul>
                            </div>
                        </div>
                </div>

            </div>
            <div class="flex justify-center text-black max-h-full pb-4">
                <div class="w-3/4 lg:w-1/2 md:w-1/2">
                    <textarea class="rounded-lg p-2 w-full" placeholder="Tell us about yourself"></textarea>
                    <div class="flex justify-end">
                        <button class="p-1 bg-blue-500 text-md rounded-lg text-white">Update</button>
                    </div>
                </div>

            </div>
        </div>


</div>

</div>
