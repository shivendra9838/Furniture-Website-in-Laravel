@extends('layout')

@section('content')
<!-- Products Header -->
<section class="bg-gray-50 py-8">
  <div class="max-w-7xl mx-auto px-4">
    <h1 class="text-3xl font-bold mb-4">Our Furniture Collection</h1>
    <p class="text-gray-600">Discover our wide range of high-quality furniture for every room in your home</p>
  </div>
</section>

<!-- Main Content -->
<section class="py-12">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex flex-col md:flex-row gap-8">
      <!-- Filters Sidebar -->
      <div class="md:w-1/4">
        <div class="bg-white p-6 rounded-lg shadow-sm">
          <h3 class="font-semibold text-lg mb-4">Categories</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-blue-600 hover:text-blue-800">Living Room</a></li>
            <li><a href="#" class="text-gray-600 hover:text-blue-600">Bedroom</a></li>
            <li><a href="#" class="text-gray-600 hover:text-blue-600">Dining Room</a></li>
            <li><a href="#" class="text-gray-600 hover:text-blue-600">Office</a></li>
            <li><a href="#" class="text-gray-600 hover:text-blue-600">Outdoor</a></li>
          </ul>

          <h3 class="font-semibold text-lg mt-8 mb-4">Price Range</h3>
          <div class="space-y-2">
            <div class="flex items-center">
              <input type="checkbox" id="price1" class="mr-2">
              <label for="price1">Under ₹10000</label>
            </div>
            <div class="flex items-center">
              <input type="checkbox" id="price2" class="mr-2">
              <label for="price2">₹1000 - ₹5000</label>
            </div>
            <div class="flex items-center">
              <input type="checkbox" id="price3" class="mr-2">
              <label for="price3">₹5000 - ₹10000</label>
            </div>
            <div class="flex items-center">
              <input type="checkbox" id="price4" class="mr-2">
              <label for="price4">Over ₹10000</label>
            </div>
          </div>

          <h3 class="font-semibold text-lg mt-8 mb-4">Material</h3>
          <div class="space-y-2">
            <div class="flex items-center">
              <input type="checkbox" id="material1" class="mr-2">
              <label for="material1">Wood</label>
            </div>
            <div class="flex items-center">
              <input type="checkbox" id="material2" class="mr-2">
              <label for="material2">Metal</label>
            </div>
            <div class="flex items-center">
              <input type="checkbox" id="material3" class="mr-2">
              <label for="material3">Fabric</label>
            </div>
            <div class="flex items-center">
              <input type="checkbox" id="material4" class="mr-2">
              <label for="material4">Leather</label>
            </div>
          </div>
        </div>
      </div>

      <!-- Products Grid -->
      <div class="md:w-3/4">
        <div class="flex justify-between items-center mb-6">
          <div class="flex items-center space-x-4">
            <span class="text-gray-600">Sort by:</span>
            <select class="border rounded-lg px-3 py-2">
              <option>Most Popular</option>
              <option>Price: Low to High</option>
              <option>Price: High to Low</option>
              <option>Newest First</option>
            </select>
          </div>
          <div class="text-gray-600">
            Showing 1-12 of 48 products
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Product Card 1 -->
          <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="relative">
              <img src="https://cdn.pixabay.com/photo/2016/03/27/21/16/interior-1284986_1280.jpg" alt="Sofa" class="w-full h-64 object-cover">
              <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-sm">Sale</div>
            </div>
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">Modern Sofa Set</h3>
              <p class="text-gray-600 mb-2">Comfortable 3-seater with premium fabric</p>
              <div class="flex justify-between items-center">
                <span class="text-lg font-bold">₹8,990</span>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Add to Cart</button>
              </div>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="relative">
              <img src="https://cdn.pixabay.com/photo/2017/03/28/12/10/chair-2181947_1280.jpg" alt="Chair" class="w-full h-64 object-cover">
            </div>
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">Designer Chair</h3>
              <p class="text-gray-600 mb-2">Ergonomic design with premium leather</p>
              <div class="flex justify-between items-center">
                <span class="text-lg font-bold">₹18,000</span>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Add to Cart</button>
              </div>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="relative">
              <img src="https://cdn.pixabay.com/photo/2017/06/13/22/42/bedroom-2409985_1280.jpg" alt="Bed" class="w-full h-64 object-cover">
              <div class="absolute top-2 right-2 bg-green-500 text-white px-2 py-1 rounded text-sm">New</div>
            </div>
            <div class="p-4">
              <h3 class="font-semibold text-lg mb-2">Luxury Bed</h3>
              <p class="text-gray-600 mb-2">King size with premium headboard</p>
              <div class="flex justify-between items-center">
                <span class="text-lg font-bold">₹22,290</span>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Add to Cart</button>
              </div>
            </div>
          </div>

          <!-- Add more product cards as needed -->
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
          <nav class="flex items-center space-x-2">
            <a href="#" class="px-4 py-2 border rounded-lg hover:bg-gray-100">Previous</a>
            <a href="#" class="px-4 py-2 border rounded-lg bg-blue-600 text-white">1</a>
            <a href="#" class="px-4 py-2 border rounded-lg hover:bg-gray-100">2</a>
            <a href="#" class="px-4 py-2 border rounded-lg hover:bg-gray-100">3</a>
            <a href="#" class="px-4 py-2 border rounded-lg hover:bg-gray-100">Next</a>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection