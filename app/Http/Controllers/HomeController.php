<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_featured', true)
            ->with('category')
            ->take(6)
            ->get();

        $categories = Category::all();

        $testimonials = Testimonial::where('is_approved', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('home', compact('featuredProducts', 'categories', 'testimonials'));
    }
} 