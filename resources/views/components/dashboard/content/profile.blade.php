<div class="flex flex-col mt-2 py-6 w-full">
<div class="pb-12 text-center">
    <p class="text-2xl bg-light-purple p-4 rounded-lg font-salsa inline">
        My Profile
    </p>
</div>
<div class="font-salsa w-full mt-12 flex justify-center rounded-lg">
        <div class="flex flex-col gap-6 rounded-lg w-5/6 lg:w-2/3 md:w-2/3 pt-4 pb-20 border-2 border-light-purple">

            <div class="flex justify-center">

                <div class="w-3/4 lg:w-1/2  md:w-1/2 flex flex-col lg:flex-row md:-row justify-evenly">
                        <div class="flex flex-col items-center gap-2">
                            <div class="text-3xl">{{$user->username}}</div>
                            <div class="rounded-lg w-full lg:w-2/3 md:w-3/4 h-screen/5">
                                @isset($user->avatar)
                                    <img id="avatar_pic" src="{{asset('storage/' . $user->avatar)}}" class="bg-cover max-w-full w-full h-full rounded-lg">

                                @else
                                    <img id="avatar_pic" src='images/default-user.png' class="bg-cover max-w-full w-full h-full rounded-lg">

                                @endisset
                            </div>
                            <div class="flex justify-end">
                                <label class="file-button">
                                    <span><i class="fas fa-cloud-upload-alt"></i></span>
                                    <input type="file" name="avatar" id="profile-pic" class="w-full self-end" accept="image/png, image/jpeg" onchange="uploadAvatar(this)">
                                    Upload Avatar
                                </label>
                            </div>

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

                    @isset($user->about_me)
                        <textarea class="rounded-lg p-2 w-full" id="about_me">{{$user->about_me}}</textarea>

                    @else
                        <textarea class="rounded-lg p-2 w-full" id="about_me" placeholder="Tell us about yourself"></textarea>
                    @endisset
                    <div class="flex justify-end">
                        <button class="p-1 bg-blue-500 text-md rounded-lg text-white" onclick="aboutMe()">Update</button>
                    </div>

                </div>

            </div>
        </div>


</div>

</div>
