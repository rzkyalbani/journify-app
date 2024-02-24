<form action="/search" method="GET">
    <div class="flex flex-col gap-y-2 mb-8">
        <label for="q" class="font-semibold">Search</label>
        <input type="text" name="q" id="q" class="px-2 py-1 border border-gray-400 rounded"
            placeholder="Search...">
    </div>
    <button type="submit" class="hidden"></button>
</form>

<div class="flex flex-col gap-y-3">
    <label for="categories" class="font-semibold">Categories</label>
    @foreach ($categories as $category)
        <div class="flex flex-col gap-y-2">
            <span class="text-sm font-light">
                <a href="/categories/{{ $category->slug }}"
                    class="{{ Request::is('categories/' . $category->slug) ? 'text-black hover:text-black' : 'text-blue-600 hover:text-blue-800' }}">
                    {{ $category->name }}
                    <span class="text-black hover:text-black">{{ '(' . $category->posts->count() . ')' }}</span>
                </a>
            </span>
        </div>
    @endforeach
</div>
