<div x-data="{show : true}" x-show="show" x-init="setTimeout(() => show = false, 3000)">
    @if(session('success'))
        <p class="bg-red-600 bottom-5 fixed p-2 right-5 rounded-full text-white" >{{ session('success')}}</p>
    @endif
</div>
