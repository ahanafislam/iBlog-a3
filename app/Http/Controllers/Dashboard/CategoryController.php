<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::with('parent')->latest()->paginate(10);

        return view('dashboard.categories.index',[
            "categories" => $categories
        ]);
    }

    public function create(): View
    {
        $categories = Category::orderBy('title', 'asc')->get();

        return view('dashboard.categories.create', [
            "categories" => $categories
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:categories,title|min:2',
            'slug' => 'required|unique:categories,slug',
            'parent_id' => 'nullable',
            'description' => 'required|min:10'
        ]);

        Category::create($validatedData);

        return redirect('/dashboard/categories')
            ->with("message", [
                "type" => "success",
                "text" => "Category Has Been Added Successfully!"
            ]);
    }
}
