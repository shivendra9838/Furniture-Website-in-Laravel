<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::where('user_id', Auth::id())
            ->with('product')
            ->get();
        
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'billing_address' => 'required|string|max:255',
            'payment_method' => 'required|string|in:credit_card,paypal',
        ]);

        // Get cart items
        $cartItems = CartItem::where('user_id', Auth::id())
            ->with('product')
            ->get();

        // Calculate total
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        // Create order
        $order = Auth::user()->orders()->create([
            'total_amount' => $total + ($total * 0.1), // Including tax
            'shipping_address' => $request->shipping_address,
            'billing_address' => $request->billing_address,
            'payment_method' => $request->payment_method,
            'status' => 'pending'
        ]);

        // Add order items
        foreach ($cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }

        // Clear the cart
        CartItem::where('user_id', Auth::id())->delete();

        return redirect()->route('orders.show', $order)
            ->with('success', 'Your order has been placed successfully!');
    }
} 