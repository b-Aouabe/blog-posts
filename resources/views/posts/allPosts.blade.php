<x-layout>

    @include("posts/_header")
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-posts-grid :posts="$posts"/>
            {{$posts->links()}}
        @else
            <p class="text-center">No Posts Found Please Check Back Later</p>
        @endif
    </main>

</x-layout>

{{-- @foreach ($posts as $post)
    <article>
        <h1>
            <a href="/posts/{{$post->slug}}">{{$post->title}}</a>
        </h1>
        <h3>
        by <a href="/authors/{{$post->author->username}}"> {{$post->author->name}} </a>, Category: <a href="/categories/{{ $post->category->slug }}"> {{$post->category->name}} </a>
        </h3>
        <div>
            {!! $post->excerpt !!}
        </div>
    </article>
@endforeach --}}
