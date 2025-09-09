@php
$contentManagementLinks = [
[
'label' => 'Create Category',
'url' => '/dashboard/categories/create',
'icon' => 'fas fa-pen',
'active' => request()->is('dashboard/categories/create'),
],
[
'label' => 'Category List',
'url' => '/dashboard/categories',
'icon' => 'fas fa-pen',
'active' => request()->is('dashboard/categories'),
],
[
'label' => 'Create Post',
'url' => '/dashboard/posts/create',
'icon' => 'fa-solid fa-blog',
'active' => request()->is('dashboard/posts/create'),
],
[
'label' => 'All Posts',
'url' => '/dashboard/posts',
'icon' => 'fas fa-folder',
'active' => request()->is('dashboard/posts'),
],
[
'label' => 'Tags',
'url' => '#',
'icon' => 'fas fa-tags',
'active' => request()->is('dashboard/tags*'),
],
];

$analyticsNReportsLinks = [
[
'label' => 'Traffic',
'url' => '#',
'icon' => 'fas fa-eye',
'active' => request()->is('dashboard/traffic*'),
],
[
'label' => 'Audience',
'url' => '#',
'icon' => 'fas fa-users',
'active' => request()->is('dashboard/audience*'),
],
[
'label' => 'Reports',
'url' => '#',
'icon' => 'fas fa-receipt',
'active' => request()->is('dashboard/reports*'),
],
];

$userSettingsLinks = [
[
'label' => 'Profile',
'url' => '#',
'icon' => 'fas fa-user',
'active' => request()->is('dashboard/profile*'),
],
[
'label' => 'Security',
'url' => '#',
'icon' => 'fas fa-lock',
'active' => request()->is('dashboard/security*'),
],
[
'label' => 'Notifications',
'url' => '#',
'icon' => 'fas fa-bell',
'active' => request()->is('dashboard/notifications*'),
],
];
@endphp

<aside class="bg-gray-800 text-white flex-shrink-0 w-64 relative z-10 flex flex-col" id="sidebar">
    <div class="flex items-center justify-between h-16 px-4 border-b border-gray-700">
        <div class="flex items-center space-x-2">
            <i class="fas fa-blog text-2xl text-blue-400"></i>
            <h1 class="text-xl font-bold">I<span class="text-blue-400">Blog</span></h1>
        </div>
        <button id="sidebar-toggle" class="text-gray-400 hover:text-white md:hidden">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="flex-grow px-2 py-4 overflow-y-auto">
        <nav class="flex-1 space-y-1">
            <x-partials.dashboard.sidebar-link href="/dashboard" icon="fas fa-tachometer-alt"
                :active="request()->is('dashboard')">
                Dashboard
            </x-partials.dashboard.sidebar-link>

            <x-partials.dashboard.sidebar-dropdown :active="request()->is([
                    'dashboard/categories*',
                    'dashboard/posts*',
                    'dashboard/tags*'
                ])" icon="fas fa-newspaper" :links=$contentManagementLinks>
                Content Management
            </x-partials.dashboard.sidebar-dropdown>

            <x-partials.dashboard.sidebar-dropdown :active="request()->is([
                    'dashboard/traffic*',
                    'dashboard/audience*',
                    'dashboard/reports*'
                ])" icon="fas fa-chart-line" :links=$analyticsNReportsLinks>
                Analytics & Reports
            </x-partials.dashboard.sidebar-dropdown>

            <x-partials.dashboard.sidebar-link href="#" icon="fas fa-comments"
                :active="request()->is('dashboard/comments')">
                Comments
            </x-partials.dashboard.sidebar-link>

            <x-partials.dashboard.sidebar-link href="#" icon="fas fa-bookmark"
                :active="request()->is('dashboard/bookmarks')">
                Bookmarks
            </x-partials.dashboard.sidebar-link>

            <x-partials.dashboard.sidebar-dropdown :active="request()->is([
                'dashboard/profile*',
                'dashboard/security*',
                'dashboard/notifications*'
            ])" icon="fas fa-user-cog" :links=$userSettingsLinks>
                User Settings
            </x-partials.dashboard.sidebar-dropdown>
            <x-partials.dashboard.sidebar-link href="#" icon="fas fa-envelope"
                :active="request()->is('dashboard/messages*')">
                Messages
            </x-partials.dashboard.sidebar-link>

            <x-partials.dashboard.sidebar-link href="#" icon="fas fa-users" :active="request()->is('dashboard/team*')">
                Team
            </x-partials.dashboard.sidebar-link>

            <x-partials.dashboard.sidebar-link href="#" icon="fas fa-star"
                :active="request()->is('dashboard/favorites*')">
                Favorites
            </x-partials.dashboard.sidebar-link>

        </nav>
    </div>

    <div class="mt-auto px-4 py-4 border-t border-gray-700">
        <div class="flex items-center">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-10 h-10 rounded-full">
            <div class="ml-3">
                <p class="text-sm font-medium text-white">John Doe</p>
                <a href="#" class="text-xs font-medium text-gray-400 hover:text-gray-200">View profile</a>
            </div>
        </div>
        <button
            class="mt-4 w-full flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
            <i class="fas fa-sign-out-alt mr-2"></i>
            Sign out
        </button>
    </div>
</aside>
