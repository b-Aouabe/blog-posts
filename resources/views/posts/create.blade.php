<x-layout>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-panel class="max-w-sm mx-auto border p-3">
            <form action="posts/admin/create" method="post">
                <div class="mb-6">

                    <label for="title"
                           class="block text-sm mb-2 uppercase font-semibold uppercase">
                           Title
                    </label>
                    <input class="w-full border border-gray-400 p-2"
                           type="text"
                           name="title"
                           id="title"
                           required>

                    @error('title')
                        <p class="text-red-300 text-xs mt-2">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">

                    <label for="excerpt"
                           class="block text-sm mb-2 uppercase font-semibold uppercase">
                        excerpt
                    </label>
                    <textarea class="w-full border border-gray-400 p-2"
                           name="excerpt"
                           id="excerpt"
                          required></textarea>

                    @error('excerpt')
                    <p class="text-red-300 text-xs mt-2">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">

                    <label for="body"
                           class="block text-sm mb-2 uppercase font-semibold uppercase">
                        Body
                    </label>
                    <textarea class="w-full border border-gray-400 p-2"
                              name="body"
                              id="excerpt"
                              required></textarea>

                    @error('body')
                    <p class="text-red-300 text-xs mt-2">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">

                    <label for="category"
                           class="block text-sm mb-2 uppercase font-semibold uppercase">
                        Category
                    </label>
                    <select name="category" id="category">
                        <option value="1">Personal</option>
                        <option value="2">Gym</option>
                        <option value="3">School</option>
                    </select>

                    @error('body')
                    <p class="text-red-300 text-xs mt-2">{{$message}}</p>
                    @enderror

                </div>

                <x-submit-button>Publish</x-submit-button>
            </form>
        </x-panel>
    </main>

</x-layout>
