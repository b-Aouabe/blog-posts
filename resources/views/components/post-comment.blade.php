@props(['comment'])
<x-panel class="border bg-gray-100">
    <article class="flex p-5">
        <div class="w-20 h-20 flex-shrink-0 mr-3">
            <img src="https://i.pravatar.cc/200?id={{$comment->id}}}}" class="rounded-lg w-full h-full object-cover">
        </div>
        <div>
            <header>
                <h1 class="font-bold">{{$comment->author->name}}</h1>

                <p class="text-xs italic text-gray-500">
                    posted
                    <time> {{$comment->created_at->format("F j, Y, g:i a")}} </time>
                </p>
            </header>

            <p>
                {{$comment->body}}
            </p>
        </div>
    </article>
</x-panel>
