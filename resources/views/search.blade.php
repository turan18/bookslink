<html lang="en">
<head>
    <x-main.head></x-main.head>
    <title>Search</title>
    <link href="{{asset('css/rating.css')}}" rel="stylesheet" type="text/css">
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
    function followUser(user){
        const follow_button = document.querySelector('#follow_button');
        follow_button.textContent = 'Unfollow';
        follow_button.classList.remove('bg-blue-500');
        follow_button.classList.add('bg-red-500');
        follow_button.setAttribute('onclick',`unfollowUser(${user})`);
        follow_button.id = 'unfollow_button';


        fetch('/follow',{
            method: "post",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                user_id: user

            })
        }).then((response) => response.json()).then((data) => {console.log('Success',data)})


    }


    function unfollowUser(user){
        const unfollow_button = document.querySelector('#unfollow_button');
        unfollow_button.textContent = 'Follow';
        unfollow_button.classList.remove('bg-red-500');
        unfollow_button.classList.add('bg-blue-500');
        unfollow_button.setAttribute('onclick',`followUser(${user})`);
        unfollow_button.id = 'follow_button';


        fetch('/unfollow',{
            method: "post",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                user_id: user

            })
        }).then((response) => response.json()).then((data) => {console.log('Success',data)})
    }



</script>





</body>
</html>
