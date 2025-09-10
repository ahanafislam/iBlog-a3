@props([
'thumbnail_path',
'category' => ['title' => '', 'slug' => ''],
'author' => ['name' => ''],
'created_at',
'reading_duration',
'title',
'content'
])

<div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
    @if (!$thumbnail_path)
    <img src="{{ asset('thumbnails/default_thumb.png') }}" alt="{{ $category['title'] }}"
        class="w-full h-48 object-cover">
    @else
    <img src="{{ asset('storage/' . $thumbnail_path) }}" alt="{{ $category['title'] }}"
        class="w-full h-48 object-cover">
    @endif

    <div class="p-6">
        <div class="flex items-center text-sm text-gray-500 mb-2 flex-wrap gap-2">
            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-md text-xs">
                {{ $category['title'] }}
            </span>
            <span>•</span>
            <span>{{ \Carbon\Carbon::parse($created_at)->format('F j, Y') }}</span>
            <span>•</span>
            <span>{{ $reading_duration }} min read</span>
        </div>

        <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $title }}</h3>
        <p class="text-gray-600 mb-4">{{ \App\Helpers\StringHelper::postPreview($content) }}</p>

        <div class="text-sm text-gray-500 mb-4">
            By <span class="font-medium text-gray-700">{{ $author['name'] }}</span>
        </div>

        <a href="#" class="text-blue-600 font-medium hover:text-blue-800 transition">Read More</a>
    </div>
</div>
