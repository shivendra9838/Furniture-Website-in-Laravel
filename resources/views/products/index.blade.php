@extends('layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Filters Sidebar -->
        <div class="w-full md:w-1/4">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Filters</h3>
                
                <!-- Categories -->
                <div class="mb-6">
                    <h4 class="font-medium mb-2">Categories</h4>
                    <div class="space-y-2">
                        @foreach($categories as $category)
                            <a href="{{ route('products.index', ['category' => $category->id]) }}" 
                               class="block text-gray-600 hover:text-blue-600 {{ request('category') == $category->id ? 'text-blue-600 font-medium' : '' }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Customization Filter -->
                <div class="mb-6">
                    <h4 class="font-medium mb-2">Customization</h4>
                    <a href="{{ route('products.index', ['customizable' => true]) }}" 
                       class="block text-gray-600 hover:text-blue-600 {{ request('customizable') ? 'text-blue-600 font-medium' : '' }}">
                        Customizable Products
                    </a>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="w-full md:w-3/4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="relative">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            @if($product->is_customizable)
                                <div class="absolute top-2 right-2 bg-blue-600 text-white px-2 py-1 rounded-full text-xs">
                                    Customizable
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-blue-600 font-bold">${{ number_format($product->price, 2) }}</span>
                                <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:text-blue-800">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 