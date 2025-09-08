@props(['active' => false, 'child' => false, 'icon' => 'fas fa-star' ])

<div>
    <a
        {{ $attributes }}
        @class([
            "flex items-center px-3 rounded-md text-gray-300 text-sm hover:bg-gray-700 hover:text-white",
            "bg-gray-900 font-medium text-white" => $active,
            "py-3 font-medium" => !$child,
            "py-2 pl-11" => $child
        ])
    >
        <i @class([
            $icon,
            "mr-3",
            "text-blue-400" => $active,
            "text-xs" => $child
        ])></i>
        <span>{{ $slot }}</span>
    </a>
</div>
