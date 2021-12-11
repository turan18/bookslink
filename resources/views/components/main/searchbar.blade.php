 <form method="GET" action='/search' class="text-white w-full px-4 lg:w-1/2 md:w-3/4">
        <input class="border-2 border-black-300 bg-white h-10 w-full px-3 rounded-lg text-md focus:outline-none text-black font-bold font-salsa"
               type="search" name="item" value="@if(request()->has('item')){{request()->get('item')}}@endif" placeholder="Search for books or users..." required>

     <div class="relative w-full">
            <button class="rounded-r-lg rounded-l-none px-4 py-2 bg-purple-500 absolute bottom-0 right-0 font-salsa" type="submit">Go</button>
        </div>
 </form>

