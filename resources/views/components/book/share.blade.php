<div class="absolute top-24 left-1/4 right-1/4 text-white hidden z-20" id="share-search">

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
