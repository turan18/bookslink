<div id="login-modal" class="fixed top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/4 rounded-lg opacity-0 pointer-events-none transition duration-500 ease-in-out z-10">
    <div class="content relative">
        <form method="POST" id="login-form" action="/login" class="p-10 bg-white rounded flex justify-center items-center flex-col shadow-md">
            @csrf
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-gray-600 mb-2" viewbox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
            </svg>
            <p class="mb-5 text-3xl uppercase text-gray-600">Login</p>
            @error('login')
            <span class="text-red-500 mb-2">{{$message}}</span>
            @enderror
            <input type="text" id="username" name="user" value="{{old('user')}}" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" autocomplete="off" placeholder="Username" required>


            <input type="text" id="password" name="password" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" autocomplete="off" placeholder="Password" required>
            <x-main.buttons.auth>Login</x-main.buttons.auth>
            <button type="button" id="login-close" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold p-2 rounded w-20"><span>Close</span></button>

        </form>
    </div>
</div>

