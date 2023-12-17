<x-dropdown>

    <x-slot name="trigger">
        <button
            class="appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-40 text-left flex lg:inline-flex">

            {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Category'}}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    {{-- DEFAULT SLOT --}}
    <x-dropdown-item href="/posts?{{http_build_query(request()->except(['category', 'page']))}}"
                    :active="request()->routeIs('posts') && !isset($currentCategory)">All</x-dropdown-item>

    @foreach ($categories as $category)

    <x-dropdown-item
        href="/posts?category={{$category->slug}}&{{http_build_query(request()->except(['category', 'page']))}}"
        :active="isset($currentCategory) && $currentCategory->is($category)"

    >{{ ucwords($category->name) }}</x-dropdown-item>

    @endforeach
</x-dropdown>
