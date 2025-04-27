@extends('layout')

@section('content')
<!-- Hero Section -->
<section class="bg-white py-16">
  <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center">
    <div class="md:w-1/2">
      <h1 class="text-4xl md:text-5xl font-bold mb-6">Furnish Your Dream Home</h1>
      <p class="mb-6 text-lg text-gray-600">Discover stylish and affordable furniture for every room. Customize and order in just a few clicks!</p>
      <div class="flex gap-4">
        <a href="{{ route('products.index') }}" class="inline-block bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-300">Shop Now</a>
        <a href="{{ route('room-planner.index') }}" class="inline-block bg-gray-800 text-white py-3 px-6 rounded-lg hover:bg-gray-700 transition duration-300">Room Planner</a>
      </div>
    </div>
    <div class="md:w-1/2 mt-10 md:mt-0">
      <img src="{{ asset('images/hero-furniture.jpg') }}" alt="Furniture" class="rounded-lg shadow-lg w-full h-auto">
    </div>
  </div>
</section>

<!-- Featured Products Section -->
<section class="bg-gray-50 py-12">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold mb-6 text-center">Featured Furniture</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @foreach($featuredProducts as $product)
      <div class="bg-white rounded-lg shadow p-4 hover:shadow-lg transition-shadow duration-300">
        <div class="relative">
          <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="rounded mb-4 w-full h-48 object-cover">
          @if($product->is_customizable)
          <div class="absolute top-2 right-2 bg-blue-600 text-white px-3 py-1 rounded-full text-sm">
            Customizable
          </div>
          @endif
        </div>
        <h3 class="font-semibold text-lg mb-2">{{ $product->name }}</h3>
        <p class="text-gray-600 mb-2">{{ $product->description }}</p>
        <div class="flex justify-between items-center">
          <span class="text-blue-600 font-bold">₹{{ number_format($product->price, 2) }}</span>
          <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:text-blue-800 transition duration-300">View Details</a>
        </div>
      </div>
      @endforeach
    </div>
    <div class="text-center mt-8">
      <a href="{{ route('products.index') }}" class="inline-block bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">View All Products</a>
    </div>
  </div>
</section>

<!-- Categories Section -->
<section class="py-12">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold mb-6 text-center">Shop by Category</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      @php
          $categoryImages = [
              'livingroom' => 'https://images.unsplash.com/photo-1615874959474-d609969a30c4',
              'diningroom' => 'https://images.unsplash.com/photo-1615873968403-89ce3e7d7992',
              'bedroom' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c',
              'kitchen' => 'https://images.unsplash.com/photo-1605450346535-13943aa847b5',
              'office' => 'https://images.unsplash.com/photo-1593642532973-d31b6557fa68',
              'bathroom' => 'https://images.unsplash.com/photo-1605559424843-8f58a6ae9681',
          ];
      @endphp

      @foreach($categories as $category)
      <a href="{{ route('products.index', ['category' => $category->id]) }}" class="group">
        <div class="bg-white rounded-lg shadow p-4 text-center hover:shadow-lg transition-shadow duration-300">
          <div class="w-20 h-20 mx-auto mb-2 rounded-full overflow-hidden">
            <img src="{{ $categoryImages[$category->slug] ?? 'https://via.placeholder.com/300' }}" alt="{{ $category->name }}" class="w-full h-full object-cover">
          </div>
          <h3 class="font-semibold text-lg group-hover:text-blue-600 transition duration-300">{{ $category->name }}</h3>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>

<!-- Customization Section -->
<section class="bg-gray-50 py-12">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold mb-6 text-center">Customize Your Furniture</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
      <div>
        <img src="{{ asset('images/customization.jpg') }}" alt="Customization" class="rounded-lg shadow-lg w-full h-auto">
      </div>
      <div>
        <h3 class="text-2xl font-semibold mb-4">Make It Yours</h3>
        <ul class="space-y-3">
          <li class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Choose from multiple materials and finishes
          </li>
          <li class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Customize dimensions to fit your space
          </li>
          <li class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Select from a wide range of colors
          </li>
          <li class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Add personalized engravings
          </li>
        </ul>
        <a href="{{ route('products.index', ['customizable' => true]) }}" class="inline-block mt-6 bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">Explore Customizable Products</a>
      </div>
    </div>
  </div>
</section>

<!-- Room Planner Section -->
<section class="py-12">
  <div class="max-w-7xl mx-auto px-4">
    <div class="bg-blue-600 rounded-lg p-8 text-white">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div>
          <h2 class="text-3xl font-bold mb-4">Plan Your Room</h2>
          <p class="mb-6">Visualize how our furniture will look in your space with our 3D room planner.</p>
          <a href="{{ route('room-planner.index') }}" class="inline-block bg-white text-blue-600 py-2 px-6 rounded-lg hover:bg-gray-100 transition duration-300">Try Room Planner</a>
        </div>
        <div>
          <img src="{{ asset('images/room-planner.jpg') }}" alt="Room Planner" class="rounded-lg shadow-lg w-full h-auto">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section class="bg-gray-50 py-12">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold mb-6 text-center">What Our Customers Say</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @php
          $testimonials = [
              [
                  'name' => 'Aarav Sharma',
                  'avatar' => 'https://i.pravatar.cc/150?img=1',
                  'rating' => 5,
                  'comment' => 'The furniture quality is excellent, and the customization options are amazing. Highly recommended!',
              ],
              [
                  'name' => 'Isha Patel',
                  'avatar' => 'https://i.pravatar.cc/150?img=2',
                  'rating' => 4,
                  'comment' => 'I loved the dining table I ordered. It fits perfectly in my home and looks stunning!',
              ],
              [
                  'name' => 'Rohan Gupta',
                  'avatar' => 'https://i.pravatar.cc/150?img=3',
                  'rating' => 5,
                  'comment' => 'The room planner tool helped me visualize my space. The delivery was on time, and the product is fantastic!',
              ],
          ];
      @endphp

      @foreach($testimonials as $testimonial)
      <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex items-center mb-4">
          <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}" class="w-12 h-12 rounded-full mr-4">
          <div>
            <h4 class="font-semibold">{{ $testimonial['name'] }}</h4>
            <div class="flex text-yellow-400">
              @for($i = 0; $i < $testimonial['rating']; $i++)
                ★
              @endfor
            </div>
          </div>
        </div>
        <p class="text-gray-600">{{ $testimonial['comment'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Newsletter Section -->
<section class="bg-blue-600 py-16">
  <div class="max-w-7xl mx-auto px-4 text-center">
    <h2 class="text-3xl font-bold mb-4 text-white">Stay Updated</h2>
    <p class="text-blue-100 mb-8">Subscribe to our newsletter for exclusive offers and interior design tips</p>
    
    @if(session('success'))
      <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
      </div>
    @endif

    @if($errors->any())
      <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
        <ul class="list-disc list-inside">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="max-w-md mx-auto flex gap-4">
      @csrf
      <input type="email" name="email" placeholder="Enter your email" 
             value="{{ old('email') }}"
             class="flex-1 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
      <button type="submit" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition duration-300">
        Subscribe
      </button>
    </form>
  </div>
</section>
@endsection