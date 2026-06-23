<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Task 6: Eloquent ORM
     * Display every Category with its related Products using eager loading
     * (avoids the N+1 query problem).
     */
    public function index()
    {
        $categories = Category::with('products')->orderBy('name')->get();

        return view('categories.index', compact('categories'));
    }
}
