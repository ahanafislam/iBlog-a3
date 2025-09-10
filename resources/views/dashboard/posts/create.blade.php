<x-layouts.dashboard>
    <div class="bg-white p-6 rounded-lg shadow-md mb-8 max-w-3xl mx-auto">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Create New Post</h2>
        <form class="space-y-6" method="POST" action="/dashboard/posts/create" enctype="multipart/form-data">
            @csrf
            {{-- Start Title Section --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title <span
                        class="text-red-500">*</span></label>
                <input value="{{ old('title') }}" type="text" id="title" name="title"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Title Section --}}

            {{-- Start Category Section --}}
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category <span
                        class="text-red-500">*</span></label>
                <select id="category_id" name="category_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 bg-white focus:ring-blue-500 focus:border-blue-500">
                    <option value="" selected disabled class="text-gray-300">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Category Section --}}

            {{-- Start thumbnail_path Section --}}
            <div>
                <label for="thumbnail_path" class="block text-sm font-medium text-gray-700">thumbnail_path</label>
                <input type="file" id="thumbnail_path" name="thumbnail_path"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                @error('thumbnail_path')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- End thumbnail_path Section --}}

            {{-- Start Content Section --}}
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content <span
                        class="text-red-500">*</span></label>
                <textarea id="content" name="content" rows="10"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">{{ old('content') }}</textarea>
                @error('content')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Content Section --}}

            {{-- Start Submit Button Section --}}
            <div class="text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md">
                    Create Post
                </button>
            </div>
            {{-- End Submit Button Section --}}
        </form>
    </div>
</x-layouts.dashboard>
