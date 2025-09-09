<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('dashboard.categories.index');
    }

    public function create(): View
    {
        $categories = Category::orderBy('title', 'asc')->get();

        return view('dashboard.categories.create', [
            "categories" => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:categories,title|min:2',
            'slug' => 'required|unique:categories,slug',
            'parent_category' => 'nullable',
            'description' => 'required|min:10'
        ]);

        dd($validatedData);
    }
}
