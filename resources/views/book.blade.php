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

<h1>{{$item['title']}}</h1>

<div class="image-container">
    <img src="{{$item['large-thumbnail'] ?? $item['thumbnail']}}" alt="Image">
</div>
<a href="{{$item['link']}}">Preview</a>

</body>
</html>
