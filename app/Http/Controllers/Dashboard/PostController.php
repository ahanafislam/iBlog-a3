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

        return view('dashboard.posts.create',[
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
