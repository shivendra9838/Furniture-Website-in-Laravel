@extends('layout')

@section('content')
<!-- Contact Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-4xl font-extrabold text-center mb-12 text-blue-700 animate-pulse">Contact Us</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <!-- Contact Information -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-2xl transition duration-500">
                <h2 class="text-2xl font-bold mb-6 text-blue-600">Get in Touch</h2>
                <div class="space-y-6 text-gray-700">
                    <div>
                        <h3 class="font-semibold mb-1">Address</h3>
                        <p>MG MARG-Civil Lines, Prayagraj, 209601</p>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1">Email</h3>
                        <p>anupam9828@gmail.com</p>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1">Phone</h3>
                        <p>+91 98765 43210</p>
                    </div>
                </div>

                <!-- Location Map -->
                <div class="mt-8 rounded-lg overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps?q=MG%20MARG%20Civil%20Lines%20Prayagraj%20209601&output=embed" 
                        width="100%" 
                        height="300" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="rounded-lg hover:scale-105 transition-transform duration-300">
                    </iframe>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-2xl transition duration-500">
                <h2 class="text-2xl font-bold mb-6 text-blue-600">Send us a Message</h2>

                <!-- Success message -->
                @if(session('success'))
                    <div class="mb-4 p-4 text-green-800 bg-green-200 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label class="block text-gray-700 mb-2">Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            value="{{ old('name') }}"
                            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                            placeholder="Enter your name">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1 animate-bounce">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-gray-700 mb-2">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                            placeholder="Enter your email">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1 animate-bounce">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message -->
                    <div>
                        <label class="block text-gray-700 mb-2">Message</label>
                        <textarea 
                            name="message" 
                            rows="4" 
                            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('message') border-red-500 @enderror"
                            placeholder="Write your message here...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1 animate-bounce">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="bg-blue-600 text-white py-3 px-8 rounded-full hover:bg-blue-700 hover:scale-105 transition-transform duration-300">
                        Send Message
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection
