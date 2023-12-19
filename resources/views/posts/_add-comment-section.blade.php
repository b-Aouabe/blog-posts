<x-panel>
    @auth
        <form method="post" action="/posts/{{$post->slug}}/comments" class="w-full p-3 ">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/200?id={{auth()->user()->id}}}}"  class="rounded-full h-full object-cover mr-2" alt="avatar" width="60" height="60">
                <h1>Want to participate?</h1>
            </header>
            <label for="msg"></label>
            <textarea id="msg"
                      class="w-full my-2 p-3 rounded-lg text-sm focus:ring focus:outline-none"
                      name="body"
                      cols="20" rows="3" placeholder="Leave a comment!"
                      required ></textarea>
            <x-submit-button>
                post
            </x-submit-button>
        </form>
    @else
        <p class=" ">
            <a href="/register" class="text-blue-600 underline">Register</a>
            or
            <a href="/login" class="text-blue-600 underline">Login</a>
            to leave a comment.
        </p>
    @endauth
</x-panel>
