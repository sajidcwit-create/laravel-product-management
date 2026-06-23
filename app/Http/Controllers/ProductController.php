<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Task 1: View Response
     * Shows the product list using Eloquent + a Blade view.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->get();

        return view('products.index', compact('products'));
    }

    /**
     * Task 1: JSON Response
     * Same data, returned as JSON instead of a view.
     */
    public function indexJson()
    {
        $products = Product::with('category')->latest()->get();

        return response()->json([
            'success' => true,
            'count'   => $products->count(),
            'data'    => $products,
        ]);
    }

    /**
     * Task 1: Redirect Response
     * Demonstrates a redirect carrying a flash message back to the list.
     */
    public function redirectDemo()
    {
        return redirect()
            ->route('products.index')
            ->with('info', 'You were redirected here from /products/redirect-demo.');
    }

    /**
     * Task 1: Product Details page.
     */
    public function show(Product $product)
    {
        $product->load('category');

        return view('products.show', compact('product'));
    }

    /**
     * Task 4: Show the Product Create Form.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('products.create', compact('categories'));
    }

    /**
     * Task 4: Handle form submission.
     * - Validates input
     * - Stores the product
     * - Writes submitted data to the Laravel log
     * - Flashes a success message to the session
     * - Redirects to a confirmation page
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name'        => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'min:0'],
            'stock'       => ['required', 'integer', 'min:0'],
        ]);

        $product = Product::create($validated);

        // Task 4: Write submitted data into Laravel log file (storage/logs/laravel.log)
        Log::info('New product created', [
            'product_id' => $product->id,
            'name'       => $product->name,
            'price'      => $product->price,
            'stock'      => $product->stock,
            'category'   => $product->category_id,
        ]);

        // Task 4: Store a success message using Session
        session()->flash('success', "Product \"{$product->name}\" was created successfully!");

        // Task 4: Redirect the user to a confirmation page
        return redirect()->route('products.confirmation', $product->id);
    }

    /**
     * Task 4: Confirmation page — displays the submitted product
     * and reads back the flashed session message.
     */
    public function confirmation(Product $product)
    {
        $product->load('category');

        return view('products.confirmation', compact('product'));
    }

    /**
     * Task 5: Query Builder Practice
     * Uses the DB facade (not Eloquent) for search, sort and count.
     */
    public function queryDemo(Request $request)
    {
        $search = $request->query('search');
        $sort   = $request->query('sort', 'asc'); // asc | desc

        $query = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select('products.*', 'categories.name as category_name');

        // Search products by name
        if (!empty($search)) {
            $query->where('products.name', 'like', '%' . $search . '%');
        }

        // Sort products by price (Ascending & Descending)
        $sort = $sort === 'desc' ? 'desc' : 'asc';
        $query->orderBy('products.price', $sort);

        $products = $query->get();

        // Total product count (independent of the filtered list above)
        $totalCount = DB::table('products')->count();

        return view('products.query-demo', [
            'products'   => $products,
            'totalCount' => $totalCount,
            'search'     => $search,
            'sort'       => $sort,
        ]);
    }
}
