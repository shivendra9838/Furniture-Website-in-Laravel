@extends('layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Product Images -->
        <div class="bg-white rounded-lg shadow-lg p-4">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-auto rounded-lg">
        </div>

        <!-- Product Details -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
            <div class="flex items-center mb-4">
                <div class="flex text-yellow-400">
                    @for($i = 0; $i < 5; $i++)
                        <i class="fas fa-star"></i>
                    @endfor
                </div>
                <span class="text-gray-600 ml-2">(24 reviews)</span>
            </div>
            <p class="text-gray-600 mb-4">{{ $product->description }}</p>
            
            <div class="mb-6">
                <span class="text-2xl font-bold text-blue-600">${{ number_format($product->price, 2) }}</span>
            </div>

            @if($product->is_customizable)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Customization Options</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-gray-700 mb-2">Material</label>
                            <select class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="wood">Wood</option>
                                <option value="metal">Metal</option>
                                <option value="fabric">Fabric</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Color</label>
                            <select class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="black">Black</option>
                                <option value="white">White</option>
                                <option value="brown">Brown</option>
                            </select>
                        </div>
                    </div>
                </div>
            @endif

            @auth
                <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-6">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center border rounded-lg">
                            <button type="button" class="px-4 py-2 text-gray-600 hover:text-gray-700 focus:outline-none" onclick="decrementQuantity()">-</button>
                            <input type="number" name="quantity" value="1" min="1" class="w-16 text-center border-x px-2 py-2 focus:outline-none" id="quantity">
                            <button type="button" class="px-4 py-2 text-gray-600 hover:text-gray-700 focus:outline-none" onclick="incrementQuantity()">+</button>
                        </div>
                        <button type="submit" class="flex-1 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </form>
            @else
                <div class="mb-6">
                    <a href="{{ route('login') }}" class="block w-full bg-blue-600 text-white text-center px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                        Login to Add to Cart
                    </a>
                </div>
            @endauth

            <div class="border-t pt-6">
                <h3 class="text-lg font-semibold mb-4">Product Details</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-600">Material</p>
                        <p class="font-medium">{{ $product->material }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Color</p>
                        <p class="font-medium">{{ $product->color }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Dimensions</p>
                        <p class="font-medium">{{ $product->dimensions }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Weight</p>
                        <p class="font-medium">{{ $product->weight }} kg</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-6">Related Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <a href="{{ route('products.show', $relatedProduct) }}">
                            <img src="{{ $relatedProduct->image_url }}" alt="{{ $relatedProduct->name }}" class="w-full h-48 object-cover">
                        </a>
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-2">
                                <a href="{{ route('products.show', $relatedProduct) }}" class="hover:text-blue-600">
                                    {{ $relatedProduct->name }}
                                </a>
                            </h3>
                            <p class="text-blue-600 font-bold">${{ number_format($relatedProduct->price, 2) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

<script>
    function incrementQuantity() {
        const quantityInput = document.getElementById('quantity');
        quantityInput.value = parseInt(quantityInput.value) + 1;
    }

    function decrementQuantity() {
        const quantityInput = document.getElementById('quantity');
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    }
</script>
@endsection 