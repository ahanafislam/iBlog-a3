@props(['active' => false, 'icon' => 'fas fa-star', 'links' => [] ])
<div class="sidebar-dropdown">
    <button
        @class([
            "sidebar-dropdown-toggle flex items-center w-full px-3 py-3 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white",
            "bg-gray-900 font-medium text-white" => $active,
        ])>
        <i @class([$icon, 'mr-3', "text-blue-400" => $active ])></i>
        <span>{{ $slot }}</span>
        <i class="fas fa-chevron-down ml-auto text-xs"></i>
    </button>
    <div @class([
        "sidebar-dropdown-menu pl-2 mt-1 space-y-1",
        "hidden" => !$active
    ])>
        @foreach ($links as $link)
        <x-partials.dashboard.sidebar-link href="{{$link['url']}}" :active="request()->is(ltrim($link['url'], '/'))"
            :child="true" :icon="$link['icon']">
            {{ $link['label'] }}
        </x-partials.dashboard.sidebar-link>
        @endforeach
    </div>
</div>
