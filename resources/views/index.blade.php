<x-layouts.app>
    {{-- Start Hero Section --}}
    <section class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">Welcome to IBlog</h2>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">Discover the latest in technology, programming, and
                digital innovation</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <input type="text" placeholder="Search articles..."
                    class="px-4 py-3 rounded-md text-gray-800 w-full sm:w-96">
                <button class="bg-white text-blue-600 px-6 py-3 rounded-md font-medium hover:bg-gray-100 transition">
                    <i class="fas fa-search mr-2"></i> Search
                </button>
            </div>
        </div>
    </section>
    {{-- End Hero Section --}}

    {{-- Start Featured Posts Section --}}
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-2">Featured Posts</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Start Featured Post Section --}}
                @foreach ($featuredPosts as $post)
                <x-cards.blog :thumbnail_url="$post['thumbnail_url']" :category="$post['category']"
                    :date="$post['date']" :reading_duration="$post['reading_duration']" :title="$post['title']"
                    :content="$post['content']" />
                @endforeach
                {{-- End Featured Post Section --}}
            </div>
        </div>
    </section>
    {{-- End Featured Posts Section --}}

    {{-- Start Main Content Section --}}
    <div class="container mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">
        {{-- Start Recent Articles --}}
        <main class="lg:w-2/3">
            <h2 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-2">Recent Articles</h2>
            <div class="space-y-8">
                {{-- Start Recent Post Section --}}
                @foreach ($recentPosts as $post)
                <x-cards.wide-blog
                    :thumbnail_url="$post['thumbnail_url']"
                    :category="$post['category']"
                    :date="$post['date']"
                    :reading_duration="$post['reading_duration']"
                    :title="$post['title']"
                    :content="$post['content']"
                />
                @endforeach
                {{-- End Recent Post Section --}}
            </div>

            <div class="mt-8 flex justify-center">
                <button class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition">
                    Browse All Articles
                </button>
            </div>
        </main>
        {{-- End Recent Articles --}}

        {{-- Start Sidebar --}}
        <aside class="lg:w-1/3 space-y-8">
            {{-- Start About Widget --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-4 text-gray-800">About The Blog</h3>
                <p class="text-gray-600 mb-4">IBlog brings you the latest news, tutorials, and thought pieces on
                    technology, programming, AI, and the digital world.</p>
                <button class="text-blue-600 font-medium hover:text-blue-800 transition">
                    Read More <i class="fas fa-arrow-right ml-1"></i>
                </button>
            </div>
            {{-- End About Widget --}}

            {{-- Start Categories Widget --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Categories</h3>
                <div class="space-y-2">
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">Web Development</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">12</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">Artificial Intelligence</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">8</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">Cloud Computing</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">5</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">Cybersecurity</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">7</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">Mobile Development</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">6</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">DevOps</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">4</span>
                    </a>
                </div>
            </div>
            {{-- End Categories Widget --}}

            {{-- Start Newsletter Widget --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Newsletter</h3>
                <p class="text-gray-600 mb-4">Subscribe to get the latest posts delivered to your inbox.</p>
                <form class="space-y-4">
                    <input type="email" placeholder="Your email address"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                        Subscribe
                    </button>
                </form>
            </div>
            {{-- End Newsletter Widget --}}
        </aside>
        {{-- End Sidebar --}}
    </div>
    {{-- End Main Content Section --}}
</x-layouts.app>
