
@if($errors->register->any())
    <div x-data="{ show: true}" x-init="setTimeout(()=> show = false, 4000)" x-show="show" class="fixed bottom-6 right-6 w-72 text-white bg-purple-500 p-3 rounded-lg">
        <p class="text-center">Registration Error!</p>
    </div>
@endif

@if($errors->first())
    <div x-data="{ show: true}" x-init="setTimeout(()=> show = false, 4000)" x-show="show" class="fixed bottom-6 right-6 w-72 text-white bg-purple-500 p-3 rounded-lg">
        <p class="text-center">Login attempt failed!</p>
    </div>
@endif


@if(session()->has('success'))
    <div x-data="{ show: true}" x-init="setTimeout(()=> show = false, 4000)" x-show="show" class="fixed bottom-6 right-6 w-72 text-white bg-purple-500 p-3 rounded-lg">
        <p class="text-center">{{session('success')}}</p>
    </div>
@endif







