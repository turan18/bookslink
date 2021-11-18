

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
                <a href="/">{{auth()->user()->username}}'s Profile</a>
                <button>Dashboard</button>
                <button>Notifications</button>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </nav>
        </div>
    </div>
@endauth
