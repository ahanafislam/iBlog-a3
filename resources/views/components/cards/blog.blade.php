@props(['thumbnail_url', 'category', 'date', 'reading_duration','title', 'content'])

<div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
    <img src="{{ $thumbnail_url }}" alt="{{ $category }}" class="w-full h-48 object-cover">
    <div class="p-6">
        <div class="flex items-center text-sm text-gray-500 mb-2">
            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-md text-xs">{{ $category }}</span>
            <span class="mx-2">•</span>
            <span>{{ $date }}</span>
            <span class="mx-2">•</span>
            <span>{{ $reading_duration }} min read</span>
        </div>
        <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $title }}</h3>
        <p class="text-gray-600 mb-4">{{ $content }}</p>
        <a href="#" class="text-blue-600 font-medium hover:text-blue-800 transition">Read More</a>
    </div>
</div>
