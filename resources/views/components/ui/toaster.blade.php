@if(!empty(session('message')))
@php
$type = session('message')['type'] ?? 'false';
$message = session('message')['text'] ?? '';

$colors = [
'success' => ['bg' => 'bg-teal-100', 'border' => 'border-teal-200', 'text' => 'text-teal-800'],
'info' => ['bg' => 'bg-blue-100', 'border' => 'border-blue-200', 'text' => 'text-blue-800'],
'error' => ['bg' => 'bg-red-100', 'border' => 'border-red-200', 'text' => 'text-red-800'],
'warning' => ['bg' => 'bg-yellow-100', 'border' => 'border-yellow-200', 'text' => 'text-yellow-800'],
];

$style = $colors[$type] ?? $colors['success'];
@endphp

<div id="toaster-alert" class=" max-w-md ml-auto mb-2 {{ $style['bg'] }} {{ $style['border'] }} text-sm {{ $style['text'] }} rounded-lg" role="alert"
    tabindex="-1">
    <div class="flex p-4">
        {{ $message }}

        <div class="ms-auto">
            <button type="button"
                class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg {{ $style['text'] }} opacity-50 hover:opacity-100 focus:outline-hidden focus:opacity-100"
                aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
    // Self-invoking function to avoid polluting the global scope
    (function() {
        const toaster = document.getElementById('toaster-alert');
        if (!toaster) {
            return;
        }

        const closeButton = toaster.querySelector('button[aria-label="Close"]');

        // Function to hide the toaster
        const hideToaster = () => {
            toaster.classList.add('hidden');
        };

        // Set a timeout to auto-close the toaster
        const autoCloseTimeout = setTimeout(hideToaster, 3000); // 2 seconds

        // Add click event listener to the close button
        if (closeButton) {
            closeButton.addEventListener('click', () => {
                clearTimeout(autoCloseTimeout); // Stop the auto-close if manually closed
                hideToaster();
            });
        }
    })();
</script>
@endif
