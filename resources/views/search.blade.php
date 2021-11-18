<html lang="en">
<head>
    <x-main.head></x-main.head>
    <title>Search</title>
</head>


<body class="bg-background-1">

<x-main.navbar></x-main.navbar>


<div class="flex justify-center mt-12">
    <x-main.searchbar></x-main.searchbar>
</div>

<x-main.search.filter></x-main.search.filter>
<x-main.search.results :items="$items"></x-main.search.results>

<script>
    let count = 0;
    function fetchBooks(){
        fetch(`/partials/books?item={{request()->get('item')}}&index=${count}`)
            .then(response=>response.text())
            .then(html=>{
                document.querySelector('#items-container').innerHTML = html;
                document.querySelector('#book_link').classList.add('bg-light-purple');
                document.querySelector('#usr_link').classList.remove('bg-light-purple');
                document.querySelector('#load').style.display = "flex";
            });
    }

    function loadBooks(){
        count+=11
        fetch(`/partials/books?item={{request()->get('item')}}&index=${count}`)
            .then(response=>response.text())
            .then(html=>{
                document.querySelector('#items-container').innerHTML = document.querySelector('#items-container').innerHTML + html;
            });
    }

    function fetchUsers(){
        fetch(`/partials/user?username={{request()->get('item')}}`)
            .then(response=>response.text())
            .then(html=>{
                document.querySelector('#items-container').innerHTML = html;
                document.querySelector('#usr_link').classList.add('bg-light-purple');
                document.querySelector('#book_link').classList.remove('bg-light-purple');
                document.querySelector('#load').style.display = "none";

            });
    }

</script>





</body>
</html>
