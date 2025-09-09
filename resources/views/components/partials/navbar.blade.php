<!-- Header/Navigation -->
<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 md:py-0  flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <a href="/" class="flex items-center space-x-2">
                <i class="fas fa-blog text-2xl text-blue-600"></i>
                <h1 class="text-2xl font-bold text-gray-800">I<span class="text-blue-600">Blog</span></h1>
            </a>
        </div>

        <nav class="hidden md:flex space-x-8 items-center">
            <a href="/" class="text-blue-600 font-medium">Home</a>
            <!-- Categories Dropdown -->
            <div class="relative desktop-dropdown">
                <button class="text-gray-600 hover:text-blue-600 py-4 transition flex items-center">
                    Categories
                    <i class="fas fa-chevron-down ml-1 text-sm"></i>
                </button>
                <div class="absolute left-0 w-64 bg-white rounded-md shadow-lg hidden z-50 desktop-dropdown-menu">
                    <div class="py-2">
                        @foreach ($categories as $category)
                            {{-- Check if the category has children --}}
                            @if ($category->children->isNotEmpty())
                                <div class="relative desktop-dropdown-sub">
                                    <button class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition flex justify-between items-center w-full text-left">
                                        {{ $category->title }}
                                        <i class="fas fa-chevron-right text-xs"></i>
                                    </button>
                                    <div class="absolute left-full top-0 mt-0 w-64 bg-white rounded-md shadow-lg hidden desktop-dropdown-submenu">
                                        {{-- Loop through the children --}}
                                        @foreach ($category->children as $child)
                                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">{{ $child->title }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                {{-- Category without children --}}
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">{{ $category->title }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="#" class="text-gray-600 hover:text-blue-600 transition">About</a>
            <a href="#" class="text-gray-600 hover:text-blue-600 transition">Contact</a>
        </nav>

        <div class="flex items-center space-x-4">
            <button class="md:hidden text-gray-600" id="mobile-menu-button">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <a href="/login"
                class="hidden md:block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                Login
            </a>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md">
        <div class="container mx-auto px-4 py-4">
            <a href="#" class="block py-2 text-blue-600 font-medium">Home</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-blue-600 transition">Articles</a>
            <div class="relative">
                <button
                    class="block py-2 text-gray-600 hover:text-blue-600 transition flex items-center w-full text-left mobile-dropdown-toggle">
                    Categories
                    <i class="fas fa-chevron-down ml-1 text-sm"></i>
                </button>
                <div id="mobile-categories" class="hidden pl-4 mobile-dropdown-menu">
                    <div class="py-1">
                        @foreach ($categories as $category)
                            @if ($category->children->isNotEmpty())
                                <div class="relative">
                                    <button
                                        class="block py-2 text-gray-600 hover:text-blue-600 transition flex items-center w-full text-left mobile-dropdown-sub-toggle">
                                        {{ $category->title }}
                                        <i class="fas fa-chevron-down ml-1 text-sm"></i>
                                    </button>
                                    <div class="hidden pl-4 mobile-dropdown-submenu">
                                        @foreach ($category->children as $child)
                                            <a href="#" class="block py-2 text-gray-600 hover:text-blue-600 transition">{{ $child->title }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="#" class="block py-2 text-gray-600 hover:text-blue-600 transition">{{ $category->title }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="#" class="block py-2 text-gray-600 hover:text-blue-600 transition">About</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-blue-600 transition">Contact</a>
        </div>
    </div>
</header>
