@extends('layout')

@section('content')
<!-- Checkout Section -->
<section class="py-12">
  <div class="max-w-7xl mx-auto px-4">
    <h1 class="text-3xl font-bold mb-8">Checkout</h1>
    
    <div class="flex flex-col lg:flex-row gap-8">
      <!-- Checkout Form -->
      <div class="lg:w-2/3">
        <div class="bg-white rounded-lg shadow-sm p-6">
          <!-- Progress Steps -->
          <div class="flex justify-between mb-8">
            <div class="flex items-center">
              <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center">1</div>
              <span class="ml-2 font-semibold">Shipping</span>
            </div>
            <div class="flex items-center">
              <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center">2</div>
              <span class="ml-2 text-gray-600">Payment</span>
            </div>
            <div class="flex items-center">
              <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center">3</div>
              <span class="ml-2 text-gray-600">Review</span>
            </div>
          </div>

          <!-- Shipping Information -->
          <h2 class="text-xl font-bold mb-4">Shipping Information</h2>
          <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-gray-700 mb-2">First Name</label>
                <input type="text" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
              </div>
              <div>
                <label class="block text-gray-700 mb-2">Last Name</label>
                <input type="text" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
              </div>
            </div>

            <div>
              <label class="block text-gray-700 mb-2">Email Address</label>
              <input type="email" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
              <label class="block text-gray-700 mb-2">Phone Number</label>
              <input type="tel" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
              <label class="block text-gray-700 mb-2">Street Address</label>
              <input type="text" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              <div>
                <label class="block text-gray-700 mb-2">City</label>
                <input type="text" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
              </div>
              <div>
                <label class="block text-gray-700 mb-2">State</label>
                <select class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                  <option>Select State</option>
                  <option>California</option>
                  <option>New York</option>
                  <option>Texas</option>
                </select>
              </div>
              <div>
                <label class="block text-gray-700 mb-2">ZIP Code</label>
                <input type="text" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
              </div>
            </div>

            <div>
              <label class="block text-gray-700 mb-2">Country</label>
              <select class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option>United States</option>
                <option>Canada</option>
                <option>United Kingdom</option>
              </select>
            </div>

            <div class="flex items-center">
              <input type="checkbox" id="save-info" class="mr-2">
              <label for="save-info" class="text-gray-700">Save this information for next time</label>
            </div>
          </form>

          <!-- Shipping Method -->
          <h2 class="text-xl font-bold mt-8 mb-4">Shipping Method</h2>
          <div class="space-y-4">
            <div class="flex items-center p-4 border rounded-lg">
              <input type="radio" name="shipping" id="standard" class="mr-4" checked>
              <div>
                <label for="standard" class="font-semibold">Standard Shipping</label>
                <p class="text-gray-600">3-5 business days</p>
              </div>
              <span class="ml-auto font-semibold">Free</span>
            </div>
            <div class="flex items-center p-4 border rounded-lg">
              <input type="radio" name="shipping" id="express" class="mr-4">
              <div>
                <label for="express" class="font-semibold">Express Shipping</label>
                <p class="text-gray-600">1-2 business days</p>
              </div>
              <span class="ml-auto font-semibold">₹1,249.99</span>
            </div>
          </div>

          <!-- Navigation Buttons -->
          <div class="flex justify-between mt-8">
            <button class="text-blue-600 hover:text-blue-800 flex items-center">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
              </svg>
              Return to Cart
            </button>
            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
              Continue to Payment
            </button>
          </div>
        </div>
      </div>

      <!-- Order Summary -->
      <div class="lg:w-1/3">
        <div class="bg-white rounded-lg shadow-sm p-6">
          <h2 class="text-xl font-bold mb-4">Order Summary</h2>
          
          <div class="space-y-4 mb-6">
            <!-- Order Items -->
            <div class="flex items-center">
              <img src="https://cdn.pixabay.com/photo/2016/03/27/21/16/interior-1284986_1280.jpg" alt="Modern Sofa Set" class="w-16 h-16 object-cover rounded">
              <div class="ml-4">
                <h3 class="font-semibold">Modern Sofa Set</h3>
                <p class="text-gray-600">Qty: 1</p>
              </div>
              <span class="ml-auto font-semibold">₹899</span>
            </div>
            <div class="flex items-center">
              <img src="https://cdn.pixabay.com/photo/2017/03/28/12/10/chair-2181947_1280.jpg" alt="Designer Chair" class="w-16 h-16 object-cover rounded">
              <div class="ml-4">
                <h3 class="font-semibold">Designer Chair</h3>
                <p class="text-gray-600">Qty: 2</p>
              </div>
              <span class="ml-auto font-semibold">₹598</span>
            </div>
          </div>

          <div class="border-t pt-4 space-y-3">
            <div class="flex justify-between">
              <span class="text-gray-600">Subtotal</span>
              <span>₹1,497</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">Shipping</span>
              <span>Free</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">Tax</span>
              <span>₹149.70</span>
            </div>
            <div class="border-t pt-3 flex justify-between font-bold">
              <span>Total</span>
              <span>₹1,646.70</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection