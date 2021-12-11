<html lang="en">
<head>
    <x-main.head></x-main.head>
    <link href="{{asset('css/book.css')}}" rel="stylesheet" type="text/css">
    <title>{{$item['title']}}</title>
    <script type="text/javascript" src="https://www.google.com/books/jsapi.js" defer></script>
    <script type="text/javascript" src="{{asset('js/include-elements.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/read.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/book-more-less.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/friend.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/share.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/notifications.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/review.js')}}" defer></script>

</head>

<body class="bg-background-1">

<x-main.read.view></x-main.read.view>


<x-book.share :item="$item"></x-book.share>


<div id="wrapper" class="absolute top-0 right-0 left-0">
    <x-main.navbar></x-main.navbar>

    <x-book.info :item="$item"></x-book.info>
    <x-book.review :item="$item" :reviews="$reviews"></x-book.review>
    <x-main.flash></x-main.flash>
</div>





</body>

</html>
