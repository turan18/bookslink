<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookslink | Home</title>
</head>
<body>


<form method="GET" action='/search'>
    <label for="search" class="bg-white">Search here</label>
    <input type="text" id="search" name="item">
    <button type="submit">Go</button>
</form>

<br><br><br><br><br>


@if(! auth()->check())
<h1>Login</h1>

<form method="POST" action="/login">
    @csrf

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="{{old('username')}}" required>
    @error('username')
        <span style="margin-top: 5px">{{$message}}</span>
    @enderror


    <label for="password">Password:</label>
    <input type="text" id="password" name="password" required>


    <button type="submit">Login</button>

</form>

<h1>Register Now</h1>

<form method="POST" action="{{url('register')}}">
    @csrf

    <label for="name">Username:</label>
    <input type="text" id="name" name="username" value="{{old('username')}}" required>
    @error('username')
        <span style="margin-top: 5px">{{$message}}</span>
    @enderror

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{old('email')}}" required>
    @error('email')
        <span style="margin-top: 5px">{{$message}}</span>
    @enderror

    <label for="password">Password:</label>
    <input type="text" id="password" name="password" required>



    <button type="submit">Create Account</button>

</form>

@else
    <h1>Hello, {{auth()->user()->username}}</h1>
    <form method="POST" action="/logout">
        @csrf

        <button type="submit">Logout</button>
    </form>
@endif


@if(session()->has('success'))
    <h3>{{session('success')}}</h3>
@endif

</body>
</html>
