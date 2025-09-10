<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Category::all();
        $currentCategory = null;
        $postQuery = Post::with('category', 'author');

        if ($request->category) {
            $currentCategory = Category::where('slug', $request->category)->first();
        }

        if ($currentCategory) {
            $postQuery->where('category_id', $currentCategory->id);
        }

        // Sorting Logic
        if ($request->sort === 'oldest') {
            $postQuery->oldest();
        } else {
            $postQuery->latest();
        }

        $posts = $postQuery->paginate(20)->withQueryString();

        return view("posts.index", [
            'posts' => $posts,
            'categories' => $categories,
            'currentCategory' => $currentCategory,
        ]);
    }
}
