<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Wishlist;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query()->with('category');

        // Filter by category
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by customization
        if ($request->has('customizable')) {
            $query->where('is_customizable', true);
        }

        $products = $query->paginate(12);
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
        return view('products.show', compact('product', 'relatedProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function addToCart(Request $request, Product $product)
    {
        $cart = Cart::firstOrCreate(
            ['user_id' => auth()->id()],
            ['total' => 0]
        );

        $cart->items()->create([
            'product_id' => $product->id,
            'quantity' => $request->quantity ?? 1,
            'price' => $product->price
        ]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function addToWishlist(Product $product)
    {
        Wishlist::firstOrCreate([
            'user_id' => auth()->id(),
            'product_id' => $product->id
        ]);

        return redirect()->back()->with('success', 'Product added to wishlist!');
    }
}
