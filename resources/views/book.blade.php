<html lang="en">
<head>
    <x-main.head></x-main.head>
    <link href="{{asset('css/rating.css')}}" rel="stylesheet" type="text/css">
    <title>{{$item['title']}}</title>
</head>

<body class="bg-background-1">



<x-main.navbar></x-main.navbar>


<div class="absolute top-1/5 left-1/4 right-1/4 text-white hidden" id="share-search">

    <div class="p-4 text-black font-salsa">
        <div class="flex flex-col w-full items-center">
            <div class="w-2/3 relative">
                <input type="text" class="w-full rounded-sm h-10 px-2 font-bold" placeholder="Search through friends to share with..." id="search-share-bar">
                <span class="absolute right-2 top-1/3">
                    <i class="fas fa-search fa-1x"></i>
                </span>
            </div>
            <form method="POST" action="/share" class="flex flex-col rounded-bl-lg rounded-br-lg bg-white w-2/3">
                @csrf
                <div id="friends-list">

                </div>

                @if(is_object($item))
                    <input type="hidden" name="id" value="{{$item['id']}}">

                @else
                    <input type="hidden" name="volume_id" value="{{$item['volume_id']}}">
                    <input type="hidden" name="title" value="{{urldecode($item['title']) ?? null}}">
                    <input type="hidden" name="authors" value="{{$item['authors'] ?? null}}">
                    <input type="hidden" name="categories" value="{{$item['categories'] ?? null}}">
                    <input type="hidden" name="isbn_13" value="{{$item['isbn_13'] ?? null}}">
                    <input type="hidden" name="publisher" value="{{$item['publisher'] ?? null}}">
                    <input type="hidden" name="publication_date" value="{{$item['publication_date'] ?? null}}">
                    <input type="hidden" name="page_count" value="{{$item['page_count'] ?? null}}">
                    <input type="hidden" name="description" value="{{$item['description'] ?? null}}">
                    <input type="hidden" name="thumbnail" value="{{$item['large-thumbnail'] ?? $item['thumbnail']}}">
                    <input type="hidden" name="link" value="{{$item['link']}}">
                @endif






            </form>


        </div>

    </div>
</div>

<section class="mt-16 bg-background-1">

    <div class="flex mx-48 gap-x-12">

        <div class="flex flex-col mt-8 w-1/5 text-white self-start">

            <div class="flex justify-center pb-2">
                <img src="{{$item['large-thumbnail'] ?? $item['thumbnail'] }}}}" class="w-full h-full rounded-lg bg-cover" alt="Thumbnail">
            </div>
            <div class="flex justify-center pb-2">
                <div class="flex stars-container">
                    @isset($item['full_rating'])
                        <x-main.stars :rating="$item['full_rating']"></x-main.stars>
                    @else
                        <x-main.stars :rating="0"></x-main.stars>
                    @endisset
                </div>
            </div>
            <div class="flex justify-center">
                <form method="POST" action="{{route('add_to_favorites')}}">
                    @csrf
                    <input type="hidden" name="volume_id" value="{{$item['volume_id']}}">
                    <input type="hidden" name="title" value="{{urldecode($item['title'] ?? null)}}">
                    <input type="hidden" name="authors" value="{{$item['authors'] ?? null}}">
                    <input type="hidden" name="categories" value="{{$item['categories'] ?? null}}">
                    <input type="hidden" name="description" value="{{$item['description'] ?? null}}">
                    <input type="hidden" name="isbn_13" value="{{$item['isbn_13'] ?? null}}">
                    <input type="hidden" name="publisher" value="{{$item['publisher'] ?? null}}">
                    <input type="hidden" name="publication_date" value="{{$item['publication_date'] ?? null}}">
                    <input type="hidden" name="page_count" value="{{$item['page_count'] ?? null}}">
                    <input type="hidden" name="thumbnail" value="{{(($item['large-thumbnail']) ?? $item['thumbnail'])}}">
                    <input type="hidden" name="link" value="{{$item['link']}}">



                    @auth
                        @if(is_object($item) && auth()->user()->favorite_books->where('book_id',$item->id)->count() > 0)
                        <button class="p-1 rounded-lg text-red-500" type="submit">
                            <i class="fas fa-heart fa-2x"></i>
                        </button>
                        @else
                            <button class="fav-btn p-1 rounded-lg" type="submit">
                                <i class="fas fa-heart fa-2x"></i>
                            </button>
                        @endif
                    @else
                        <button class="text-gray-500 p-1 rounded-lg" type="submit" disabled>
                            <i class="fas fa-heart fa-2x"></i>
                        </button>
                    @endauth


                </form>
            </div>
        </div>
        <div class="flex flex-col w-full flex flex-col">
            <div class="text-white text-4xl font-salsa pl-10">
                <p class="text-3xl font-extrabold text-center">
                    {{$item['title']}}
                </p>
            </div>

            <div class="flex p-10 text-lg h-1/2">
                <div class="flex flex-col text-white w-1/2 justify-around pr-5 border-r-2 border-white">
                    <div class="flex justify-between">
                        <p class="text-indigo-300 font-aleg font-extrabold">Author(s)-</p>
                        <p class="text-white font-aleg font-bold">
                            @isset($item['authors'])
                                {{$item['authors']}}
                            @else
                                N/A
                            @endisset
                        </p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-indigo-300 font-aleg  font-extrabold">Publisher-</p>
                        <p class="text-white font-aleg  font-bold">
                            @if(isset($item['publisher']) && strlen($item['publisher']) > 1)
                                {{$item['publisher']}}
                            @else
                                N/A
                            @endif

                        </p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-indigo-300 font-aleg  font-extrabold">Publication Date-</p>
                        <p class="text-white font-aleg  font-bold">
                            @isset($item['publication_date'])
                                {{$item['publication_date']}}
                            @else
                                N/A
                            @endisset
                        </p>
                    </div>
                </div>

{{--                The two columns--}}
                <div class="flex flex-col w-1/2 justify-around pl-5 text-lg">
                    <div class="flex justify-between text-white">
                        <p class="text-indigo-300 font-aleg  font-extrabold">Category-</p>
                        <p class="text-white font-aleg  font-bold">
                            @isset($item['categories'])
                                    {{$item['categories']}}
                            @else
                                N/A
                            @endisset
                        </p>
                    </div>
                    <div class="flex justify-between text-white">
                        <p class="text-indigo-300  font-aleg font-extrabold">ISBN-13-</p>
                        <p class="text-white font-aleg  font-bold">
                            @isset($item['isbn_13'])
                                {{$item['isbn_13']}}
                            @else
                                N/A
                            @endisset
                        </p>
                    </div>
                    <div class="flex justify-between text-white">
                        <p class="text-indigo-300 font-aleg  font-extrabold">Page Count-</p>
                        <p class="text-white font-aleg font-bold">
                            @isset($item['page_count'])
                                {{$item['page_count']}} pages
                            @else
                                N/A
                            @endisset
                        </p>
                    </div>
                </div>
            </div>

            <div class="rounded-lg bg-indigo-900 mt-8 mx-12 p-3 w-full flex justify-center">
                <p class="text-white font-aleg leading-loose text-md">
                    @if(isset($item['description']) && strlen($item['description']) > 0)
                        @if(str_word_count($item['description']) > 80)
                            {{implode(' ', array_slice(explode(' ', $item['description']), 0, 80))}}
                            <span id="ellipses">...</span>
                            <span id="show-more">
                                        <button id="show_more_button" class="text-yellow-800" onclick="showMore()">Show more</button>
                                        <span id="more-content" class="hidden">{{implode(' ', array_slice(explode(' ', $item['description']), 80, strlen($item['description'])))}}</span>
                                    </span>

                            <span id="less-content" class="hidden">
                                         <button id="show_less_button" class="text-yellow-800" onclick="showLess()">Show less</button>
                                    </span>
                        @else
                            {{$item['description']}}
                        @endif

                    @else
                        No description.
                    @endif
                </p>
            </div>
            <div class="flex justify-end mt-8">
                <div class="flex w-1/4 justify-end text-white gap-x-4">
                    <button class="bg-blue-800 hover:bg-blue-500 font-salsa rounded-lg p-2 w-1/3">Read</button>
                    <button class="bg-blue-800 hover:bg-blue-500 font-salsa rounded-lg p-2 w-1/3" onclick="shareSearch()">Share</button>
                    <a class="bg-blue-800 hover:bg-blue-500 font-salsa rounded-lg p-2 w-1/3 text-center" href="{{$item['link']}}">Preview</a>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="bg-indigo-800 mt-36 pb-48">
   <div class="flex justify-center">
       <p class="text-white font-salsa text-3xl pt-4">
           Read this book already? Write a review!</p>
   </div>
    <div class="flex justify-center mt-16">
        <div class="w-2/6 rounded-lg bg-indigo-300 py-2">
            <div class="p-7">
                <form class="max-h-full" method="POST" action="/review">
                    @csrf
                    <input type="hidden" name="volume_id" value="{{$item['volume_id']}}">
                    <input type="hidden" name="title" value="{{urldecode($item['title']) ?? null}}">
                    <input type="hidden" name="authors" value="{{$item['authors'] ?? null}}">
                    <input type="hidden" name="categories" value="{{$item['categories'] ?? null}}">
                    <input type="hidden" name="isbn_13" value="{{$item['isbn_13'] ?? null}}">
                    <input type="hidden" name="publisher" value="{{$item['publisher'] ?? null}}">
                    <input type="hidden" name="publication_date" value="{{$item['publication_date'] ?? null}}">
                    <input type="hidden" name="page_count" value="{{$item['page_count'] ?? null}}">
                    <input type="hidden" name="description" value="{{$item['description'] ?? null}}">
                    <input type="hidden" name="thumbnail" value="{{$item['large-thumbnail'] ?? $item['thumbnail']}}">
                    <input type="hidden" name="link" value="{{$item['link']}}">


                    <div class="w-full h-3/5">
                        <textarea class="rounded-lg py-1 px-1 font-salsa w-full h-full " placeholder="Say something.." name="review"></textarea>
                    </div>
                    <div class="flex justify-between pr-2 pt-2 mt-2">
                        <div class="rating">

                            <input id="r5" name="rating" type="radio" value="5" class="btn hidden" required />
                            <label for="r5" ><i class="fa fa-star"></i></label>
                            <input id="r4" name="rating" type="radio" value="4" class="btn hidden" />
                            <label for="r4" ><i class="fa fa-star"></i></label>
                            <input id="r3" name="rating" type="radio" value="3" class="btn hidden" />
                            <label for="r3" ><i class="fa fa-star"></i></label>
                            <input id="r2" name="rating" type="radio" value="2" class="btn hidden" />
                            <label for="r2" ><i class="fa fa-star"></i></label>
                            <input id="r1" name="rating" type="radio" value="1" class="btn hidden" />
                            <label for="r1" ><i class="fa fa-star"></i></label>
                        </div>

                        <button type="submit" class="bg-light-purple p-1 font-salsa rounded-lg text-white">Publish</button>
                    </div>

                </form>
            </div>

        </div>
    </div>



    @if(isset($reviews) && $reviews->count() > 0)
        <div class="mt-12">
            <p class="text-4xl text-white pl-10 font-salsa underline">
                @if($reviews->count() == 1)
                    {{$reviews->count()}} Review

                @else
                    {{$reviews->count()}} Review(s)
                @endif

            </p>


        </div>
        <div class="flex flex-col text-lg w-1/4 gap-y-12 mt-12 ml-10">
            @foreach ($reviews as $review)
                <div class="flex gap-x-2 w-full pl-2 pr-4 py-2 bg-gray-200 rounded-lg">
                    <div class="w-1/5 self-center py-4">
                        <div class="flex justify-center" >
                            <img src="https://picsum.photos/seed/picsum/100/100" class="rounded-lg">
                        </div>
                        <div class="flex justify-center mt-2">
                            @auth()
                                @unless(auth()->user()->id == $review->user->id)
                                    @if($review->user->followers->contains('id',auth()->user()->id))
                                        <button id="unfollow_button-{{$loop->index}}" class="p-1 bg-red-500 text-white text-sm rounded-lg" onclick="unfollowUser({{$review->user->id}},{{$loop->index}})">Unfollow</button>
                                    @else
                                        <button id="follow_button-{{$loop->index}}" class="p-1 bg-blue-500 text-white text-sm rounded-lg" onclick="followUser({{$review->user->id}},{{$loop->index}})">Follow</button>
                                    @endif
                                @endunless
                            @endauth
                        </div>
                    </div>
                    <div class="w-4/5 flex flex-col pb-2">
                        <div class="flex pb-2 justify-between">
                            <div>
                                <p class="font-bold text-xl font-salsa">
                                    {{$review->user->username}}
                                    <span class="text-xs font-aleg">● {{$review->created_at->diffForHumans()}}</span>
                                </p>
                            </div>
                            <div class="flex gap-x-4">
                                <button>
                                    <span class="text-xs">23 likes</span>
                                    <i class="far fa-thumbs-up"></i>

                                </button>
                                <button>
                                    <span class="text-xs">4 dislikes</span>
                                    <i class="far fa-thumbs-down"></i>
                                </button>

                            </div>
                        </div>

                        <div class="flex justify-start pb-2">
                            <div class="flex stars-container">
                                <x-main.stars :rating="$review->rating"></x-main.stars>
                            </div>
                        </div>
                        <div class="w-full text-sm bg-gray-300 rounded-lg max-h-full h-full">
                            <p class="break-words px-2 py-1">{{$review->review_body}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
                {{$reviews->links()}}


    @else
        <div class="mt-24 pl-10">
            <p class="text-4xl text-white font-salsa">
                No reviews yet.
            </p>
        </div>
    @endif


    </div>

</section>




<x-main.flash></x-main.flash>

<script>
    const ellipses = document.querySelector('#ellipses');
    const show_more_button = document.querySelector('#show_more_button');
    const show_less_button = document.querySelector('#show_less_button');
    const show_more = document.querySelector('#more-content');
    const show_less = document.querySelector('#less-content');
    const search_container = document.querySelector('#share-search');
    const search_bar = document.querySelector('#search-share-bar');
    const search_results = document.querySelector('#friends-list');

    let search_toggle = false;

    search_bar.addEventListener('keyup',function (e){
        if(e.key === "Escape" && search_toggle){
            search_bar.focus();
            search_toggle = false;
            search_container.classList.add('hidden')

        }
        else if(search_toggle){
            fetch(`/partials/share?user=${search_bar.value}`, {headers: { 'Accept': 'application/json' }})
                .then(response=>{
                    if(response.ok){
                        return response.text()
                    }
                    else if(response.status === 404){
                        return Promise.reject('User not found.');
                    }
                    else{
                        return Promise.reject(response.status)
                    }
                })
            .then(html=> search_results.innerHTML = html + "<div class=\"flex justify-center my-4\"><button class=\"px-4 py-1 text-white bg-blue-500 rounded-lg\" type=\"submit\">Share</button></div>")
            .catch(error=>{
                search_results.innerHTML = "<p class=\"text-center p-5\">No results found...</p>";
            })
        }
    });

    //if response.ok = html + "<div class=\"flex justify-center my-4\"><button class=\"px-4 py-1 text-white bg-blue-500 rounded-lg\" type=\"submit\">Share</button></div>"
    //else thing = <p class="text-center p-5">No results found...</p>


    function showMore(){

        ellipses.classList.add('hidden');
        show_more_button.classList.add('hidden');
        show_more.classList.remove('hidden');
        show_less.classList.remove('hidden');
        show_less_button.classList.remove('hidden');

    }
    function showLess(){
        ellipses.classList.remove('hidden');
        show_more_button.classList.remove('hidden');
        show_more.classList.add('hidden');
        show_less.classList.add('hidden');
        show_less_button.classList.add('hidden');

    }
    function followUser(user,button_index){
        const follow_button = document.querySelector(`#follow_button-${button_index}`);
        follow_button.textContent = 'Unfollow';
        follow_button.classList.remove('bg-blue-500');
        follow_button.classList.add('bg-red-500');
        follow_button.setAttribute('onclick',`unfollowUser(${user},${button_index})`);
        follow_button.id = `unfollow_button-${button_index}`;


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


    function unfollowUser(user,button_index){
        const unfollow_button = document.querySelector(`#unfollow_button-${button_index}`);
        unfollow_button.textContent = 'Follow';
        unfollow_button.classList.remove('bg-red-500');
        unfollow_button.classList.add('bg-blue-500');
        unfollow_button.setAttribute('onclick',`followUser(${user},${button_index})`);
        unfollow_button.id = `follow_button-${button_index}`;


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

    function shareSearch(){

        if(!search_toggle){
            search_container.classList.remove('hidden');
            search_bar.focus();
            search_toggle = true;

        }
        else{
            search_container.classList.add('hidden')
            search_toggle = false;
        }
    }

    function share(id){
        if (document.readyState === 'complete' && event.target.type !== 'checkbox') {
            const message = document.querySelector(`#${id}`).nextElementSibling;
            const node = document.querySelectorAll('.slidedown')[0];

            if(node === undefined){
                message.classList.add('slidedown');
            }
            else{
                node.classList.remove('slidedown');
                node.classList.add('slideup');
                if(node.previousElementSibling.id !== id){
                    setTimeout(()=>{
                        message.classList.add('slidedown');
                    },500)
                }

            }
        }



    }
</script>

</body>
</html>
