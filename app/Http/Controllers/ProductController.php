<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a paginated list of products with their categories using eager loading.
     * This method retrieves products with pagination to avoid memory issues with large datasets.
     *
     * @return \Illuminate\View\View The view with paginated products
     */
    public function index()
    {
        // Use eager loading to fetch products with their categories
        // This prevents N+1 query problem by loading relationships in a single query
        $products = Product::with('category')
            ->orderBy('name')
            ->paginate(10); // Display 10 products per page

        return view('products.index', compact('products'));
    }

    /**
     * Display a single product with its category.
     *
     * @param Product $product The product to display
     * @return \Illuminate\View\View The product detail view
     */
    public function show(Product $product)
    {
        // Load the category relationship to avoid N+1 query
        $product->load('category');

        return view('products.show', compact('product'));
    }

    /**
     * Show the form to create a new product.
     *
     * @return \Illuminate\View\View The product creation form view
     */
    public function create()
    {
        // Fetch all categories to populate the dropdown in the form
        $categories = ProductCategory::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a new product in the database.
     *
     * @param Request $request The HTTP request containing product data
     * @return \Illuminate\Http\RedirectResponse Redirect to the products index
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'product_category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string', // Made nullable per requirements
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Create the product with validated data
        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Show the form to edit an existing product.
     *
     * @param Product $product The product to edit
     * @return \Illuminate\View\View The product edit form view
     */
    public function edit(Product $product)
    {
        // Fetch all categories to populate the dropdown in the form
        $categories = ProductCategory::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update a product in the database.
     *
     * @param Request $request The HTTP request containing product data
     * @param Product $product The product to update
     * @return \Illuminate\Http\RedirectResponse Redirect to the products index
     */
    public function update(Request $request, Product $product)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'product_category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string', // Made nullable per requirements
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Update the product with validated data
        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
}

