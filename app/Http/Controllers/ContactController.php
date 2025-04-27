<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // This is for database queries
use Illuminate\Support\Facades\Route; // Add this line to import the Route facade

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        // You can now process the data
        // (Optional) You can store it into the database or send an email here

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
