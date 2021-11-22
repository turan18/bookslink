

@guest
    <div class="flex justify-between items-center mt-2 mx-48 p-7 bg-background-1">
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
@endguest

@auth
    <div class="flex justify-between items-center mt-2 mx-48 p-7 bg-background-1">
        <a href="/" class="text-white text-5xl font-salsa">Bookslink</a>
        <div class="flex">
            <nav class="flex font-aleg text-md space-x-16 px-12 py-3 rounded-xl bg-light-purple text-white text-lg">
                <button><i class="fas fa-bell"></i></button>
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
@endauth
