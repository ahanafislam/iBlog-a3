<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('dashboard.categories.index');
    }

    public function create(): View
    {
        return view('dashboard.categories.create');
    }
}
