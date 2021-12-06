<html lang="en">
<head>
    <x-main.head></x-main.head>
    <title>Search</title>
    <link href="{{asset('css/book.css')}}" rel="stylesheet" type="text/css">
    <script>
        const requestItem = '{{request()->get('item')}}';
    </script>
    <script type="text/javascript" src="{{asset('js/fetchBooks.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/fetchUsers.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/friend.js')}}" defer></script>

</head>


<body class="bg-background-1">

<x-main.navbar></x-main.navbar>


<div class="flex justify-center mt-12">
    <x-main.searchbar></x-main.searchbar>
</div>

<x-main.search.filter></x-main.search.filter>
<x-main.search.results :items="$items"></x-main.search.results>









</body>
</html>
