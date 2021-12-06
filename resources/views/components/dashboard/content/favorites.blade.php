
<div class="flex flex-col w-full items-center mt-4 py-12">
    <div class="pb-12">
        <p class="text-2xl bg-light-purple p-4 rounded-lg font-salsa inline">
            My Favorites
        </p>
    </div>
    <div class="flex flex-col gap-y-12 w-3/4">
    @foreach($user->favorite_books->sortByDesc('created_at')->values() as $book)
        <div class="flex flex-col items-center lg:flex-row lg:items-start md:flex-row md:items-start gap-y-4 w-full bg-dash p-4 rounded-lg">
            <div class="w-1/2 lg:w-big-sidebar md:w-big-sidebar">
                <img src="{{$book->info->thumbnail}}" class="rounded-lg object-cover  w-full">
            </div>
            <div class="flex flex-col w-full text-center lg:w-2/3 lg:text-left md:w-2/3 md:text-left lg:pl-4 md:pl-4 font-salsa text-xl">
                <div class="flex flex-col h-1/2 justify-evenly gap-y-6">
                    <div class="flex flex-col gap-4">
                        <p>{{$book->info->title}}</p>
                        <p>By: {{$book->info->authors}}</p>

                    </div>
                    <div>
                        <button id="readButton" class="bg-blue-500 p-1 rounded-xl text-md" onclick="loadBook('{{$book->info->isbn_13}}')">Read</button>
                    </div>
                </div>

            </div>
            <div class="w-full lg:w-2/12 md:w-2/12 flex flex-col justify-center items-center">
                <button class="text-red-500 lg:mt-half md:mt-half hover:text-gray-200" id="item-{{$loop->index}}"  onclick="removeFromFavorites({{$book->id}},this.id)"><i class="fas fa-heart fa-4x"></i></button>
            </div>
        </div>
    @endforeach
    </div>
</div>




