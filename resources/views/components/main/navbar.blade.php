

@guest
    <div class="w-full flex justify-center mt-2">
        <div class="flex justify-between items-center w-3/4  p-7 bg-background-1">
            <a href="/" class="text-white text-5xl font-salsa">Bookslink</a>
            <div class="flex">
                <nav class="flex font-aleg text-md space-x-16 px-12 py-3 rounded-xl bg-light-purple text-white text-lg">
                    <a href="/">Home</a>
                    <button id="login" onclick="activateLoginModal()">Login</button>
                    <button id="register" onclick="activateRegisterModal()">Register</button>
                </nav>
            </div>
        </div>
        <x-main.forms.register-modal></x-main.forms.register-modal>

        <x-main.forms.login-modal></x-main.forms.login-modal>
    </div>
@endguest

@auth
    <div class="w-full flex justify-center mt-2">
        <div class="flex justify-between items-center w-3/4 p-7 bg-background-1">
            <a href="/" class="text-white text-5xl font-salsa">Bookslink</a>
            <div class="flex relative">
                <nav class="flex font-aleg text-md space-x-16 px-12 py-3 rounded-xl bg-light-purple text-white text-lg">
                    <div class="flex items-center relative">
                        @if(auth()->user()->notifications->count() > 0)
                            <div class="relative p-3 hover:bg-blue-500 rounded-lg p-3 relative cursor-pointer" onclick="showNotifications();">
                                <i class="fas fa-bell fa-1x"></i>
                                <div class="absolute -top-1 right-0 text-white font-salsa">
                                    <div class="bg-red-500 rounded-lg">
                                        <div id="notification-count" data-count="{{auth()->user()->notifications->count()}}" class="h-full text-center leading-5 text-lg px-1">
                                            {{auth()->user()->notifications->count()}}
                                        </div>
                                    </div>
                                </div>
                        @else
                            <div class="relative p-3 hover:bg-blue-500 rounded-lg p-3 relative cursor-pointer">
                            <i class="fas fa-bell fa-1x"></i>

                        @endif
                        </div>

                        <div id="toggleNotifications" class="absolute top-20 -right-48 bg-gray-100 rounded-lg z-20 w-screen/4 max-h-screen/2-half overflow-y-scroll hidden p-2">
                            <div id="notifications-container" class="flex flex-col gap-y-4 p-4">
                                <div class="text-center text-black text-xl font-salsa">
                                    Notifications (<span id="inner_counter">{{auth()->user()->notifications->count()}}</span>)
                                </div>
                                @if(auth()->user()->notifications->count() > 0)
                                    <x-main.unread-notifications></x-main.unread-notifications>
                                    <x-main.read-notifications></x-main.read-notifications>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <a href="/dashboard">Dashboard</a>

                    </div>
                    <div>
                        <form method="POST" action="/logout" class="h-full flex">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>

@endauth
