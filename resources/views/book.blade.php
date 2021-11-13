<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{$item['title']}}</title>
</head>

<style>
    body{
        background-color: #2d3748;
        color: white;
    }
    .image-container{
        width: 316px;
        height: 500px;
    }
    .image-container img{
        height: 100%;
        max-height: 100%;
        max-width: 100%;
        border-radius: 25px;
        object-fit: contain;
    }
</style>
<body>


<a href="{{url()->previous()}}">Back</a>
<h1>{{urldecode($item['title'])}}</h1>

<div class="image-container">
    <img src="{{$item['large-thumbnail'] ?? $item['thumbnail']}}" alt="Image">
</div>
@auth()
<form method="POST" action="{{route('add_to_favorites')}}">
    @csrf
    <input type="hidden" name="volume_id" value="{{$item['id']}}">
    <input type="hidden" name="title" value="{{urldecode($item['title'])}}">
    <input type="hidden" name="thumbnail" value="{{($item['thumbnail']) ?? ($item['large-thumbnail'])}}">
    <input type="hidden" name="author" value="{{$item['authors'][0]}}">
    <input type="hidden" name="category" value="{{$item['category'][0] ?? null}}">
    <input type="hidden" name="description" value="{{$item['snippet']}}">


    <button type="submit">Add To Favorites</button>
</form>
    <button>Share</button><br>
    <button>Read</button><br>

@endauth
@guest()
    You are not logged in.<br>
@endguest

<a href="{{$item['link']}}">Preview</a>

@if(session()->has('message'))
    <h4>{{session('message')}}</h4>
@endif
</body>
</html>
