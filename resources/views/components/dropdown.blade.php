@props(["trigger"])
<div x-data="{show: false}" class="relative" >

    {{-- Trigger --}}
    <div @click="show=!show" @click.away="show=false" >
        {{$trigger}}
    </div>

    {{-- Links --}}
    <div class="py-2 absolute bg-gray-200 w-full mt-2 rounded-xl z-50" style="display: none; height: 100px; overflow: auto" x-show="show" >
        {{$slot}}
    </div>
</div>



