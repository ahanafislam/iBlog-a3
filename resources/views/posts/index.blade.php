<x-layouts.app>
    {{-- Start Page Header with Search Section --}}
    <section class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <h2 class="text-3xl md:text-4xl font-bold mb-2">{{ $currentCategory->title ?? 'All Posts' }}</h2>
                    <p class="text-lg">{{ $currentCategory->description ?? 'Browse all articles' }}</p>
                </div>

                <div class="w-full md:w-auto">
                    <div class="relative">
                        <input type="text" placeholder="Search in {{ $currentCategory->title ?? 'All Posts' }}..."
                            class="w-full md:w-64 lg:w-96 px-4 py-3 rounded-md text-gray-800 pr-10">
                        <button class="absolute right-3 top-3 text-gray-500 hover:text-blue-600">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Page Header with Search Section --}}

    {{-- Start Breadcrumbs Section --}}
    <div class="container mx-auto px-4 py-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <i class="fas fa-home mr-2"></i>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                        <a href="{{ url('/posts') }}"
                            class="ml-1 md:ml-2 text-sm font-medium text-gray-700 hover:text-blue-600">Posts</a>
                    </div>
                </li>
                @if ($currentCategory)
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                            <span class="ml-1 md:ml-2 text-sm font-medium text-blue-600">{{ $currentCategory->title }}</span>
                        </div>
                    </li>
                @endif
            </ol>
        </nav>
    </div>
    {{-- End Breadcrumbs Section --}}

    {{-- Start Main Content Section --}}
    <div class="container mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">
        {{-- Start Articles Section --}}
        <div class="lg:w-2/3">
            <!-- Category Filters -->
            <div class="bg-white rounded-lg shadow p-4 mb-6">
                <div class="flex flex-wrap gap-2">
                    <a href="{{ url('/posts') }}"
                       class="{{ !request('category') ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-800' }} px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">All</a>
                    @foreach ($categories as $category)
                        <a href="{{ url('/posts?category=' . $category->slug) }}"
                           class="{{ request('category') == $category->slug ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-800' }} px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">{{ $category->title }}</a>
                    @endforeach
                </div>
            </div>

            <!-- Sort Options -->
            <div class="flex justify-between items-center mb-6">
                <p class="text-gray-600">
                    Showing {{ $posts->firstItem() ?? 0 }} to {{ $posts->lastItem() ?? 0 }} of {{ $posts->total() }} articles
                </p>
                <div class="flex items-center">
                    <span class="text-gray-600 mr-2">Sort by:</span>
                    <select id="sort-select" class="border rounded-md px-3 py-1 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="newest" {{ request('sort', 'newest') === 'newest' ? 'selected' : '' }}>Newest First</option>
                        <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>Oldest First</option>
                    </select>
                </div>
            </div>

            <!-- Article List -->
            <div class="space-y-8">
                {{-- Start Post Section --}}
                @if ($posts->isNotEmpty())
                    @foreach ($posts as $post)
                        <x-cards.wide-blog :thumbnail_path="$post['thumbnail_path']" :category="$post['category']"
                            :author="$post['author']" :created_at="$post['created_at']"
                            :reading_duration="$post['reading_duration']" :title="$post['title']" :content="$post['content']" />
                    @endforeach
                @else
                    <p class="text-gray-500 text-center mt-10">Sorry no post found in this category.</p>
                @endif
                {{-- End Post Section --}}
            </div>

            {{-- Start Pagination Section --}}
            <div class="mt-8">
                {{ $posts->links() }}
            </div>
            {{-- End Pagination Section --}}
        </div>
        {{-- End Articles Section --}}

        <!-- Sidebar -->
        <aside class="lg:w-1/3 space-y-8">
            <!-- About Widget -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-4 text-gray-800">About Web Development</h3>
                <p class="text-gray-600 mb-4">Web Development covers everything from frontend frameworks to backend
                    technologies, performance optimization, and the latest web standards.</p>
                <button class="text-blue-600 font-medium hover:text-blue-800 transition">
                    Read More <i class="fas fa-arrow-right ml-1"></i>
                </button>
            </div>

            <!-- Popular Posts -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Popular in Web Dev</h3>
                <div class="space-y-4">
                    <!-- Post 1 -->
                    <div class="flex items-start">
                        <img src="https://placehold.co/480x200/png" alt="Web Development"
                            class="w-16 h-16 object-cover rounded-md mr-3">
                        <div>
                            <h4 class="font-medium text-gray-800">Future of Web Development</h4>
                            <p class="text-sm text-gray-500">May 15, 2023 • 1.2K views</p>
                        </div>
                    </div>

                    <!-- Post 2 -->
                    <div class="flex items-start">
                        <img src="https://placehold.co/480x200/png" alt="React"
                            class="w-16 h-16 object-cover rounded-md mr-3">
                        <div>
                            <h4 class="font-medium text-gray-800">React 18 Features</h4>
                            <p class="text-sm text-gray-500">July 5, 2023 • 980 views</p>
                        </div>
                    </div>

                    <!-- Post 3 -->
                    <div class="flex items-start">
                        <img src="https://placehold.co/480x200/png" alt="TypeScript"
                            class="w-16 h-16 object-cover rounded-md mr-3">
                        <div>
                            <h4 class="font-medium text-gray-800">TypeScript 5.0</h4>
                            <p class="text-sm text-gray-500">June 22, 2023 • 850 views</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Subcategories -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Subcategories</h3>
                <div class="space-y-2">
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">JavaScript</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">24</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">React</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">18</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">Vue.js</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">12</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">Angular</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">9</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">CSS & Design</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">15</span>
                    </a>
                    <a href="#" class="flex justify-between items-center p-2 hover:bg-gray-100 rounded-md transition">
                        <span class="text-gray-700">Performance</span>
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">7</span>
                    </a>
                </div>
            </div>

            <!-- Newsletter Widget -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Web Dev Newsletter</h3>
                <p class="text-gray-600 mb-4">Get the latest web development articles, tutorials, and news delivered to
                    your inbox.</p>
                <form class="space-y-4">
                    <input type="email" placeholder="Your email address"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                        Subscribe
                    </button>
                </form>
            </div>

            <!-- Tags Widget -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Popular Tags</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="#"
                        class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#javascript</a>
                    <a href="#"
                        class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#react</a>
                    <a href="#"
                        class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#vue</a>
                    <a href="#"
                        class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#angular</a>
                    <a href="#"
                        class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#css</a>
                    <a href="#"
                        class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#html</a>
                    <a href="#"
                        class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#webcomponents</a>
                    <a href="#"
                        class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition">#performance</a>
                </div>
            </div>
        </aside>
    </div>
    {{-- End Main Content Section --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handler for the sort dropdown
        const sortSelect = document.getElementById('sort-select');
        if (sortSelect) {
            sortSelect.addEventListener('change', function() {
                const selectedSort = this.value;
                const currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('sort', selectedSort);
                window.location.href = currentUrl.toString();
            });
        }
    });
</script>
</x-layouts.app>
