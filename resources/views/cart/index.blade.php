@extends('layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Shopping Cart</h1>
    
    @if($cartItems->isEmpty())
        <div class="bg-white rounded-lg shadow-lg p-8 text-center">
            <p class="text-gray-600 text-lg mb-4">Your cart is empty</p>
            <a href="{{ route('products.index') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                Continue Shopping
            </a>
        </div>
    @else
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Cart Items -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Cart Header -->
                    <div class="hidden md:grid grid-cols-12 gap-4 p-4 border-b bg-gray-50">
                        <div class="col-span-5 font-semibold">Product</div>
                        <div class="col-span-2 font-semibold text-center">Price</div>
                        <div class="col-span-2 font-semibold text-center">Quantity</div>
                        <div class="col-span-2 font-semibold text-center">Total</div>
                        <div class="col-span-1"></div>
                    </div>

                    <!-- Cart Items -->
                    @foreach($cartItems as $item)
                        <div class="p-4 border-b">
                            <div class="flex flex-col md:grid md:grid-cols-12 gap-4 items-center">
                                <div class="col-span-5 flex items-center">
                                    <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-20 h-20 object-cover rounded">
                                    <div class="ml-4">
                                        <h3 class="font-semibold">{{ $item->product->name }}</h3>
                                        <p class="text-gray-600 text-sm">{{ $item->product->category->name }}</p>
                                    </div>
                                </div>
                                <div class="col-span-2 text-center">
                                    <span class="font-semibold">₹{{ number_format($item->product->price, 2) }}</span>
                                </div>
                                <div class="col-span-2">
                                    <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center justify-center">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" class="px-3 py-1 text-gray-600 hover:text-gray-700 focus:outline-none" onclick="decrementQuantity(this)">-</button>
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 text-center border-x px-2 py-1 focus:outline-none" onchange="updateQuantity(this)">
                                        <button type="button" class="px-3 py-1 text-gray-600 hover:text-gray-700 focus:outline-none" onclick="incrementQuantity(this)">+</button>
                                    </form>
                                </div>
                                <div class="col-span-2 text-center">
                                    <span class="font-semibold">₹{{ number_format($item->quantity * $item->product->price, 2) }}</span>
                                </div>
                                <div class="col-span-1 text-center">
                                    <form action="{{ route('cart.remove', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Cart Actions -->
                    <div class="p-4 flex justify-between items-center">
                        <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:w-1/3">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">Order Summary</h2>
                    
                    <div class="space-y-3 mb-6">
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

                    <a href="{{ route('checkout') }}" class="block w-full bg-blue-600 text-white text-center py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    function incrementQuantity(button) {
        const input = button.parentElement.querySelector('input[name="quantity"]');
        input.value = parseInt(input.value) + 1;
        input.form.submit();
    }

    function decrementQuantity(button) {
        const input = button.parentElement.querySelector('input[name="quantity"]');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            input.form.submit();
        }
    }

    function updateQuantity(input) {
        if (parseInt(input.value) < 1) {
            input.value = 1;
        }
        input.form.submit();
    }
</script>
@endsection