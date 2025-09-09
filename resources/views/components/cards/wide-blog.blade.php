@props([
'thumbnail_path',
'category' => ['title' => '', 'slug' => ''],
'author' => ['name' => ''],
'created_at',
'reading_duration',
'title',
'content'
])

<article class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition flex flex-col md:flex-row">
    <img src="{{ $thumbnail_path }}" alt="{{ $category['title'] }}" class="md:w-1/3 h-48 md:h-auto object-cover">
    <div class="p-6 md:w-2/3">
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
</article>
