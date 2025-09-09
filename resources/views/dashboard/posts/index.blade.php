<x-layouts.dashboard>
    <div class="grid grid-cols-1 gap-3 md:grid-cols-3 md:gap-5">
        @foreach ($posts as $post)
        <x-cards.blog :thumbnail_path="$post['thumbnail_path']" :category="$post['category']" :author="$post['author']"
            :created_at="$post['created_at']" :reading_duration="$post['reading_duration']" :title="$post['title']"
            :content="$post['content']" />
        @endforeach
    </div>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</x-layouts.dashboard>
