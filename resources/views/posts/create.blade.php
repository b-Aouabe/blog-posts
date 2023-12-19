<x-layout>

    <main class="max-w-lg mx-auto mt-6 lg:mt-20 space-y-6">
        <h1 class="font-bold text-center text-2xl"> Add a post</h1>
        <x-panel class="max-w-sm mx-auto bg-gray-200 border p-3">
            <form action="/posts/admin" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mt-4" >
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required/>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

{{--                <div class="mt-4">--}}
{{--                    <x-input-label for="slug" :value="__('Slug')" />--}}
{{--                    <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required/>--}}
{{--                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />--}}
{{--                </div>--}}


                <div class="mt-4">
                    <x-input-label for="excerpt" :value="__('Excerpt')" />
                    <x-input-textarea :name="__('excerpt')" id="__('excerpt')" />
                    <x-input-error :messages="$errors->get('except')" class="mt-2" />
                </div>

                <div class="mt-4" >
                    <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                    <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" required/>
                    <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="body" :value="__('Body')" />
                    <x-input-textarea :name="__('body')" :id="__('body')"/>
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="category_id" :value="__('Category')" />
                    <select name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>

                <x-submit-button>Publish</x-submit-button>
            </form>
        </x-panel>
    </main>

</x-layout>
