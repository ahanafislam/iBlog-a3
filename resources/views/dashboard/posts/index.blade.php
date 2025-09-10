<x-layouts.dashboard>
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Post List</h2>
            <a href="/dashboard/posts/create"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Create Post
            </a>
        </div>

        <div class="w-full">
            <table class="w-full table-auto divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Thumbnail
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Author
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $post)
                        <tr class="cursor-pointer" data-href="/posts/{{ $post->id }}">
                            <td class="px-2 py-4 text-sm font-medium text-gray-900 hover-target" title="Click For Read More">
                                @if ($post->thumbnail_path)
                                    <img src="{{ asset('storage/' . $post->thumbnail_path) }}" alt="Thumbnail"
                                        class="w-16 h-10 object-cover rounded-md">
                                @else
                                    <img src="{{ asset('thumbnails/default_thumb.png') }}" alt="Default Thumbnail"
                                        class="w-16 h-10 object-cover rounded-md">
                                @endif
                            </td>
                            <td class="px-2 py-4 text-sm font-medium text-gray-900 hover-target" title="Click For Read More">
                                {{ \App\Helpers\StringHelper::postPreview($post->title, 10) }}
                            </td>
                            <td class="px-2 py-4 text-sm text-gray-500 hover-target" title="Click For Read More">
                                {{ \App\Helpers\StringHelper::postPreview($post->content, 30) }}
                            </td>
                            <td class="px-2 py-4 text-sm text-gray-500 hover-target" title="Click For Read More">
                                {{ $post->author->name }}
                            </td>
                            <td class="px-2 py-4 text-sm text-gray-500 hover-target" title="Click For Read More">
                                {{ $post->category->title }}
                            </td>
                            <td class="px-2 py-4 text-sm font-medium actions-column cursor-default">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-2" title="Click For Edit">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900" title="Click For Delete">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('tr[data-href]');

            rows.forEach(row => {
                const hoverTargets = row.querySelectorAll('.hover-target');

                row.addEventListener('click', function(event) {
                    if (event.target.closest('.actions-column')) {
                        return;
                    }
                    window.location.href = this.dataset.href;
                });

                row.addEventListener('mouseover', function(event) {
                    if (event.target.closest('.actions-column')) {
                        hoverTargets.forEach(td => td.classList.remove('bg-gray-100'));
                    } else {
                        hoverTargets.forEach(td => td.classList.add('bg-gray-100'));
                    }
                });

                row.addEventListener('mouseout', function() {
                    hoverTargets.forEach(td => td.classList.remove('bg-gray-100'));
                });
            });
        });
    </script>
</x-layouts.dashboard>
