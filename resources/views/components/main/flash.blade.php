@if(session()->has('success'))
    <div x-data="{ show: true}" x-init="setTimeout(()=> show = false, 4000)" x-show="show" class="fixed bottom-6 right-6 w-72 max-w-96 text-white bg-purple-500 p-3 rounded-lg">
        <p class="text-center">{{session('success')}}</p>
    </div>


@elseif(count($errors) > 0)
    <div x-data="{ show: true}" x-init="setTimeout(()=> show = false, 4000)" x-show="show" class="fixed bottom-6 right-6 w-72 max-w-96 text-white bg-red-500 p-3 rounded-lg">
        <p class="text-center">{{$errors->first()}}</p>
    </div>

@endif


