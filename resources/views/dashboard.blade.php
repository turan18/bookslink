<!doctype html>
<html lang="en">
<head>
    <x-main.head></x-main.head>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <title>{{$user->username}}'s Dashboard</title>
    <script type="text/javascript" src="https://www.google.com/books/jsapi.js" defer></script>
    <script type="text/javascript" src="{{asset('js/read.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/dashboard-recommend.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/dashboard-data.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/friend.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/update-profile.js')}}" defer></script>

</head>
<body>

<x-main.read.view></x-main.read.view>

<div id="wrapper" class="absolute top-0 right-0 left-0">
    <div class="flex">
       <x-dashboard.sidebar></x-dashboard.sidebar>
       <x-dashboard.main :user="$user"></x-dashboard.main>
    </div>

</div>


</body>
</html>
