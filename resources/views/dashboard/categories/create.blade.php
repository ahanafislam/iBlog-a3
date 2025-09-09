<x-layouts.dashboard>
    <div class="bg-white p-6 rounded-lg shadow-md mb-8 max-w-3xl mx-auto">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Create New Category</h2>
        <form class="space-y-6" method="POST" action="/dashboard/categories/create">
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

            {{-- Start Slug Section --}}
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug <span
                        class="text-red-500">*</span></label>
                <input value="{{ old('slug') }}" type="text" id="slug" name="slug"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Slug Section --}}

            {{-- Start Parent Category Section --}}
            <div>
                <label for="parent_id" class="block text-sm font-medium text-gray-700">Parent Category</label>
                <select id="parent_id" name="parent_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 bg-white focus:ring-blue-500 focus:border-blue-500">
                    <option value="" selected disabled class="text-gray-300">Select Parent Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('parent_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Parent Category Section --}}

            {{-- Start Description Section --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description <span
                        class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="4"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Description Section --}}

            {{-- Start Submit Button Section --}}
            <div class="text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md">
                    Create Category
                </button>
            </div>
            {{-- End Submit Button Section --}}
        </form>
    </div>
</x-layouts.dashboard>
