@extends('layout')

@section('content')
<!-- Shopping Cart Section -->
<section class="py-12">
  <div class="max-w-7xl mx-auto px-4">
    <h1 class="text-3xl font-bold mb-8">Shopping Cart</h1>
    
    <div class="flex flex-col lg:flex-row gap-8">
      <!-- Cart Items -->
      <div class="lg:w-2/3">
        <div class="bg-white rounded-lg shadow-sm">
          <!-- Cart Header -->
          <div class="hidden md:grid grid-cols-12 gap-4 p-4 border-b bg-gray-50">
            <div class="col-span-5 font-semibold">Product</div>
            <div class="col-span-2 font-semibold text-center">Price</div>
            <div class="col-span-2 font-semibold text-center">Quantity</div>
            <div class="col-span-2 font-semibold text-center">Total</div>
            <div class="col-span-1"></div>
          </div>

          <!-- Cart Item 1 -->
          <div class="p-4 border-b">
            <div class="flex flex-col md:grid md:grid-cols-12 gap-4 items-center">
              <div class="col-span-5 flex items-center">
                <img src="https://cdn.pixabay.com/photo/2016/03/27/21/16/interior-1284986_1280.jpg" alt="Modern Sofa Set" class="w-20 h-20 object-cover rounded">
                <div class="ml-4">
                  <h3 class="font-semibold">Modern Sofa Set</h3>
                  <p class="text-gray-600 text-sm">Color: Gray</p>
                </div>
              </div>
              <div class="col-span-2 text-center">
                <span class="font-semibold">$899</span>
              </div>
              <div class="col-span-2">
                <div class="flex items-center justify-center">
                  <button class="bg-gray-200 px-3 py-1 rounded-l-lg">-</button>
                  <input type="number" value="1" class="w-16 text-center border-t border-b">
                  <button class="bg-gray-200 px-3 py-1 rounded-r-lg">+</button>
                </div>
              </div>
              <div class="col-span-2 text-center">
                <span class="font-semibold">$899</span>
              </div>
              <div class="col-span-1 text-center">
                <button class="text-red-500 hover:text-red-700">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <!-- Cart Item 2 -->
          <div class="p-4 border-b">
            <div class="flex flex-col md:grid md:grid-cols-12 gap-4 items-center">
              <div class="col-span-5 flex items-center">
                <img src="https://cdn.pixabay.com/photo/2017/03/28/12/10/chair-2181947_1280.jpg" alt="Designer Chair" class="w-20 h-20 object-cover rounded">
                <div class="ml-4">
                  <h3 class="font-semibold">Designer Chair</h3>
                  <p class="text-gray-600 text-sm">Color: Black</p>
                </div>
              </div>
              <div class="col-span-2 text-center">
                <span class="font-semibold">$299</span>
              </div>
              <div class="col-span-2">
                <div class="flex items-center justify-center">
                  <button class="bg-gray-200 px-3 py-1 rounded-l-lg">-</button>
                  <input type="number" value="2" class="w-16 text-center border-t border-b">
                  <button class="bg-gray-200 px-3 py-1 rounded-r-lg">+</button>
                </div>
              </div>
              <div class="col-span-2 text-center">
                <span class="font-semibold">$598</span>
              </div>
              <div class="col-span-1 text-center">
                <button class="text-red-500 hover:text-red-700">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <!-- Cart Actions -->
          <div class="p-4 flex justify-between items-center">
            <button class="text-blue-600 hover:text-blue-800 flex items-center">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
              </svg>
              Continue Shopping
            </button>
            <button class="text-blue-600 hover:text-blue-800">Update Cart</button>
          </div>
        </div>
      </div>

      <!-- Order Summary -->
      <div class="lg:w-1/3">
        <div class="bg-white rounded-lg shadow-sm p-6">
          <h2 class="text-xl font-bold mb-4">Order Summary</h2>
          
          <div class="space-y-3 mb-6">
            <div class="flex justify-between">
              <span class="text-gray-600">Subtotal</span>
              <span>$1,497</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">Shipping</span>
              <span>Free</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">Tax</span>
              <span>$149.70</span>
            </div>
            <div class="border-t pt-3 flex justify-between font-bold">
              <span>Total</span>
              <span>$1,646.70</span>
            </div>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 mb-2">Promo Code</label>
            <div class="flex">
              <input type="text" placeholder="Enter code" class="flex-1 border rounded-l-lg px-4 py-2">
              <button class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700">Apply</button>
            </div>
          </div>

          <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 mb-4">
            Proceed to Checkout
          </button>

          <div class="text-center text-sm text-gray-600">
            <p>Secure checkout</p>
            <div class="flex justify-center space-x-4 mt-2">
              <img src="https://cdn.pixabay.com/photo/2015/05/26/09/37/paypal-784404_1280.png" alt="PayPal" class="h-6">
              <img src="https://cdn.pixabay.com/photo/2015/05/26/09/37/visa-784404_1280.png" alt="Visa" class="h-6">
              <img src="https://cdn.pixabay.com/photo/2015/05/26/09/37/mastercard-784404_1280.png" alt="Mastercard" class="h-6">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection 