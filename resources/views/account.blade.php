@extends('layout')

@section('content')
<!-- Account Section -->
<section class="py-12">
  <div class="max-w-7xl mx-auto px-4">
    <h1 class="text-3xl font-bold mb-8">My Account</h1>
    
    <div class="flex flex-col lg:flex-row gap-8">
      <!-- Sidebar Navigation -->
      <div class="lg:w-1/4">
        <div class="bg-white rounded-lg shadow-sm p-6">
          <div class="flex items-center mb-6">
            <img src="https://i.pravatar.cc/60" alt="Profile" class="w-12 h-12 rounded-full">
            <div class="ml-4">
              <h3 class="font-semibold">Anupam Patel</h3>
              <p class="text-gray-600 text-sm">anupumpatel233@gmail.com</p>
            </div>
          </div>
          
          <nav class="space-y-2">
            <a href="#" class="flex items-center text-blue-600 p-2 rounded-lg bg-blue-50">
              <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
              Profile Information
            </a>
            <a href="#" class="flex items-center text-gray-600 hover:text-blue-600 p-2 rounded-lg hover:bg-blue-50">
              <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
              </svg>
              Orders
            </a>
            <a href="#" class="flex items-center text-gray-600 hover:text-blue-600 p-2 rounded-lg hover:bg-blue-50">
              <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
              </svg>
              Wishlist
            </a>
            <a href="#" class="flex items-center text-gray-600 hover:text-blue-600 p-2 rounded-lg hover:bg-blue-50">
              <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
              </svg>
              Addresses
            </a>
            <a href="#" class="flex items-center text-gray-600 hover:text-blue-600 p-2 rounded-lg hover:bg-blue-50">
              <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
              </svg>
              Security
            </a>
            <a href="#" class="flex items-center text-gray-600 hover:text-blue-600 p-2 rounded-lg hover:bg-blue-50">
              <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
              Order History
            </a>
          </nav>
        </div>
      </div>

      <!-- Main Content -->
      <div class="lg:w-3/4">
        <div class="bg-white rounded-lg shadow-sm p-6">
          <h2 class="text-xl font-bold mb-6">Profile Information</h2>
          
          <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-gray-700 mb-2">First Name</label>
                <input type="text" value="John" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
              </div>
              <div>
                <label class="block text-gray-700 mb-2">Last Name</label>
                <input type="text" value="Doe" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
              </div>
            </div>

            <div>
              <label class="block text-gray-700 mb-2">Email Address</label>
              <input type="email" value="john.doe@example.com" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
              <label class="block text-gray-700 mb-2">Phone Number</label>
              <input type="tel" value="+1 (555) 123-4567" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
              <label class="block text-gray-700 mb-2">Date of Birth</label>
              <input type="date" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
              <label class="block text-gray-700 mb-2">About Me</label>
              <textarea rows="4" class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">Furniture enthusiast and interior design lover.</textarea>
            </div>

            <div class="flex justify-end">
              <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Save Changes
              </button>
            </div>
          </form>

          <!-- Recent Orders -->
          <div class="mt-12">
            <h2 class="text-xl font-bold mb-6">Recent Orders</h2>
            <div class="overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="bg-gray-50">
                    <th class="px-4 py-2 text-left">Order #</th>
                    <th class="px-4 py-2 text-left">Date</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Total</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="border-b">
                    <td class="px-4 py-3">#12345</td>
                    <td class="px-4 py-3">March 15, 2024</td>
                    <td class="px-4 py-3">
                      <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Delivered</span>
                    </td>
                    <td class="px-4 py-3">₹1,646.70</td>
                    <td class="px-4 py-3">
                      <button class="text-blue-600 hover:text-blue-800">View Details</button>
                    </td>
                  </tr>
                  <tr class="border-b">
                    <td class="px-4 py-3">#12344</td>
                    <td class="px-4 py-3">March 10, 2024</td>
                    <td class="px-4 py-3">
                      <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-sm">Processing</span>
                    </td>
                    <td class="px-4 py-3">₹899.00</td>
                    <td class="px-4 py-3">
                      <button class="text-blue-600 hover:text-blue-800">View Details</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection