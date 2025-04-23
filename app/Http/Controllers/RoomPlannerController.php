<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomDesign;
use App\Models\Product;
use App\Models\Category;

class RoomPlannerController extends Controller
{
    public function index()
    {
        return view('room-planner.index');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'dimensions' => 'required|array',
            'dimensions.length' => 'required|numeric|min:1',
            'dimensions.width' => 'required|numeric|min:1',
            'dimensions.height' => 'required|numeric|min:1',
            'wallColor' => 'required|string',
            'floorType' => 'required|string',
            'furniture' => 'required|array'
        ]);

        $design = RoomDesign::create([
            'user_id' => auth()->id(),
            'name' => 'My Room Design ' . now()->format('Y-m-d H:i:s'),
            'room_type' => 'custom',
            'dimensions' => $validated['dimensions'],
            'furniture' => $validated['furniture'],
            'color_scheme' => [
                'walls' => $validated['wallColor'],
                'floor' => $validated['floorType']
            ],
            'lighting' => ['type' => 'natural']
        ]);

        return response()->json([
            'message' => 'Design saved successfully',
            'design' => $design
        ]);
    }

    public function view3D()
    {
        return view('room-planner.3d');
    }

    public function load($id)
    {
        $design = RoomDesign::findOrFail($id);
        
        return response()->json($design);
    }

    public function share(Request $request, $id)
    {
        $design = RoomDesign::findOrFail($id);
        
        // Generate a shareable link
        $shareLink = route('room-planner.view', ['id' => $design->id, 'token' => $design->share_token]);
        
        return response()->json([
            'share_link' => $shareLink
        ]);
    }

    public function view($id, $token)
    {
        $design = RoomDesign::where('id', $id)
            ->where('share_token', $token)
            ->firstOrFail();
            
        return view('room-planner.view', compact('design'));
    }

    public function getFurnitureByCategory($categoryId)
    {
        $furniture = Product::where('category_id', $categoryId)
            ->where('is_customizable', true)
            ->get();
            
        return response()->json($furniture);
    }

    public function getFurnitureDetails($id)
    {
        $furniture = Product::findOrFail($id);
        
        return response()->json([
            'id' => $furniture->id,
            'name' => $furniture->name,
            'dimensions' => $furniture->dimensions,
            'material' => $furniture->material,
            'color' => $furniture->color,
            'price' => $furniture->price,
            'image_url' => $furniture->image_url
        ]);
    }
} 