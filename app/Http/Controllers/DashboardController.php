<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Task 7: Simple Dashboard
     * Statistics are fetched from the database using Query Builder / Eloquent
     * (not hard-coded).
     */
    public function index()
    {
        $totalCategories = Category::count();
        $totalProducts   = Product::count();
        $totalStock      = DB::table('products')->sum('stock');
        $latestProducts  = Product::with('category')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalCategories',
            'totalProducts',
            'totalStock',
            'latestProducts'
        ));
    }
}
