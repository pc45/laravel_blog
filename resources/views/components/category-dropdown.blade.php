<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 w-full lg:w-32 text-left flex lg:inline-flex">
            {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-down-arrow class="absolute pointer-events-none"></x-down-arrow>
        </button>
    </x-slot>

    <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>

    @foreach($categories as $category)
        <x-dropdown-item
            href="/?category={{$category->slug}}"
            :active="isset($currentCategory) && $currentCategory->is($category)"
        >{{ucwords($category->name)}}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
