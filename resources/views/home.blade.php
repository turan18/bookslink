<!doctype html>
<html lang="en">
<head>
    <x-main.head></x-main.head>

    <title>Bookslink | Home</title>
</head>
<body class="bg-background-1">

@auth()

    <x-main.auth-navbar></x-main.auth-navbar>
    <x-main.home.card></x-main.home.card>


@endauth

@guest()
    <x-main.navbar></x-main.navbar>

    <x-main.home.card></x-main.home.card>

    <x-main.forms.register-modal></x-main.forms.register-modal>

    <x-main.forms.login-modal></x-main.forms.login-modal>

@endguest

<x-main.forms.auth-flash></x-main.forms.auth-flash>



</body>
</html>
