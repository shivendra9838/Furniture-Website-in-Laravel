@extends('layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Checkout</h1>
    
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Checkout Form -->
        <div class="lg:w-2/3">
            <form action="{{ route('checkout.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Shipping Information -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Shipping Information</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="shipping_address" class="block text-gray-700 mb-2">Shipping Address</label>
                            <textarea id="shipping_address" name="shipping_address" rows="3" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Billing Information -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Billing Information</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="billing_address" class="block text-gray-700 mb-2">Billing Address</label>
                            <textarea id="billing_address" name="billing_address" rows="3" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Payment Method</h2>
                    <div class="space-y-4">
                        <div class="flex items-center p-4 border rounded-lg">
                            <input type="radio" id="credit_card" name="payment_method" value="credit_card" class="mr-4" checked>
                            <label for="credit_card" class="flex-1">
                                <span class="font-semibold">Credit Card</span>
                                <p class="text-gray-600 text-sm">Pay with your credit card</p>
                            </label>
                            <div class="flex space-x-2">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/visa/visa-original.svg" alt="Visa" class="w-8 h-5">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mastercard/mastercard-original.svg" alt="Mastercard" class="w-8 h-5">
                            </div>
                        </div>
                        <div class="flex items-center p-4 border rounded-lg">
                            <input type="radio" id="paypal" name="payment_method" value="paypal" class="mr-4">
                            <label for="paypal" class="flex-1">
                                <span class="font-semibold">PayPal</span>
                                <p class="text-gray-600 text-sm">Pay with your PayPal account</p>
                            </label>
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/paypal/paypal-original.svg" alt="PayPal" class="w-8 h-5">
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                    Place Order
                </button>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="lg:w-1/3">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Order Summary</h2>
                
                <!-- Order Items -->
                <div class="space-y-4 mb-6">
                    @foreach($cartItems as $item)
                        <div class="flex items-center">
                            <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded">
                            <div class="ml-4">
                                <h3 class="font-semibold">{{ $item->product->name }}</h3>
                                <p class="text-gray-600">Qty: {{ $item->quantity }}</p>
                            </div>
                            <span class="ml-auto font-semibold">₹{{ number_format($item->quantity * $item->product->price, 2) }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="border-t pt-4 space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span>₹{{ number_format($total, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Shipping</span>
                        <span>Free</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tax</span>
                        <span>₹{{ number_format($total * 0.1, 2) }}</span>
                    </div>
                    <div class="border-t pt-3 flex justify-between font-bold">
                        <span>Total</span>
                        <span>₹{{ number_format($total + ($total * 0.1), 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection