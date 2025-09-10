<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(): View
    {
        $posts = Post::latest()->with([
            "author",
            "category",
        ])->paginate(20);

        return view('dashboard.posts.index', [
            "posts" => $posts
        ]);
    }

    public function create(): View
    {
        $categories = Category::orderBy('title', 'asc')->get();

        return view('dashboard.posts.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|string|unique:posts,title|max:255',
                'content' => 'required|string|min:50',
                'thumbnail_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'category_id' => 'required|exists:categories,id',
            ],
            [
                "thumbnail_path.max" => "The thumbnail may not be larger than 2MB",
                "thumbnail_path.mimes" => "The thumbnail only support jpeg,png,jpg,gif,svg,webp files.",
                "category_id.required" => "Please select proper category.",
            ]
        );

        if ($request->hasFile('thumbnail_path')) {
            $validatedData['thumbnail_path'] = $request->file('thumbnail_path')->store('thumbnails', 'public');
        }

        $validatedData['author_id'] = 1;

        Post::create($validatedData);

        return redirect('/dashboard/posts')
            ->with("message", [
                "type" => "success",
                "text" => "Post Has Been Added Successfully!"
            ]);
    }
}
