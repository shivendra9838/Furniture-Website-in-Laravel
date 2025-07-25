@extends('layout')

@section('content')
<!-- Product Detail Section -->
<section class="py-12">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex flex-col md:flex-row gap-8">
      <!-- Product Images -->
      <div class="md:w-1/2">
        <div class="bg-white rounded-lg shadow-sm p-4">
          <img src="https://cdn.pixabay.com/photo/2016/03/27/21/16/interior-1284986_1280.jpg" alt="Modern Sofa Set" class="w-full rounded-lg mb-4">
          <div class="grid grid-cols-4 gap-2">
            <img src="https://cdn.pixabay.com/photo/2016/03/27/21/16/interior-1284986_1280.jpg" alt="Thumbnail 1" class="rounded cursor-pointer hover:opacity-75">
            <img src="https://cdn.pixabay.com/photo/2017/03/28/12/10/chair-2181947_1280.jpg" alt="Thumbnail 2" class="rounded cursor-pointer hover:opacity-75">
            <img src="https://cdn.pixabay.com/photo/2017/06/13/22/42/bedroom-2409985_1280.jpg" alt="Thumbnail 3" class="rounded cursor-pointer hover:opacity-75">
            <img src="https://cdn.pixabay.com/photo/2016/11/29/05/08/architecture-1867187_1280.jpg" alt="Thumbnail 4" class="rounded cursor-pointer hover:opacity-75">
          </div>
        </div>
      </div>

      <!-- Product Info -->
      <div class="md:w-1/2">
        <div class="bg-white rounded-lg shadow-sm p-6">
          <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold">Modern Sofa Set</h1>
            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">In Stock</span>
          </div>
          
          <div class="flex items-center mb-4">
            <div class="flex text-yellow-400">
              ★★★★★
            </div>
            <span class="text-gray-600 ml-2">(24 reviews)</span>
          </div>

          <p class="text-2xl font-bold mb-4">₹8,000</p>
          
          <p class="text-gray-600 mb-6">Premium 3-seater sofa set with high-quality fabric upholstery. Perfect for modern living rooms, offering both comfort and style.</p>

          <!-- Customization Options -->
          <div class="space-y-4 mb-6">
            <div>
              <h3 class="font-semibold mb-2">Color</h3>
              <div class="flex space-x-2">
                <button class="w-8 h-8 rounded-full bg-gray-800 border-2 border-blue-500"></button>
                <button class="w-8 h-8 rounded-full bg-gray-400"></button>
                <button class="w-8 h-8 rounded-full bg-brown-400"></button>
                <button class="w-8 h-8 rounded-full bg-blue-400"></button>
              </div>
            </div>

            <div>
              <h3 class="font-semibold mb-2">Material</h3>
              <select class="w-full border rounded-lg px-4 py-2">
                <option>Premium Fabric</option>
                <option>Leather</option>
                <option>Microfiber</option>
              </select>
            </div>

            <div>
              <h3 class="font-semibold mb-2">Quantity</h3>
              <div class="flex items-center">
                <button class="bg-gray-200 px-3 py-1 rounded-l-lg">-</button>
                <input type="number" value="1" class="w-16 text-center border-t border-b">
                <button class="bg-gray-200 px-3 py-1 rounded-r-lg">+</button>
              </div>
            </div>
          </div>

          <div class="flex space-x-4">
            <button class="flex-1 bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
              Add to Cart
            </button>
            <button class="flex-1 bg-gray-100 text-gray-800 py-3 rounded-lg hover:bg-gray-200">
              Add to Wishlist
            </button>
          </div>
        </div>

        <!-- Product Details Tabs -->
        <div class="mt-8">
          <div class="border-b">
            <nav class="flex space-x-8">
              <button class="py-4 px-1 border-b-2 border-blue-500 font-medium">Description</button>
              <button class="py-4 px-1 text-gray-500 hover:text-gray-700">Specifications</button>
              <button class="py-4 px-1 text-gray-500 hover:text-gray-700">Reviews</button>
              <button class="py-4 px-1 text-gray-500 hover:text-gray-700">Shipping</button>
            </nav>
          </div>

          <div class="py-6">
            <h3 class="font-semibold text-lg mb-4">Product Description</h3>
            <p class="text-gray-600 mb-4">
              Our Modern Sofa Set is designed for both comfort and style. The premium fabric upholstery is soft to the touch while being durable and easy to clean. The ergonomic design provides excellent support for your back, making it perfect for long hours of relaxation.
            </p>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
              <li>Dimensions: 84" W x 36" D x 32" H</li>
              <li>Weight: 120 lbs</li>
              <li>Frame Material: Solid Wood</li>
              <li>Assembly Required: No</li>
              <li>Warranty: 2 Years</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Related Products -->
<section class="py-12 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-2xl font-bold mb-8">You May Also Like</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <!-- Related Product 1 -->
      <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <img src="https://cdn.pixabay.com/photo/2017/03/28/12/10/chair-2181947_1280.jpg" alt="Related Product" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="font-semibold mb-2">Matching Armchair</h3>
          <p class="text-gray-600 mb-2">₹3,990</p>
          <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Add to Cart</button>
        </div>
      </div>
      <!-- Add more related products as needed -->
    </div>
  </div>
</section>
@endsection